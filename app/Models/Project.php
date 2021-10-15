<?php

namespace App\Models;

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

    public function preparation_document(): BelongsTo
    {
        return $this->belongsTo(RefPreparationDocument::class, 'ref_preparation_document_id')->withDefault(['name' => '_']);
    }

    public function project_status(): BelongsTo
    {
        return $this->belongsTo(ProjectStatus::class, 'ref_project_status_id')->withDefault();
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
        return $this->belongsTo(RefSubmissionStatus::class, 'ref_submission_status_id')->withDefault();
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
        return $this->belongsToMany(RefCovidIntervention::class);
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
