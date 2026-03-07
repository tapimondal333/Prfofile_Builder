<?php

namespace App\Policies;

use App\Models\Doccument;
use App\Models\User;

class DocumentPolicy
{
    /**
     * Determine whether the user can view the document.
     */
    public function view(User $user, Doccument $doccument): bool
    {
        return $user->id === $doccument->user_id;
    }

    /**
     * Determine whether the user can update the document.
     */
    public function update(User $user, Doccument $doccument): bool
    {
        return $user->id === $doccument->user_id;
    }

    /**
     * Determine whether the user can delete the document.
     */
    public function delete(User $user, Doccument $doccument): bool
    {
        return $user->id === $doccument->user_id;
    }
}
