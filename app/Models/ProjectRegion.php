<?php

namespace App\Models;

use Log;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectRegion extends Pivot
{
    protected static function boot()
    {
    	parent::boot();

    	Log::debug('syncing');

    	static::saving(function ($model) {
    		Log::debug('syncing');
    	});

    	static::updating(function ($model) {
    		Log::debug('syncing');
    	});
    }
}
