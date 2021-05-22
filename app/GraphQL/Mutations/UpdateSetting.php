<?php

namespace App\GraphQL\Mutations;

use App\Models\Setting;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UpdateSetting
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
        $user = $context->user();

        $setting = Setting::where('user_id',$user->id)->first();

        if (!$setting) {
            $setting = Setting::create([
                'user_id' => $user->id,
                'compact' => isset($args['compact']) ? $args['compact'] : false,
                'dark' => isset($args['dark']) ? $args['dark'] : false
            ]);
        } else {
            $setting->compact = isset($args['compact']) ? $args['compact'] : $setting->compact;
            $setting->dark = isset($args['dark']) ? $args['dark'] : $setting->dark;
            $setting->save();
        }

        return $user;
    }
}
