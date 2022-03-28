<?php

namespace App\Policies;

use App\Models\BasicProfile;
use App\Models\User;
use App\References\ProfileStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasicProfilePolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BasicProfile  $basicProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BasicProfile $basicProfile)
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
        // dd($user->profile_status); // 1, 3
        // dd(ProfileStatus::COMPLETE); // 2
        // dd(!($user->profile_status == ProfileStatus::COMPLETE));
        $is_allowed = false;

        if($user->profile_status == ProfileStatus::COMPLETE){
            $is_allowed = false;
        }

        if($user->profile_status == ProfileStatus::PROCESSING){
            $is_allowed = false;
        }

        if($user->profile_status == ProfileStatus::INCOMPLETE){
            $is_allowed = true;
        }

        return $is_allowed;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BasicProfile  $basicProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BasicProfile $basicProfile)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BasicProfile  $basicProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BasicProfile $basicProfile)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BasicProfile  $basicProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BasicProfile $basicProfile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BasicProfile  $basicProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BasicProfile $basicProfile)
    {
        //
    }
}
