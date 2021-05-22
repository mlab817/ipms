<?php

namespace App\Providers;

use App\Models\PrexcActivity;
use App\Models\Project;
use App\Models\Tag;
use App\User;
use App\Observers\PrexcActivityObserver;
use App\Observers\ProjectObserver;
use App\Observers\TagObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        Tag::observe(TagObserver::class);
        Project::observe(ProjectObserver::class);
        PrexcActivity::observe(PrexcActivityObserver::class);
        User::observe(UserObserver::class);
    }
}
