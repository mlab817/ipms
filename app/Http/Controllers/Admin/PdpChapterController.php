<?php


namespace App\Http\Controllers\Admin;

use App\DataTables\PdpChaptersDataTable;
use App\Http\Controllers\Controller;
use App\Models\RefPdpChapter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PdpChapterController extends Controller
{
    public function index(PdpChaptersDataTable $dataTable)
    {
        return $dataTable->render('admin.pdp_chapters.index', [
            'pageTitle' => 'PDP Chapters',
        ]);
    }

    public function create()
    {
        return view('admin.pdp_chapters.create', [
            'pageTitle' => 'Add PDP Chapter',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $pdpChapter = RefPdpChapter::create($request->all());

        Alert::success('Success','Successfully saved item');

        return redirect()->route('admin.pdp_chapters.index');
    }

    public function show(RefPdpChapter $pdpChapter)
    {

    }

    public function edit(Request $request, RefPdpChapter $pdpChapter)
    {
        return view('admin.pdp_chapters.edit', compact('pdpChapter'))->with([
            'pageTitle' => 'Edit PDP Chapter',
        ]);
    }

    public function update(Request $request, RefPdpChapter $pdpChapter)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $pdpChapter->update($request->all());

        Alert::success('Success','Successfully updated item');

        return back();
    }

    public function destroy(RefPdpChapter $pdpChapter)
    {
        $pdpChapter->delete();

        Alert::success('Success','Successfully deleted item');

        return redirect()->route('admin.pdp_chapters.index');
    }
}
