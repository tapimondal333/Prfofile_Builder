<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;

class SkillPolicy
{
    /**
     * Determine whether the user can view the skill.
     */
    public function view(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Determine whether the user can update the skill.
     */
    public function update(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Determine whether the user can delete the skill.
     */
    public function delete(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }
}
