<?php

namespace App\GraphQL\Queries;

use App\Exports\ProgramsExport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ExportExcelQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        // TODO implement the resolver
        $link = null;
        $user = $context->user();

        $ou = $user->operating_unit;
        $pa = $ou->prexc_activities;
        $filename = 'exports/'. time() . '_export.xlsx';

        $excel = (new ProgramsExport($pa))->store($filename, 'public');
        
        if ($excel) {
            $link = config('app.url') . Storage::url($filename);
        }

        return [
            'link' => $link
        ];
    }
}
