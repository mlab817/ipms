<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Format the data prior to validation
     */
    public function prepareForValidation()
    {
        $this->merge([
            'feasibility_study'     => [
                'ref_fs_status_id'  => $this->feasibility_study['ref_fs_status_id'] ?? null,
                'needs_assistance'  => $this->feasibility_study['needs_assistance'],
                'y2017'     => str_replace(',', '', $this->feasibility_study['y2017']),
                'y2018'     => str_replace(',', '', $this->feasibility_study['y2018']),
                'y2019'     => str_replace(',', '', $this->feasibility_study['y2019']),
                'y2020'     => str_replace(',', '', $this->feasibility_study['y2020']),
                'y2021'     => str_replace(',', '', $this->feasibility_study['y2021']),
                'y2022'     => str_replace(',', '', $this->feasibility_study['y2022']),
                'completion_date'  => $this->feasibility_study['completion_date'],
            ],
            'right_of_way'     => [
                'y2017'     => str_replace(',', '', $this->right_of_way['y2017']),
                'y2018'     => str_replace(',', '', $this->right_of_way['y2018']),
                'y2019'     => str_replace(',', '', $this->right_of_way['y2019']),
                'y2020'     => str_replace(',', '', $this->right_of_way['y2020']),
                'y2021'     => str_replace(',', '', $this->right_of_way['y2021']),
                'y2022'     => str_replace(',', '', $this->right_of_way['y2022']),
                'affected_households'  => $this->right_of_way['affected_households'],
            ],
            'resettlement_action_plan'     => [
                'y2017'     => str_replace(',', '', $this->resettlement_action_plan['y2017']),
                'y2018'     => str_replace(',', '', $this->resettlement_action_plan['y2018']),
                'y2019'     => str_replace(',', '', $this->resettlement_action_plan['y2019']),
                'y2020'     => str_replace(',', '', $this->resettlement_action_plan['y2020']),
                'y2021'     => str_replace(',', '', $this->resettlement_action_plan['y2021']),
                'y2022'     => str_replace(',', '', $this->resettlement_action_plan['y2022']),
                'affected_households'  => $this->resettlement_action_plan['affected_households'],
            ],
            'region_investments'    => collect($this->region_investments)->map(function($ri) {
                return [
                    'ref_region_id' => $ri['ref_region_id'],
                    'y2022'         => str_replace(',', '', $ri['y2022']),
                    'y2023'         => str_replace(',', '', $ri['y2023']),
                    'y2024'         => str_replace(',', '', $ri['y2024']),
                    'y2025'         => str_replace(',', '', $ri['y2025']),
                    'y2026'         => str_replace(',', '', $ri['y2026']),
                ];
            }),
            'region_infrastructures'    => collect($this->region_infrastructures)->map(function($ri) {
                return [
                    'ref_region_id' => $ri['ref_region_id'],
                    'y2022'         => str_replace(',', '', $ri['y2022']),
                    'y2023'         => str_replace(',', '', $ri['y2023']),
                    'y2024'         => str_replace(',', '', $ri['y2024']),
                    'y2025'         => str_replace(',', '', $ri['y2025']),
                    'y2026'         => str_replace(',', '', $ri['y2026']),
                ];
            }),
            'fs_investments'        => collect($this->fs_investments)->map(function($fi) {
                return [
                    'ref_funding_source_id'     => $fi['ref_funding_source_id'],
                    'y2022'                     => str_replace(',', '', $fi['y2022']),
                    'y2023'                     => str_replace(',', '', $fi['y2023']),
                    'y2024'                     => str_replace(',', '', $fi['y2024']),
                    'y2025'                     => str_replace(',', '', $fi['y2025']),
                    'y2026'                     => str_replace(',', '', $fi['y2026']),
                ];
            }),
            'fs_infrastructures'        => collect($this->fs_infrastructures)->map(function($fi) {
                return [
                    'ref_funding_source_id'     => $fi['ref_funding_source_id'],
                    'y2022'                     => str_replace(',', '', $fi['y2022']),
                    'y2023'                     => str_replace(',', '', $fi['y2023']),
                    'y2024'                     => str_replace(',', '', $fi['y2024']),
                    'y2025'                     => str_replace(',', '', $fi['y2025']),
                    'y2026'                     => str_replace(',', '', $fi['y2026']),
                ];
            }),
            'nep'                   => [
                'y2017'     => str_replace(',', '', $this->nep['y2017']),
                'y2018'     => str_replace(',', '', $this->nep['y2018']),
                'y2019'     => str_replace(',', '', $this->nep['y2019']),
                'y2020'     => str_replace(',', '', $this->nep['y2020']),
                'y2021'     => str_replace(',', '', $this->nep['y2021']),
                'y2022'     => str_replace(',', '', $this->nep['y2022']),
            ],
            'allocation'            => [
                'y2017'     => str_replace(',', '', $this->allocation['y2017']),
                'y2018'     => str_replace(',', '', $this->allocation['y2018']),
                'y2019'     => str_replace(',', '', $this->allocation['y2019']),
                'y2020'     => str_replace(',', '', $this->allocation['y2020']),
                'y2021'     => str_replace(',', '', $this->allocation['y2021']),
                'y2022'     => str_replace(',', '', $this->allocation['y2022']),
            ],
            'disbursement'          => [
                'y2017'     => str_replace(',', '', $this->disbursement['y2017']),
                'y2018'     => str_replace(',', '', $this->disbursement['y2018']),
                'y2019'     => str_replace(',', '', $this->disbursement['y2019']),
                'y2020'     => str_replace(',', '', $this->disbursement['y2020']),
                'y2021'     => str_replace(',', '', $this->disbursement['y2021']),
                'y2022'     => str_replace(',', '', $this->disbursement['y2022']),
            ],
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
            'target_start_year'                 => 'required|int|min:2000',
            'target_end_year'                   => 'required|int|gte:target_start_year',
            'feasibility_study'                 => 'required',
            'feasibility_study.ref_fs_status_id'=> 'nullable|required_if:has_fs,1|exists:ref_fs_statuses,id',
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
            'region_infrastructures'                    => 'required',
            'region_infrastructures.*.ref_region_id'    => 'required|exists:ref_regions,id',
            'region_infrastructures.*.y2022'            => 'required|min:0|numeric',
            'region_infrastructures.*.y2023'            => 'required|min:0|numeric',
            'region_infrastructures.*.y2024'            => 'required|min:0:numeric',
            'region_infrastructures.*.y2025'            => 'required|min:0:numeric',
            'region_infrastructures.*.y2026'            => 'required|min:0:numeric',
            'fs_infrastructures'                            => 'required',
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
    }

    public function messages()
    {
        return [
            'funding_sources.required'      => 'Please select at least one.',
            'pdp_chapters.required'         => 'Please select at least one.',
            'operating_units.required'      => 'Please select at least one.',
            'rdc_endorsed_date.required_if' => 'Please indicate endorsement date if the PAP has been endorsed by RDC.',
            'uacs_code.required_if'         => 'UACS Code is required if the PAP is ongoing.',
        ];
    }
}
