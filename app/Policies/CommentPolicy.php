<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;

class CommentPolicy
{
    public function moderate(User $user)
    {
        return $user->role_id == 1;
    }

    public function create(User $user)
    {
        return true;
    }
}
