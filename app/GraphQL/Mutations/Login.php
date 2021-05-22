<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use GraphQL\Type\Definition\ResolveInfo;
use Joselfonseca\LighthouseGraphQLPassport\GraphQL\Mutations\BaseAuthResolver;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Login extends BaseAuthResolver
{
    /**
     * @param $rootValue
     * @param array                                                    $args
     * @param \Nuwave\Lighthouse\Support\Contracts\GraphQLContext|null $context
     * @param \GraphQL\Type\Definition\ResolveInfo                     $resolveInfo
     *
     * @throws \Exception
     *
     * @return array
     */
    public function resolve($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $credentials = $this->buildCredentials($args);
        $response = $this->makeRequest($credentials);
        $model = app(config('auth.providers.users.model'));
        $user = $model->where(config('lighthouse-graphql-passport.username'), $args['username'])->firstOrFail();

        if (! $user->active) {
          throw new CustomException("Account not activated","Please contact administrator");
        }

        $response['user'] = $user;

        return $response;
    }
}