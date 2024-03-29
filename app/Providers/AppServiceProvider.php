<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\ProjectReview;
use App\Models\User;
use App\Observers\ProjectObserver;
use App\Observers\ReviewObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(125);

        Project::observe(ProjectObserver::class);
        ProjectReview::observe(ReviewObserver::class);
        User::observe(UserObserver::class);

        Paginator::useBootstrap();

        // blade directives
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });

        Blade::if('ipd', function () {
            return auth()->check() && auth()->user()->isIpd();
        });

        Paginator::defaultView('includes.primer-pagination');
        Paginator::defaultSimpleView('includes.primer-simple-pagination');
    }
}
