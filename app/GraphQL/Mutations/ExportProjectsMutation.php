<?php

namespace App\GraphQL\Mutations;

use App\Exports\ProjectsExport;
use Illuminate\Support\Facades\Storage;

class ExportProjectsMutation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $link = null;

	    $filename = 'exports/'. time() . '_projects_export.xlsx';

	    $excel = (new ProjectsExport)->store($filename, 'public');

	    if ($excel) {
		    $link = config('app.url') . Storage::url($filename);
	    }

        return [
        	'link' => $link
        ];
    }
}
