<?php

namespace App\GraphQL\Mutations;

use App\Models\Attachment;
use App\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UploadAttachment
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
        $project = Project::find($args['project_id']);

        if (!$project) {
            return null;
        }

        $file = $args['file'];
        $user = $context->user();

        $originalName = $file->getClientOriginalName();
        $originalExtension = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $fileType = $file->getMimeType();

        // $uploadedFile = $file->storePublicly('uploads');
        $uploadedFile = Storage::disk('dropbox')->put('attachments',$file);

        $link = Storage::disk('dropbox')
          ->getDriver() // `\League\Flysystem\Flysystem` instance
          ->getAdapter() // `\Spatie\FlysystemDropbox\DropboxAdapter` instance
          ->getClient() // `\Spatie\Dropbox\Client` instance
          ->createSharedLinkWithSettings($uploadedFile);
        $url = $link['url'];
        $rawUrl = Str::replaceLast("dl=0","raw=1",$url);

        $attachment = Attachment::create([
            'uuid' => Str::uuid(),
            'project_id' => $args['project_id'],
            'attachment_type_id' => $args['attachment_type_id'],
            'file_name' => $originalName,
            'file_size' => $size,
            'file_extension' => $originalExtension,
            'file_type' => $fileType,
            'file_path' => $uploadedFile,
            'dropbox_link' => $rawUrl,
            'uploaded_by' => $user->id
        ]);

        return $attachment;
    }
}
