<?php

namespace App\GraphQL\Mutations;

use App\Models\OperatingUnit;
use App\User;

class AssignReviewer
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
    		$status = 'ERROR';
    		$message = 'Something went wrong';

        $ou = OperatingUnit::find($args['operating_unit_id']);
        $users = User::find($args['users']);

        if ($ou) {
    		$ou->reviewers()->sync($users);
    		$status = 'SUCCESS';
    		$message = 'Successfully assigned reviewer';
        } else {
        	$message = 'Operating unit or user not found';
        	$ou = null;
        }

        return [
        	'message' => $message,
        	'status' => $status,
        	'operating_unit' => $ou
        ];
    }
}
