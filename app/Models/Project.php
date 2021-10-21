<?php

namespace App\Models;

use App\Scopes\RoleScope;
use App\Traits\Auditable;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;
    use Auditable;

    public array $rules = [
        'office_id'                         => 'required',
        'title'                             => 'required|max:255',
        'ref_pap_type_id'                   => 'required|exists:ref_pap_types,id',
        'regular_program'                   => 'required|bool',
        'bases'                             => 'required',
        'bases.*'                           => 'exists:ref_bases,id',
        'description'                       => 'required',
        'expected_outputs'                  => 'required',
        'ref_project_status_id'             => 'required|exists:ref_project_statuses,id',
        'operating_units'                   => 'nullable',
        'operating_units.*'                 => 'exists:ref_operating_units,id',
        'pip'                               => 'required|bool',
        'ref_pip_typology_id'               => 'required|exists:ref_pip_typologies,id',
        'trip'                              => 'required|bool',
        'cip'                               => 'required|bool',
        'ref_cip_type_id'                   => 'required|exists:ref_cip_types,id',
        'research'                          => 'required|bool',
        'ict'                               => 'required|bool',
        'covid'                             => 'required|bool',
        'covid_interventions'               => 'nullable',
        'covid_interventions.*'             => 'exists:ref_covid_interventions,id',
        'ref_spatial_coverage_id'           => 'required|exists:ref_spatial_coverages,id',
        'regions'                           => 'nullable',
        'regions.*'                         => 'exists:ref_regions,id',
        'iccable'                           => 'required|bool',
        'ref_approval_level_id'             => 'required_if:iccable,1|exists:ref_approval_levels,id',
        'approval_date'                     => 'nullable|date',
        'ref_gad_id'                        => 'exists:ref_gads,id',
        'rdip'                              => 'required|bool',
        'rdc_endorsement_required'          => 'bool',
        'rdc_endorsed'                      => 'bool',
        'rdc_endorsed_date'                 => 'nullable|date',
        'ref_preparation_document_id'       => 'required',
        'ref_pdp_chapter_id'                => 'required|exists:ref_pdp_chapters,id',
        'pdp_chapters'                      => 'nullable',
        'pdp_chapters.*'                    => 'exists:ref_pdp_chapters,id',
        'target_start_year'                 => 'required|int|min:2016',
        'target_end_year'                   => 'required|int|gte:target_start_year|max:2030',
        'feasibility_study'                 => 'required',
        'feasibility_study.ref_fs_status_id'=> 'required_if:has_fs,1|exists:ref_fs_statuses,id',
        'feasibility_study.needs_assistance'=> 'bool',
        'feasibility_study.y2017'           => 'numeric|min:0',
        'feasibility_study.y2018'           => 'numeric|min:0',
        'feasibility_study.y2019'           => 'numeric|min:0',
        'feasibility_study.y2020'           => 'numeric|min:0',
        'feasibility_study.y2021'           => 'numeric|min:0',
        'feasibility_study.y2022'           => 'numeric|min:0',
        'employment_generated'              => 'nullable|string',
        'ref_funding_source_id'             => 'required|exists:ref_funding_sources,id',
        'ref_implementation_mode_id'        => 'required|exists:ref_implementation_modes,id',
        'updates'                           => 'required',
        'updates_date'                      => 'required|date',
        'ref_tier_id'                       => 'required|exists:ref_tiers,id',
        'uacs_code'                         => 'nullable|required_if:ref_tier_id,1',
        'ref_funding_institution_id'        => 'exclude_unless:ref_funding_source_id,2|exists:ref_funding_institutions,id',
        'prerequisites'                     => 'nullable',
        'prerequisites.*'                   => 'exists:ref_prerequisites,id',
        'sdgs'                              => 'nullable|array',
        'sdgs.*'                            => 'exists:ref_sdgs,id',
        'pdp_indicators'                    => 'nullable|array',
        'pdp_indicators.*'                  => 'exists:ref_pdp_indicators,id',
        'ten_point_agendas'                 => 'nullable|array',
        'ten_point_agendas.*'               => 'exists:ref_ten_point_agendas,id',
        'nep.*'                             => 'required',
        'nep.y2017'                         => 'numeric|min:0',
        'nep.y2018'                         => 'numeric|min:0',
        'nep.y2019'                         => 'numeric|min:0',
        'nep.y2020'                         => 'numeric|min:0',
        'nep.y2021'                         => 'numeric|min:0',
        'nep.y2022'                         => 'numeric|min:0',
        'allocation.*'                      => 'required',
        'allocation.y2017'                  => 'numeric|min:0',
        'allocation.y2018'                  => 'numeric|min:0',
        'allocation.y2019'                      => 'numeric|min:0',
        'allocation.y2020'                      => 'numeric|min:0',
        'allocation.y2021'                      => 'numeric|min:0',
        'disbursement.*'                        => 'required',
        'disbursement.y2017'                    => 'numeric|min:0',
        'disbursement.y2018'                    => 'numeric|min:0',
        'disbursement.y2019'                    => 'numeric|min:0',
        'disbursement.y2020'                    => 'numeric|min:0',
        'disbursement.y2021'                    => 'numeric|min:0',
        'region_investments'                    => 'required',
        'region_investments.*.ref_region_id'    => 'required|exists:ref_regions,id',
        'region_investments.*.y2022'            => 'required|min:0|numeric',
        'region_investments.*.y2023'            => 'required|min:0|numeric',
        'region_investments.*.y2024'            => 'required|min:0:numeric',
        'region_investments.*.y2025'            => 'required|min:0:numeric',
        'region_investments.*.y2026'            => 'required|min:0:numeric',
        'fs_investments'                            => 'required',
        'fs_investments.*.ref_funding_source_id'    => 'required|exists:ref_funding_sources,id',
        'fs_investments.*.y2022'                    => 'required|min:0|numeric',
        'fs_investments.*.y2023'                    => 'required|min:0|numeric',
        'fs_investments.*.y2024'            => 'required|min:0:numeric',
        'fs_investments.*.y2025'            => 'required|min:0:numeric',
        'fs_investments.*.y2026'            => 'required|min:0:numeric',
        'region_infrastructures'                    => 'nullable',
        'region_infrastructures.*.ref_region_id'    => 'required|exists:ref_regions,id',
        'region_infrastructures.*.y2022'            => 'required|min:0|numeric',
        'region_infrastructures.*.y2023'            => 'required|min:0|numeric',
        'region_infrastructures.*.y2024'            => 'required|min:0:numeric',
        'region_infrastructures.*.y2025'            => 'required|min:0:numeric',
        'region_infrastructures.*.y2026'            => 'required|min:0:numeric',
        'fs_infrastructures'                            => 'nullable',
        'fs_infrastructures.*.ref_funding_source_id'    => 'required|exists:ref_funding_sources,id',
        'fs_infrastructures.*.y2022'                    => 'required|min:0|numeric',
        'fs_infrastructures.*.y2023'                    => 'required|min:0|numeric',
        'fs_infrastructures.*.y2024'            => 'required|min:0:numeric',
        'fs_infrastructures.*.y2025'            => 'required|min:0:numeric',
        'fs_infrastructures.*.y2026'            => 'required|min:0:numeric',
        'ref_readiness_level_id'                => 'required|exists:ref_readiness_levels,id',
        'completion_date'                       => 'nullable|date',
        'pap_code'                              => 'required',
    ];

    public array $validationAttributes = [
        'bases'                         => 'basis for implementation',
        'pip'                           => 'PIP',
        'cip'                           => 'CIP',
        'ref_pap_type_id'               => 'program or project',
        'ref_project_status_id'         => 'status of implementation readiness',
        "ref_pip_typology_id"           => 'PIP typology',
        "ref_cip_type_id"               => 'type of CIP',
        'research'                      => 'research and development',
        'ifp'                           => 'infrastructure flagship project(IFP)',
        'covid'                         => 'responsive to COVID-19/New Normal Intervention',
        "ref_spatial_coverage_id"       => 'spatial coverage',
        "ref_preparation_document_id"   => 'preparation document',
        "ref_pdp_chapter_id"            => 'PDP chapter',
        "target_start_year"             => 'start of project implementation',
        "target_end_year"               => 'year of project completion',
        "ref_funding_source_id"         => 'funding source',
        "ref_implementation_mode_id"    => 'mode of implementation',
        "updates_date"                  => 'as of date of updates',
        "ref_tier_id"                   => 'categorization',
        "ref_readiness_level_id"        => 'level of readiness',
        "pap_code"                      => 'PAP code',
        'uacs_code'                     => 'UACS code',
        'fs_investments'                => 'investment by funding source',
        'region_investments'            => 'investment by region',
        'fs_infrastructures'            => 'infrastructure cost by funding source',
        'region_infrastructures'        => 'infrastructure cost by region',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new RoleScope);
    }

    protected $appends = [
        'is_validated'
    ];

    protected $fillable = [
        'ipms_id',
        'office_id',
        'uuid',
        'code', // pipol code
        'title',
        'ref_pap_type_id',
        'regular_program',
        'has_infra',
        // implementation bases
//        'description',
        'summary',
//        'expected_outputs',
        'total_project_cost',
        // implementing_agencies
        'ref_spatial_coverage_id',
        'iccable',
        'ref_approval_level_id',
        'approval_level_date',
        'pip',
        'ref_pip_typology_id',
        'research',
        'cip',
        'ref_cip_type_id',
        'trip',
        'rdip',
        'rdc_endorsement_required',
        'rdc_endorsed',
        'rdc_endorsed_date',
        // trip infra sector and subsectors
        'other_infrastructure',
        // prerequisites
//        'risk',
//        'mitigation_strategy',
        // infra cost
        'ref_pdp_chapter_id',
        // pdp_chapters
        // pdp_indicators
        'no_pdp_indicator',
        // ten point agenda
        // sdg
        'ref_gad_id',
        'target_start_year',
        'target_end_year',
        'ref_preparation_document_id',
        // feasibility study
        'preparation_document_others',
        'has_fs',
        'has_row',
        'has_rap',
        // rowa
        // resettlement
        'employment_generated',
        // costs
        'ref_funding_source_id',
        'ref_funding_institution_id',
        'ref_implementation_mode_id',
        'other_fs',
        'ref_project_status_id',
        'ref_readiness_level_id',
//        'updates',
//        'updates_date',
        'uacs_code',
        'ref_tier_id',
        // nep
        // allocation
        // disbursement
        'has_subprojects',
        'covid',
//        'ifp',
        'research',
        'ict',
        'office_id',
        'trip_info',
        'ref_submission_status_id',
        'ref_reason_id',
        'other_reason',
        'completion_date',
        'validated_at',
    ];

    protected $casts = [
        'updated_at' => 'datetime:Y-m-d h:m A',
        'created_at' => 'datetime:Y-m-d h:m A',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function getRouteKey(): string
    {
        return $this->uuid;
    }

    /**
     * BelongsTo Relationships
     */
    public function approval_level(): BelongsTo
    {
        return $this->belongsTo(RefApprovalLevel::class, 'ref_approval_level_id')->withDefault(['name' => '_']);
    }

    public function cip_type(): BelongsTo
    {
        return $this->belongsTo(RefCipType::class,'ref_cip_type_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'creator_id','id');
    }

    public function funding_source(): BelongsTo
    {
        return $this->belongsTo(RefFundingSource::class, 'ref_funding_source_id')->withDefault(['name' => '_']);
    }

    public function funding_institution(): BelongsTo
    {
        return $this->belongsTo(RefFundingInstitution::class, 'ref_funding_institution_id')->withDefault();
    }

    public function gad(): BelongsTo
    {
        return $this->belongsTo(RefGad::class, 'ref_gad_id')->withDefault();
    }

    public function implementation_mode(): BelongsTo
    {
        return $this->belongsTo(RefImplementationMode::class, 'ref_implementation_mode_id')->withDefault();
    }

    public function issue(): HasOne
    {
        return $this->hasOne(ProjectIssue::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class,'office_id')->withDefault();
    }

    public function pap_type(): BelongsTo
    {
        return $this->belongsTo(RefPapType::class, 'ref_pap_type_id')->withDefault();
    }

    public function pdp_chapter(): BelongsTo
    {
        return $this->belongsTo(RefPdpChapter::class, 'ref_pdp_chapter_id')->withDefault();
    }

    public function pip_typology(): BelongsTo
    {
        return $this->belongsTo(RefPipTypology::class,'ref_pip_typology_id');
    }

    public function preparation_document(): BelongsTo
    {
        return $this->belongsTo(RefPreparationDocument::class, 'ref_preparation_document_id')->withDefault(['name' => '_']);
    }

    public function project_status(): BelongsTo
    {
        return $this->belongsTo(RefProjectStatus::class, 'ref_project_status_id')->withDefault();
    }

    public function reason(): BelongsTo
    {
        return $this->belongsTo(RefReason::class, 'ref_reason_id')->withDefault();
    }

    public function spatial_coverage(): BelongsTo
    {
        return $this->belongsTo(RefSpatialCoverage::class, 'ref_spatial_coverage_id')->withDefault();
    }

    public function submission_status(): BelongsTo
    {
        return $this->belongsTo(RefSubmissionStatus::class, 'ref_submission_status_id')
            ->withDefault(['name' => 'None']);
    }

    public function tier(): BelongsTo
    {
        return $this->belongsTo(RefTier::class, 'ref_tier_id')->withDefault();
    }

    /**
     * BelongsToMany Relationships
     */
    public function bases(): BelongsToMany
    {
        return $this->belongsToMany(RefBasis::class, 'project_basis', 'project_id', 'ref_basis_id');
    }

    public function covid_interventions(): BelongsToMany
    {
        return $this->belongsToMany(RefCovidIntervention::class, 'project_covid_intervention', 'project_id', 'ref_covid_intervention_id');
    }

    public function funding_institutions(): BelongsToMany
    {
        return $this->belongsToMany(RefFundingInstitution::class);
    }

    public function funding_sources(): BelongsToMany
    {
        return $this->belongsToMany(RefFundingSource::class, 'project_funding_source', 'project_id', 'ref_funding_source_id');
    }

    public function infrastructure_sectors(): BelongsToMany
    {
        return $this->belongsToMany(RefInfrastructureSector::class,'project_infrastructure_sector','project_id','is_id');
    }

    public function infrastructure_subsectors(): BelongsToMany
    {
        return $this->belongsToMany(RefInfrastructureSubsector::class,'project_infrastructure_subsector','project_id','is_id','id','id');
    }

    public function pdp_chapters(): BelongsToMany
    {
        return $this->belongsToMany(RefPdpChapter::class, 'project_pdp_chapter', 'project_id', 'ref_pdp_chapter_id');
    }

    public function pdp_indicators(): BelongsToMany
    {
        return $this->belongsToMany(RefPdpIndicator::class,'project_pdp_indicator','project_id','pi_id');
    }

    public function prerequisites(): BelongsToMany
    {
        return $this->belongsToMany(RefPrerequisite::class,'project_prerequisite','project_id','ref_prerequisite_id');
    }

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(RefRegion::class, 'project_region', 'project_id', 'ref_region_id');
    }

    public function sdgs(): BelongsToMany
    {
        return $this->belongsToMany(RefSdg::class, 'project_sdg', 'project_id','ref_sdg_id');
    }

    public function ten_point_agendas(): BelongsToMany
    {
        return $this->belongsToMany(RefTenPointAgenda::class,'project_ten_point_agenda','project_id','tpa_id','id','id');
    }

    /**
     * HasOne Relationships
     */
    public function allocation(): HasOne
    {
        return $this->hasOne(ProjectAllocation::class,'project_id')->withDefault();
    }

    public function description(): HasOne
    {
        return $this->hasOne(ProjectDescription::class)->withDefault();
    }

    public function disbursement(): HasOne
    {
        return $this->hasOne(ProjectDisbursement::class)->withDefault();
    }

    public function expected_output(): HasOne
    {
        return $this->hasOne(ProjectExpectedOutput::class)->withDefault();
    }

    public function feasibility_study(): HasOne
    {
        return $this->hasOne(ProjectFeasibilityStudy::class)->withDefault();
    }

    public function pipol(): HasOne
    {
        return $this->hasOne(Pipol::class,'ipms_id','id');
    }

    public function resettlement_action_plan(): HasOne
    {
        return $this->hasOne(ProjectResettlementActionPlan::class, 'project_id', 'id')->withDefault();
    }

    public function right_of_way(): HasOne
    {
        return $this->hasOne(ProjectRightOfWay::class, 'project_id', 'id')->withDefault();
    }

    public function risk(): HasOne
    {
        return $this->hasOne(ProjectRisk::class)->withDefault();
    }

    public function review(): HasOne
    {
        return $this->hasOne(ProjectReview::class,'project_id','id');
    }

    public function project_update(): HasOne
    {
        return $this->hasOne(ProjectUpdate::class)->withDefault();
    }

    /**
     * HasMany Relationships
     */
    public function fs_investments(): HasMany
    {
        return $this->hasMany(ProjectFsInvestment::class);
    }

    public function fs_infrastructures(): HasMany
    {
        return $this->hasMany(ProjectFsInfrastructure::class);
    }

    public function nep(): HasOne
    {
        return $this->hasOne(ProjectNep::class)->withDefault();
    }

    public function operating_units(): BelongsToMany
    {
        return $this->belongsToMany(RefOperatingUnit::class, 'project_operating_unit', 'project_id', 'ref_operating_unit_id');
    }

    public function region_investments(): HasMany
    {
        return $this->hasMany(ProjectRegionInvestment::class);
    }

    public function region_infrastructures(): HasMany
    {
        return $this->hasMany(ProjectRegionInfrastructure::class);
    }



    public function subprojects(): HasMany
    {
        return $this->hasMany(Subproject::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'project_user_permission','project_id','user_id','id','id')
            ->withPivot('read','update','delete','review','comment');
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    /**
     * Endorse the PAP
     */
    public function endorse()
    {
        $this->submission_status()->associate(RefSubmissionStatus::findByName('Endorsed'));
        $this->updated_at = now();
        $this->saveQuietly();

        $this->audit_logs()->create([
            'description' => 'endorsed',
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Drop the PAP
     */
    public function drop()
    {
        $this->submission_status()->associate(RefSubmissionStatus::findByName('Dropped'));
        $this->updated_at = now();
        $this->saveQuietly();

        $this->audit_logs()->create([
            'description' => 'dropped',
            'user_id' => auth()->id(),
        ]);
    }

    public function toggleValidation()
    {
        if (! $this->validated_at) {
            $this->validated_at = now();
            $this->saveQuietly();

            $this->audit_logs()->create([
                'description' => 'validated',
                'user_id' => auth()->id(),
            ]);
        } else {
            $this->validated_at = null;
            $this->saveQuietly();

            $this->audit_logs()->create([
                'description' => 'invalidated',
                'user_id' => auth()->id(),
            ]);
        }
    }

    public function isValidated(): bool
    {
        return !!$this->validated_at;
    }

    public function getIsValidatedAttribute(): bool
    {
        return $this->isValidated();
    }

    public function isDropped()
    {
        return optional($this->submission_status)->name == 'Dropped';
    }

    public function isEndorsed()
    {
        return optional($this->submission_status)->name == 'Endorsed';
    }

    public function investment(): HasOne
    {
        return $this->hasOne(ProjectFsInvestment::class,'project_id')
            ->selectRaw('sum(y2016) as "y2016"')
            ->selectRaw('sum(y2017) as "y2017"')
            ->selectRaw('sum(y2018) as "y2018"')
            ->selectRaw('sum(y2019) as "y2019"')
            ->selectRaw('sum(y2020) as "y2020"')
            ->selectRaw('sum(y2021) as "y2021"')
            ->selectRaw('sum(y2022) as "y2022"')
            ->selectRaw('sum(y2023) as "y2023"')
            ->selectRaw('sum(y2024) as "y2024"')
            ->selectRaw('sum(y2025) as "y2025"')
            ->selectRaw('sum(y2016+y2017+y2018+y2019+y2020+y2021+y2022+y2023+y2024+y2025) AS total')
            ->groupBy('project_id');
    }

    public function infrastructure(): HasOne
    {
        return $this->hasOne(ProjectFsInfrastructure::class,'project_id')
            ->selectRaw('sum(y2016) as "y2016"')
            ->selectRaw('sum(y2017) as "y2017"')
            ->selectRaw('sum(y2018) as "y2018"')
            ->selectRaw('sum(y2019) as "y2019"')
            ->selectRaw('sum(y2020) as "y2020"')
            ->selectRaw('sum(y2021) as "y2021"')
            ->selectRaw('sum(y2022) as "y2022"')
            ->selectRaw('sum(y2023) as "y2023"')
            ->selectRaw('sum(y2024) as "y2024"')
            ->selectRaw('sum(y2025) as "y2025"')
            ->selectRaw('sum(y2016+y2017+y2018+y2019+y2020+y2021+y2022+y2023+y2024+y2025) AS total')
            ->groupBy('project_id');
    }

    public function getTotalInvestmentAttribute(): float
    {
        return $this->investment->total ?? 0;
    }

    public function getTotalInfrastructureAttribute(): float
    {
        return $this->infrastructure->total ?? 0;
    }

    public function getImplementationLengthAttribute(): int
    {
        return (int) $this->target_end_year
            - (int) $this->target_start_year
            + 1;
    }

    public function getDisbursementTotalAttribute(): float
    {
        if ($this->disbursement()->exists()) {
            return floatval($this->disbursement->y2016)
                    + floatval($this->disbursement->y2017)
                        + floatval($this->disbursement->y2018)
                            + floatval($this->disbursement->y2019)
                                + floatval($this->disbursement->y2020)
                                    + floatval($this->disbursement->y2021)
                                        + floatval($this->disbursement->y2022)
                                            + floatval($this->disbursement->y2023);
        }
        return 0;
    }

    public function getPermissionsAttribute(): array
    {
        $user = auth()->user();

        return [
            'view'          => true,
            'update'        => $user ? $user->can('update', $this) : false,
            'delete'        => $user ? $user->can('delete', $this) : false,
            'restore'       => $user ? $user->can('restore', $this) : false,
            'force-delete'  => $user ? $user->can('force-delete', $this) : false,
        ];
    }

    public function getProjectStatusNameAttribute()
    {
        return optional($this->project_status)->name;
    }

    public function getPipolCodeAttribute()
    {
        return $this->review
            ? $this->review->pipol_code
            : ($this->pipol->pipol_code ?? 'NO DATA');
    }

    // relationships

    public function scopeOwn($query)
    {
        $userId = auth() ? auth()->id() : null;

        return $query->where('creator_id', $userId);
    }

    public function scopeOffice($query)
    {
        $user = auth() ? auth()->user() : null;

        if ($user) {
            $officeId = $user->office_id;

            if ($officeId) {
                $query->where('office_id', $officeId);
            }
        }

        return $query;
    }

    public function scopeTrip($query)
    {
        return $query->where('has_infra', true);
    }

    public function scopeHasSubprojects($query)
    {
        return $query->where('has_subprojects', true);
    }

    public function scopeAssigned($query)
    {
        if (! auth()->user()) {
            return $query;
        }
        return $query->whereIn('id', auth()->user()->assigned_projects->pluck('id')->toArray());
    }

    public static function search(string $query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                $q->where('title', 'LIKE', '%'. $query . '%');
            });
    }

    public static function searchTrashed(string $query)
    {
        return empty($query) ? static::onlyTrashed()
            : static::onlyTrashed()->where(function($q) use ($query) {
                $q->where('title', 'LIKE', '%'. $query . '%');
            });
    }
}
