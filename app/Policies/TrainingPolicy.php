<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Training;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the training can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list trainings');
    }

    /**
     * Determine whether the training can view the model.
     */
    public function view(User $user, Training $model): bool
    {
        return $user->hasPermissionTo('view trainings');
    }

    /**
     * Determine whether the training can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create trainings');
    }

    /**
     * Determine whether the training can update the model.
     */
    public function update(User $user, Training $model): bool
    {
        return $user->hasPermissionTo('update trainings');
    }

    /**
     * Determine whether the training can delete the model.
     */
    public function delete(User $user, Training $model): bool
    {
        return $user->hasPermissionTo('delete trainings');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete trainings');
    }

    /**
     * Determine whether the training can restore the model.
     */
    public function restore(User $user, Training $model): bool
    {
        return false;
    }

    /**
     * Determine whether the training can permanently delete the model.
     */
    public function forceDelete(User $user, Training $model): bool
    {
        return false;
    }
}
