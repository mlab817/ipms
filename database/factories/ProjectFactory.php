<?php

namespace Database\Factories;

use App\Models\Allocation;
use App\Models\RefApprovalLevel;
use App\Models\RefBasis;
use App\Models\RefCipType;
use App\Models\ProjectDisbursement;
use App\Models\ProjectFeasibilityStudy;
use App\Models\RefFundingInstitution;
use App\Models\RefFundingSource;
use App\Models\RefGad;
use App\Models\RefImplementationMode;
use App\Models\ProjectNep;
use App\Models\Office;
use App\Models\RefOperatingUnit;
use App\Models\RefPapType;
use App\Models\RefPdpChapter;
use App\Models\RefPipTypology;
use App\Models\RefPreparationDocument;
use App\Models\RefPrerequisite;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\RefReadinessLevel;
use App\Models\RefRegion;
use App\Models\ProjectResettlementActionPlan;
use App\Models\ProjectRightOfWay;
use App\Models\RefSdg;
use App\Models\RefSpatialCoverage;
use App\Models\RefTenPointAgenda;
use App\Models\RefTier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->catchPhrase;

        return [
            'code'                          => $this->faker->isbn13,
            'uuid'                          => Str::uuid(),
            'title'                         => $title,
            'slug'                          => Str::slug($title),
            'pap_type_id'                   => RefPapType::all()->random()->id,
            'regular_program'               => $this->faker->boolean,
            'description'                   => $this->faker->paragraph,
            'expected_outputs'              => $this->faker->paragraph,
            'spatial_coverage_id'           => RefSpatialCoverage::all()->random()->id,
            'iccable'                       => $this->faker->boolean,
            'approval_level_id'             => RefApprovalLevel::all()->random()->id,
            'approval_date'                 => $this->faker->date(),
            'pip'                           => $this->faker->boolean,
            'pip_typology_id'               => RefPipTypology::all()->random()->id,
            'research'                      => $this->faker->boolean,
            'cip'                           => $this->faker->boolean,
            'cip_type_id'                   => RefCipType::all()->random()->id,
            'trip'                          => $this->faker->boolean,
            'rdip'                          => $this->faker->boolean,
            'rdc_endorsement_required'      => $this->faker->boolean,
            'rdc_endorsed'                  => $this->faker->boolean,
            'rdc_endorsed_date'             => $this->faker->date(),
            'other_infrastructure'          => $this->faker->word,
            'risk'                          => $this->faker->paragraph,
            'pdp_chapter_id'                => RefPdpChapter::all()->random()->id,
            'no_pdp_indicator'              => $this->faker->boolean,
            'gad_id'                        => RefGad::all()->random()->id,
            'target_start_year'             => $this->faker->randomDigit + 2000,
            'target_end_year'               => $this->faker->randomDigit + 2000,
            'preparation_document_id'       => RefPreparationDocument::all()->random()->id,
            'preparation_document_others'   => $this->faker->word,
            'has_fs'                        => $this->faker->boolean,
            'has_row'                       => $this->faker->boolean,
            'has_rap'                       => $this->faker->boolean,
            'employment_generated'          => $this->faker->word,
            'funding_source_id'             => RefFundingSource::all()->random()->id,
            'implementation_mode_id'        => RefImplementationMode::all()->random()->id,
            'other_fs'                      => $this->faker->word,
            'project_status_id'             => ProjectStatus::all()->random()->id,
            'readiness_level_id'            => RefReadinessLevel::all()->random()->id,
            'updates'                       => $this->faker->paragraph,
            'updates_date'                  => $this->faker->date(),
            'uacs_code'                     => $this->faker->ean13, // barcode
            'tier_id'                       => RefTier::all()->random()->id,
            'total_project_cost'            => $this->faker->randomFloat() * 1000,
            'created_by'                    => User::all()->random()->id,
            'has_subprojects'               => $this->faker->boolean,
            'has_infra'                     => $this->faker->boolean,
            'office_id'                     => Office::all()->random()->id,
        ];
    }
}
