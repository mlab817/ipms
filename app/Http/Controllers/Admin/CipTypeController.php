<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CipTypesDataTable;
use App\Http\Controllers\Controller;
use App\Models\RefCipType;
use Illuminate\Http\Request;

class CipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CipTypesDataTable $dataTable)
    {
        return $dataTable->render('admin.cip_types.index', [
            'pageTitle' => 'CIP Types',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cip_types.create', [
            'pageTitle' => 'Add CIP Type',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        RefCipType::create($request->all());

        return redirect()->route('admin.cip_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RefCipType $cipType)
    {
        return view('admin.cip_types.edit', [
            'pageTitle' => 'Edit CIP Type',
            'cip_type' => $cipType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefCipType $cipType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $cipType->update($request->all());

        return redirect()->route('admin.cip_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefCipType $cipType)
    {
        $cipType->delete();

        return redirect()->route('admin.cip_types.index');
    }
}
