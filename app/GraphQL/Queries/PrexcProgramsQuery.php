<?php

namespace App\GraphQL\Queries;

use App\Models\PrexcProgram;

class PrexcProgramsQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
     public function __invoke($_, array $args)
     {
         $prexc_programs = [];

         $user = auth()->user();

         if ($user->role && $user->role->name === 'encoder') {
           $ou = $user->operating_unit;

           $prexc_programs = $ou->prexc_programs;
         } else {
           $prexc_programs = PrexcProgram::all();
         }

         return $prexc_programs;
     }
}
