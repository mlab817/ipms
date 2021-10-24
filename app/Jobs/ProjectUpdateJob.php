<?php

namespace App\Jobs;

use App\Models\Project;
use App\Services\ProjectCheckForIssuesService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProjectUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $data;

    public int $projectId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $projectId)
    {
        $this->data = $data;
        $this->projectId = $projectId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ProjectCheckForIssuesService $service)
    {
        $project = Project::find($this->projectId);

        $request = $this->data;

        $project->update($request);

        $project->bases()->sync($request['bases'] ?? []);
        $project->regions()->sync($request['regions'] ?? []);
        $project->sdgs()->sync($request['sdgs'] ?? []);
        $project->pdp_chapters()->sync($request['pdp_chapters'] ?? []);
        $project->pdp_indicators()->sync($request['pdp_indicators'] ?? []);
        $project->ten_point_agendas()->sync($request['ten_point_agendas'] ?? []);
        $project->operating_units()->sync($request['operating_units'] ?? []);
        $project->covid_interventions()->sync($request['covid_interventions'] ?? []);
        $project->prerequisites()->sync($request['prerequisites'] ?? []);
        $project->infrastructure_sectors()->sync($request['infrastructure_sectors'] ?? []);
        $project->infrastructure_subsectors()->sync($request['infrastructure_subsectors'] ?? []);

        foreach ($request['fs_investments'] as $fs_investment) {
            $project
                ->fs_investments()
                ->where('ref_funding_source_id', $fs_investment['ref_funding_source_id'])
                ->update($fs_investment);
        }

        foreach ($request['fs_infrastructures'] as $fs_infrastructure) {
            $project
                ->fs_infrastructures()
                ->where('ref_funding_source_id', $fs_infrastructure['ref_funding_source_id'])
                ->update($fs_infrastructure);
        }

        foreach ($request['region_investments'] as $region_investment) {
            $project
                ->region_investments()
                ->where('ref_region_id', $region_investment['ref_region_id'])
                ->update($region_investment);
//            $itemToEdit = ProjectRegionInvestment::where('project_id', $project->id)->where('region_id', $region_investment['region_id'])->first();
//            $itemToEdit->update($region_investment);
        }

        foreach ($request['region_infrastructures'] as $region_infrastructure) {
            $project
                ->region_infrastructures()
                ->where('ref_region_id', $region_infrastructure['ref_region_id'])
                ->update($region_infrastructure);
//            $itemToEdit = ProjectRegionInvestment::where('project_id', $project->id)->where('region_id', $region_investment['region_id'])->first();
//            $itemToEdit->update($region_investment);
        }

        if (isset($request['updates'])) {
            $project->project_update()->update([
                'updates' => $request['updates'],
                'updates_date' => $request['updates_date'],
            ]);
        }

        if (isset($request['expected_outputs'])) {
            $project->expected_output()->update([
                'expected_outputs' => $request['expected_outputs']
            ]);
        }

        if (isset($request['description'])) {
            $project->description()->update([
                'description' => $request['description'],
            ]);
        }

        if (isset($request['risk'])) {
            $project->risk()->update(['risk' => $request['risk']]);
        }

        if (isset($request['feasibility_study'])) {
            $project->feasibility_study()->update($request['feasibility_study']);
        }

        if (isset($request['right_of_way'])) {
            $project->right_of_way()->update($request['right_of_way']);
        }

        if (isset($request['resettlement_action_plan'])) {
            $project->resettlement_action_plan()->update($request['resettlement_action_plan']);
        }

        if (isset($request['nep'])) {
            $project->nep()->update($request['nep']);
        }

        if (isset($request['allocation'])) {
            $project->allocation()->update($request['allocation']);
        }

        if (isset($request['disbursement'])) {
            $project->disbursement()->update($request['disbursement']);
        }

        $service->execute($this->data, $project->id, $project->updated_at);
    }
}
