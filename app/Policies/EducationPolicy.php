<?php

namespace App\Policies;

use App\Models\Education;
use App\Models\User;

class EducationPolicy
{
    /**
     * Determine whether the user can view the education.
     */
    public function view(User $user, Education $education): bool
    {
        return $user->id === $education->user_id;
    }

    /**
     * Determine whether the user can update the education.
     */
    public function update(User $user, Education $education): bool
    {
        return $user->id === $education->user_id;
    }

    /**
     * Determine whether the user can delete the education.
     */
    public function delete(User $user, Education $education): bool
    {
        return $user->id === $education->user_id;
    }
}