<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchEncoderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $encoders = \App\Models\User::where(DB::raw('CONCAT(first_name, " ",last_name)'),'like','%' . $request->q .'%')
            ->orWhere('username','like','%' . $request->q . '%')
            ->where('role_id', \App\Models\Role::findByName('encoder')->id)
            ->get();

        return view('partials.autocomplete-list', compact('encoders'));
    }
}
