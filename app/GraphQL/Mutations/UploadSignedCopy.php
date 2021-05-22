<?php

namespace App\GraphQL\Mutations;

use App\Events\SignedCopyUploaded;
use App\Models\SubmissionStatus;
use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UploadSignedCopy
{
    /**
     * @param array<string, mixed> $args
     * @return App\Models\Project | null
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        // args contain id and signed_copy
        $project = Project::find($args['id']);

        if (!$project) {
            return null;
        }

        $user = $context->user();

        $file = $args['signed_copy'];

        $file_title = time() . '_' . $file->getClientOriginalName();

        $uploadedFile = $file->storePubliclyAs('signed copies', $file_title, 'public');
        $processing_status = ProcessingStatus::where('name','endorsed')->first();
        $ss = SubmissionStatus::where('name','Endorsed')->first();

        $project->processing_status_id = $processing_status->id;
        $project->submission_status_id = $ss->id;
        $project->processed_by = $user->id;
        $project->signed_copy = $uploadedFile;
        $project->endorsed = true;
        $project->save();

        Log::info('Project "' . $project->title . '" endorsed.');

        return $project;
    }
}
