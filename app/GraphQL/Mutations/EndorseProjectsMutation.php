<?php

namespace App\GraphQL\Mutations;

use App\Models\OperatingUnit;
use App\Models\ProcessingStatus;
use App\Models\ProjectProcessingStatus;
use App\Models\Endorsement;
use App\Models\Project;
use App\Notifications\DatabaseNotification;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class EndorseProjectsMutation
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $endorsement = null;

        $projectsToEndorse = $args['projects'];
        $file = $args['file'];

        $user = $context->user();

        // $uploadedFile = Storage::disk('dropbox')->put('endorsements', $file);
        // $link = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient()->createSharedLinkWithSettings($uploadedFile);
        // $url = $link['url'];
        // $rawUrl = Str::replaceLast("dl=0","raw=1",$url);
        $link = self::uploadFile($file);

        $endorsement = Endorsement::create([
            'uuid' => Str::uuid(),
            // 'file_name' => $file->getClientOriginalName(),
            // 'file_size' =>  $file->getSize(),
            // 'file_extension' => $file->getClientOriginalExtension(),
            // 'file_path' => $uploadedFile,
            // 'file_type' => $file->getMimeType(),
            // 'dropbox_link' => $rawUrl,
            'link' => $link,
            'uploaded_by' => $context->user()->id
        ]);

        $projects = Project::whereIn('id',$projectsToEndorse)->get();

        $processing_status = ProcessingStatus::where('name','endorsed')->first();

        foreach ($projects as $project) {
            $project->endorsed = true;
            $project->endorsement_id = $endorsement->id;
            $project->processing_status_id = $processing_status->id; // set submission status to endorsed
            $project->save();

            ProjectProcessingStatus::create([
              'project_id' => $project->id,
              'processed_by' => $context->user()->id,
              'processed_at' => Carbon::now(),
              'remarks' => 'endorsed',
              'processing_status_id' => $processing_status->id
            ]);
        }

        $endorsement->projects()->saveMany($projects);

        $data = [
          'type' => 'Projects Endorsed',
          'from' => $context->user()->email,
          'title' => 'Projects Endorsed',
          'body' => $projects->count() . ' projects endorsed',
          'actionText' => 'Review',
          'actionURL' => '/projects/review'
        ];

        // notification should be sent to reviewers: how to get?

        $ou = OperatingUnit::where('id', $user->operating_unit_id)->first();
        $reviewers = $ou->reviewers()->get();

        if ($reviewers) {
          Notification::send($reviewers, new DatabaseNotification($data));
        }

        return $endorsement;
    }

    public function uploadFile($file)
    { 
        $now = \Carbon\Carbon::now();
        $timestamp = \Carbon\Carbon::parse($now)->timestamp;

        $uploadedFile = Storage::disk('google')->putFileAs('1Lra5JH6NwC56luUOlYVv5X9kUgg92Hy6', $file, 'endorsements_' . $timestamp);

        return Storage::disk('google')->url($uploadedFile);
    }
}
