<?php

namespace App\Policies;

use App\Models\Place;
use App\Models\User;
use App\References\ProfileStatus;
use App\References\UserType;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlacePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->getAttributes()['type'] == UserType::LISTER;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Place $place)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->getAttributes()['type'] === UserType::LISTER;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Place $place)
    {
        return $user->id === $place->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Place $place)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Place $place)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Place $place)
    {
        //
    }
}
