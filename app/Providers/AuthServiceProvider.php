<?php

namespace App\Providers;

use App\Policies\SliderPolicy;
use App\Services\PermissionGateAndPolicyAccess;
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
        'App\Models\Slider' => SliderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();
        $permissionGateAndPolicy -> setGateAndPolicyAccess();
    }
}
