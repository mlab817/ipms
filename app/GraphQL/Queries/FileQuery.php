<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Log;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class FileQuery
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

        // TODO implement the resolver
        $files = Storage::disk('dropbox')->allFiles('user_'.$userId.'/avatars');

        Log::debug('files: ' . json_encode($files));

        $links = [];

        foreach ($files as $file) {
            $metadata = Storage::disk('dropbox')
                      ->getDriver() // `\League\Flysystem\Flysystem` instance
                      ->getAdapter() // `\Spatie\FlysystemDropbox\DropboxAdapter` instance
                      ->getClient() // `\Spatie\Dropbox\Client` instance
                      ->getMetadata($file);

            $links[] = $thumbnail;
        }

        return $links;
    }
}
