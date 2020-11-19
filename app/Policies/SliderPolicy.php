<?php

namespace App\Policies;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user -> checkUserPermission(config('permission.access.list_slider'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user -> checkUserPermission(config('permission.access.add_slider'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return $user -> checkUserPermission(config('permission.access.edit_slider'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return $user -> checkUserPermission(config('permission.access.delete_slider'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function restore(User $user, Slider $slider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slider  $slider
     * @return mixed
     */
    public function forceDelete(User $user, Slider $slider)
    {
        //
    }
}
