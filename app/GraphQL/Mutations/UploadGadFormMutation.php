<?php

namespace App\GraphQL\Mutations;

use App\Models\GadForm;
use App\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UploadGadFormMutation
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
        $userId = $context->user->id;

        $file = $args['gad_form'];

        $project = Project::find($args['project_id']);

        if (!$project) {
            return null;
        }

        $uploadedFile = Storage::disk('dropbox')->putFile('gad_forms', $file);

        $link = Storage::disk('dropbox')
          ->getDriver() // `\League\Flysystem\Flysystem` instance
          ->getAdapter() // `\Spatie\FlysystemDropbox\DropboxAdapter` instance
          ->getClient() // `\Spatie\Dropbox\Client` instance
          ->createSharedLinkWithSettings($uploadedFile);
        $url = $link['url'];
        $rawUrl = Str::replaceLast("dl=0","raw=1",$url);

        $gadForm = GadForm::create([
            'uuid' => Str::uuid(),
            'project_id' => $project->id, 
            'name' => $file->getClientOriginalName(),
            'type' => 'gad_forms',
            'mime_type' => $file->getClientMimeType(),
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getClientSize(),
            'file_path' => $uploadedFile,
            'dropbox_path' => $uploadedFile,
            'dropbox_link' => $rawUrl,
            'uploader_id' => $userId,
        ]);

        $project->gad_form_id = $gadForm->id;
        $project->save();

        return $gadForm;
    }
}
