<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectIssue;
use App\Models\RefRegion;
use Illuminate\Support\Facades\Validator;

class ProjectCheckForIssuesService
{
    public function execute($data, $projectId, $updatedAt)
    {
        $validator = Validator::make($data, (new Project)->rules, [], (new Project)->validationAttributes);

        $validator->after(function ($validator) use ($data) {
            if ($data['ref_spatial_coverage_id'] == 1) {
                $regions = RefRegion::whereNotIn('id',[99,100])->pluck('id')->toArray();
                $compareRegions = array_diff($regions,$data['regions']);
                if (count($compareRegions)) {
                    $validator->errors()->add(
                        'regions', 'All regions except NB and N/A should be included for nationwide spatial coverage!'
                    );
                }
            }

            if ($data['ref_spatial_coverage_id'] == 2) {
                if (count($data['regions']) < 2) {
                    $validator->errors()->add(
                        'regions', 'At least two regions must be included if the spatial coverage is inter-regional'
                    );
                }
            }

            if ($data['ref_spatial_coverage_id'] == 3) {
                if (count($data['regions']) != 1) {
                    $validator->errors()->add(
                        'regions', 'Only one region must be included for region-specific spatial coverage'
                    );
                }
            }

            if ($data['ref_spatial_coverage_id'] == 4) {
                if (count($data['regions']) > 1) {
                    $validator->errors()->add(
                        'regions', 'Only one region must be included for region-specific spatial coverage'
                    );
                }
            }
        });

        ProjectIssue::updateOrCreate([
            'project_id' => $projectId,
        ],[
            'issues' => count($validator->errors()) ? json_encode($validator->errors()) : null,
            'project_updated_at' => $updatedAt,
        ]);
    }
}
