<?php

namespace App\GraphQL\Queries;

use Log;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class FetchActivitiesQuery
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

        $page = $args['page'] ? $args['page'] : 1;
        $first = $args['first'] ? $args['first']: 10;

        $activities = [];

        $user = $context->user();

        $activities = $user->activities()->paginate($first);

        Log::debug($activities);

        return [
            'data' => $activities,
            'paginatorInfo' => $this->pageInfoResolver($activities)
        ];
    }

    /**
     * Resolve page info for connection.
     *
     * @return array<string, mixed>
     */
    public function pageInfoResolver(LengthAwarePaginator $paginator): array
    {
        return [
            'perPage' => $paginator->perPage(),
            'total' => $paginator->total(),
            'count' => $paginator->count(),
            'currentPage' => $paginator->currentPage(),
            'lastPage' => $paginator->lastPage(),
            'hasMorePages' => $paginator->hasMorePages(),
            'hasPreviousPage' => $paginator->currentPage() > 1,
            'firstItem' => $paginator->firstItem(),
            'lastItem' => $paginator->lastItem()
        ];
    }
}
