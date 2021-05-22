<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Log;
use App\Exports\ForConsolidationExport;
use App\Models\PrexcActivity;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ExportForConsolidation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $link = null;
        $user = $context->user();

        $ou = $user->operating_unit;
        $conso = $ou->consolidates;

        if (!empty($conso)) {
           $prexc_activities = PrexcActivity::with(['operating_unit','prexc_program','prexc_subprogram','banner_program'])->withoutGlobalScopes()->whereIn('banner_program_id',$conso->pluck('id'))->get();

           // Log::info(json_encode($prexc_activities));

           $filename = 'exports/'. time() . '_for consolidation_export.xlsx';

           $excel = (new ForConsolidationExport($prexc_activities))->store($filename, 'public');

           if ($excel) {
              $link = config('app.url') . Storage::url($filename);
           }

        }

        return [
            'link' => $link,
        ];
    }
}
