<?php

namespace App\GraphQL\Mutations;

use App\Models\OperatingUnit;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UpdateOperatingUnitImageMutation
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
        // TODO implement the resolver

      $operatingUnit = OperatingUnit::findOrFail($args['id']);

      if (! $operatingUnit) {
        return null;
      } else {
        $image = $args['image'];

        // $uploadedFile = Storage::disk('dropbox')->put('agency_logos', $image);
        // $link = Storage::disk('dropbox')
        //   ->getDriver() // `\League\Flysystem\Flysystem` instance
        //   ->getAdapter() // `\Spatie\FlysystemDropbox\DropboxAdapter` instance
        //   ->getClient() // `\Spatie\Dropbox\Client` instance
        //   ->createSharedLinkWithSettings($uploadedFile);
        // $url = $link['url'];
        // $rawUrl = Str::replaceLast("dl=0","raw=1",$url);

        $path = $image->storePubliclyAs('agency_logos', $image->getClientOriginalName(), 'public');

        $operatingUnit->image = $path;
        $operatingUnit->save();

        return $operatingUnit;
      }
    }
}
