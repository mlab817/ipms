<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectIssue;
use Illuminate\Support\Facades\Validator;

class ProjectCheckForIssuesService
{
    public function execute($data, $projectId, $updatedAt)
    {
        $validator = Validator::make($data, (new Project)->rules, [], (new Project)->validationAttributes);

        ProjectIssue::updateOrCreate([
            'project_id' => $projectId,
        ],[
            'issues' => count($validator->errors()) ? json_encode($validator->errors()) : null,
            'project_updated_at' => $updatedAt,
        ]);
    }
}
