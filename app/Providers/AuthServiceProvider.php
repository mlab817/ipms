<?php

namespace App\Providers;

use App\Models\PrexcActivity;
use App\Models\Project;
use App\Policies\ProjectPolicy;
use App\Policies\PrexcActivityPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
        PrexcActivity::class => PrexcActivityPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // register Laravel Passport
        Passport::routes();
    }
}
