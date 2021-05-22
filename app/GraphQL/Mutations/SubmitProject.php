<?php

namespace App\GraphQL\Mutations;

use App\Models\Endorsement;
use App\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class SubmitProject
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
        $message = '';
        $status = 'FAILED';

        // TODO implement the resolver
        $projects = Project::find($args['projects']);

        if (!$projects) {
            $message = 'Project(s) not found.';
        }

        $file = $args['endorsement'];

        $user = $context->user();

        $originalName = $file->getClientOriginalName();
        $originalExtension = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $fileType = $file->getMimeType();

//            $uploadedFile = $file->storePublicly('uploads');
        $uploadedFile = Storage::disk('dropbox')->put('uploads',$file);

        $endorsement = Endorsement::create([
            'uuid' => Str::uuid(),
            'file_name' => $originalName,
            'file_size' => $size,
            'file_extension' => $originalExtension,
            'file_type' => $fileType,
            'file_path' => $uploadedFile,
            'uploaded_by' => $user->id
        ]);

        $dropbox_link = Storage::disk('dropbox')
            ->getDriver()
            ->getAdapter()
            ->getClient()
            ->createSharedLinkWithSettings($uploadedFile);

        $endorsement->dropbox_link = $dropbox_link;
        $endorsement->save();

        $status = "SUCCESS";
        $message = "Projects submitted successfully.";

        foreach ($projects as $project) {
            $project->endorsement_id = $endorsement->id;
            $project->endorsed_by = $user->id;
            $project->endorsed_at = now();
            // submit status to endorsed
            $project->submission_status_id = 3;
            $project->save();
        }

        return [
            'endorsement' => $endorsement,
            'status' => $status,
            'message' => $message
        ];
    }
}
