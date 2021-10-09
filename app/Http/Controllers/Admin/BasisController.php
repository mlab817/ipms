<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BasesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasisStoreRequest;
use App\Http\Requests\BasisUpdateRequest;
use App\Models\RefBasis;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BasesDataTable $dataTable)
    {
        return $dataTable->render('admin.bases.index', [
            'pageTitle' => 'RefBasis for Implementation',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bases.create', [
            'pageTitle' => 'Create Implementation RefBasis',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BasisStoreRequest $request)
    {
        RefBasis::create($request->all());

        Alert::success('Success', 'Successfully saved item.');

        return redirect()->route('admin.bases.index');
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
    public function edit(RefBasis $basis)
    {
        return view('admin.bases.edit', [
            'pageTitle' => 'Edit Implementation RefBasis',
            'basis'     => $basis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BasisUpdateRequest $request
     * @param RefBasis $basis
     * @return \Illuminate\Http\Response
     */
    public function update(BasisUpdateRequest $request, RefBasis $basis)
    {
        $basis->update($request->all());

        Alert::success('Success', 'Successfully updated item.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefBasis $basis)
    {
        $basis->delete();

        Alert::success('Success', 'Successfully deleted item.');

        return redirect()->route('admin.bases.index');
    }
}
