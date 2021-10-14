<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TiersDataTable;
use App\Http\Controllers\Controller;
use App\Models\RefTier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TiersDataTable $dataTable)
    {
        return $dataTable->render('admin.tiers.index', [
            'pageTitle' => 'Budget Tiers'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiers.create', [
            'pageTitle' => 'Add Budget RefTier'
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
            'name' => 'required'
        ]);

        RefTier::create($request->all());

        Alert::success('Success','Successfully saved item');

        return redirect()->route('admin.tiers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RefTier $tier)
    {
        return view('admin.tiers.edit', [
            'pageTitle' => 'Edit Budget RefTier',
            'tier' => $tier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefTier $tier)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $tier->update($request->all());

        Alert::success('Success','Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefTier $tier)
    {
        $tier->delete();

        Alert::success('Success','Successfully deleted item');

        return redirect()->route('admin.tiers.index');
    }
}
