<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public $model;

    public function __construct(Project $project)
    {
        $this->model = $project::withoutGlobalScopes();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->model->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->model->findOrFail($id);

        $project->load(
            'bases',
            'technical_readinesses',
            'pdp_chapters',
            'funding_sources',
            'pdp_indicators',
            'infrastructure_subsectors',
            'main_funding_source',
            'spatial_coverage',
            'regions',
            'region_financials',
            'funding_source_financials',
            'funding_source_infrastructures',
            'project_preparation_document',
            'tier',
            'project_status',
            'creator',
            'operating_unit',
            'typology',
            'cip_type',
            'pdp_chapter',
            'sustainable_development_goals',
            'ten_point_agenda',
            'funding_institution',
            'implementation_mode',
            'type',
            'gad'
        );

        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
