<?php

namespace App\Policies;

use App\Applicant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any applicant.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can view the applicant .
     *
     * @param  \App\Models\User  $user
     * @param  \App\Applicant  $applicant
     * @return mixed
     */
    public function view(User $user, Applicant $applicant)
    {
       return true;
    }

    /**
     * Determine whether the user can create applicant
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the applicant .
     *
     * @param  \App\Models\User  $user
     * @param  \App\Applicant  $applicant
     * @return mixed
     */
    public function update(User $user, Applicant $applicant)
    {
        //
    }

    /**
     * Determine whether the user can delete the applicant .
     *
     * @param  \App\Models\User  $user
     * @param  \App\Applicant  $applicant
     * @return mixed
     */
    public function delete(User $user, Applicant $applicant)
    {
        //
    }

    /**
     * Determine whether the user can restore the applicant .
     *
     * @param  \App\Models\User  $user
     * @param  \App\Applicant  $applicant
     * @return mixed
     */
    public function restore(User $user, Applicant $applicant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the applicant .
     *
     * @param  \App\Models\User  $user
     * @param  \App\Applicant  $applicant
     * @return mixed
     */
    public function forceDelete(User $user, Applicant $applicant)
    {
        //
    }
}
