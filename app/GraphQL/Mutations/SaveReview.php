<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\Models\Review;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class SaveReview
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

        // initialize variables
        $message = 'An error occurred';
        $status = 'FAILED';
        $review = null;

        // retrieve Project
        $project = Project::find($args['id']);

        if (!$project || $project->processing_status->name != 'validated') {
            $message = 'Project not found or is not validated yet.';
        } else {
            $review = Review::where('project_id',$project->id)->first();

            $typology_id = $args['typology_id'] ?? null;
            $cip = $args['cip'] ?? null;
            $cip_type_id = $args['cip_type_id'] ?? null;
            $trip = $args['trip'] ?? null;
            $within_period = $args['within_period'] ?? null;
            $readiness_id = $args['readiness_id'] ?? null;
            $remarks = $args['remarks'] ?? null;
            $sustainable_development_goals = $args['sustainable_development_goals'] ?? null;
            $ten_point_agenda = $args['ten_point_agenda'] ?? null;
            $bases = $args['bases'] ?? null;
            $paradigms = $args['paradigms'] ?? null;
            $pdp_chapters = $args['pdp_chapters'] ?? null;
            $pdp_indicators = $args['pdp_indicators'] ?? null;

            if ($review) {

                $review->project_id = $project->id;
                $review->typology_id = $typology_id;
                $review->cip = $cip;
                $review->cip_type_id = $cip_type_id;
                $review->trip = $trip;
                $review->within_period = $within_period;
                $review->readiness_id = $readiness_id;
                $review->remarks = $remarks;
                $review->reviewed_by = $context->user()->id;

                $review->save();

                $review->sustainable_development_goals()->sync($sustainable_development_goals);
                $review->ten_point_agenda()->sync($ten_point_agenda);
                $review->bases()->sync($bases);
                $review->paradigms()->sync($paradigms);
                $review->pdp_chapters()->sync($pdp_chapters);
                $review->pdp_indicators()->sync($pdp_indicators);

                $message = 'Successfully updated review';
                $status = 'SUCCESS';
            } else {
                $review = Review::create([
                    'project_id' => $project->id,
                    'typology_id' => $typology_id,
                    'cip' => $cip,
                    'cip_type_id' => $cip_type_id,
                    'trip' => $trip,
                    'within_period' => $within_period,
                    'readiness_id' => $readiness_id,
                    'remarks' => $remarks,
                    'reviewed_by' => $context->user()->id
                ]);

                if ($review) {
                    $review->sustainable_development_goals()->sync($sustainable_development_goals);
                    $review->ten_point_agenda()->sync($ten_point_agenda);
                    $review->bases()->sync($bases);
                    $review->paradigms()->sync($paradigms);
                    $review->pdp_chapters()->sync($pdp_chapters);
                    $review->pdp_indicators()->sync($pdp_indicators);

                    $message = 'Successfully saved review';
                    $status = 'SUCCESS';
                } else {
                    $message = 'Failed to save review.';
                }
            }

            
        }

        return [
            'review' => $review,
            'message' => $message,
            'status' => $status
        ];
    }
}
