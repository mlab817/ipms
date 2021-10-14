<?php

namespace Database\Seeders;

use App\Models\ProjectFeasibilityStudy;
use App\Models\ProjectFsInfrastructure;
use App\Models\ProjectFsInvestment;
use App\Models\OuInfrastructure;
use App\Models\OuInvestment;
use App\Models\Project;
use App\Models\RegionInfrastructure;
use App\Models\RegionInvestment;
use App\Models\ProjectResettlementActionPlan;
use App\Models\ProjectRightOfWay;
use Database\Factories\OuInvestmentFactory;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::unsetEventDispatcher();

        Project::factory()
            ->has(ProjectRightOfWay::factory(),'right_of_way')
            ->has(ProjectResettlementActionPlan::factory(),'resettlement_action_plan')
            ->has(ProjectFeasibilityStudy::factory(), 'feasibility_study')
//            ->has(OuInvestment::factory()->count(2), 'ou_investments')
//            ->has(OuInfrastructure::factory()->count(2), 'ou_infrastructures')
            ->has(RegionInvestment::factory()->count(2), 'region_investments')
            ->has(RegionInfrastructure::factory()->count(2), 'region_infrastructures')
            ->has(ProjectFsInvestment::factory()->count(2), 'fs_investments')
            ->has(ProjectFsInfrastructure::factory()->count(2), 'fs_infrastructures')
            ->count(50)
            ->create();
    }
}
