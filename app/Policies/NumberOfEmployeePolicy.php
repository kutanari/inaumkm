<?php

namespace App\Policies;

use App\Models\User;
use App\Models\NumberOfEmployee;
use Illuminate\Auth\Access\HandlesAuthorization;

class NumberOfEmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the numberOfEmployee can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list numberofemployees');
    }

    /**
     * Determine whether the numberOfEmployee can view the model.
     */
    public function view(User $user, NumberOfEmployee $model): bool
    {
        return $user->hasPermissionTo('view numberofemployees');
    }

    /**
     * Determine whether the numberOfEmployee can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create numberofemployees');
    }

    /**
     * Determine whether the numberOfEmployee can update the model.
     */
    public function update(User $user, NumberOfEmployee $model): bool
    {
        return $user->hasPermissionTo('update numberofemployees');
    }

    /**
     * Determine whether the numberOfEmployee can delete the model.
     */
    public function delete(User $user, NumberOfEmployee $model): bool
    {
        return $user->hasPermissionTo('delete numberofemployees');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete numberofemployees');
    }

    /**
     * Determine whether the numberOfEmployee can restore the model.
     */
    public function restore(User $user, NumberOfEmployee $model): bool
    {
        return false;
    }

    /**
     * Determine whether the numberOfEmployee can permanently delete the model.
     */
    public function forceDelete(User $user, NumberOfEmployee $model): bool
    {
        return false;
    }
}
