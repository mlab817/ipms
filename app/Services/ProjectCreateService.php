<?php

namespace App\Services;

use App\Models\Project;
use App\Models\RefFundingSource;
use App\Models\RefRegion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectCreateService
{
    /**
     * @throws \Throwable
     */
    public function execute(array $data, $userId)
    {
        try {
            return DB::transaction(function () use ($data, $userId) {
                $project = Project::create($data);

                // create hasOne relationships
                $project->description()->create([]);
                $project->project_update()->create([]);
                $project->risk()->create([]);
                $project->expected_output()->create([]);
                $project->feasibility_study()->create([]);
                $project->right_of_way()->create([]);
                $project->resettlement_action_plan()->create([]);
                $project->allocation()->create([]);
                $project->disbursement()->create([]);
                $project->nep()->create([]);

                // create investments
                $regions = RefRegion::all();
                $regionInvestments = collect($regions)->map(function ($r) {
                    return [
                        'ref_region_id' => $r->id,
                    ];
                });

                $project->region_investments()->createMany($regionInvestments);
                $project->region_infrastructures()->createMany($regionInvestments);

                $fundingSources = RefFundingSource::all();
                $fsInvestments = collect($fundingSources)->map(function ($fs) {
                    return [
                        'ref_funding_source_id' => $fs->id,
                    ];
                });

                $project->fs_investments()->createMany($fsInvestments);
                $project->fs_infrastructures()->createMany($fsInvestments);

                $project->trip = true; // set the trip to true
                $project->creator_id = $userId;
                $project->save();

                return $project;
            });
        }  catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
