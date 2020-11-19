<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicyAccess()
    {
        $this->sliderPolicy();
        $this->CategoryGate();
        $this->MenuGate();
    }

    private function sliderPolicy()
    {
        Gate::define('list_slider', 'App\Policies\SliderPolicy@view');
        Gate::define('add_slider', 'App\Policies\SliderPolicy@create');
        Gate::define('edit_slider', 'App\Policies\SliderPolicy@update');
        Gate::define('delete_slider', 'App\Policies\SliderPolicy@delete');
    }

    private function CategoryGate()
    {
        Gate::define(config('permission.access.list_category'), function ($user) {
            return $user->checkUserPermission(config('permission.access.list_category'));
        });
    }

    private function MenuGate()
    {
        Gate::define(config('permission.access.list_menu'), function ($user) {
            return $user->checkUserPermission(config('permission.access.list_menu'));
        });
    }
}
