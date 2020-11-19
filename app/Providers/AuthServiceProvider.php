<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define(config('permission.access.list_category'), function ($user){
            return $user -> checkUserPermission(config('permission.access.list_category'));
        });

        Gate::define(config('permission.access.list_menu'), function ($user){
            return $user -> checkUserPermission(config('permission.access.list_menu'));
        });
    }
}
