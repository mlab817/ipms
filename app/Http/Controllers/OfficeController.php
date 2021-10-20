<?php

namespace App\Http\Controllers;

use App\Models\Office;

class OfficeController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function show(Office $office)
    {
        $office->load('projects');

        return view('offices.show', compact('office'));
    }

    public function edit(Office $office)
    {
        return view('offices.edit', compact('office'));
    }
}