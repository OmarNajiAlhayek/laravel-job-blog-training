<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function update(User $user = null, Comment $comment): bool
    {
        if ($user === null || $comment->user === null)
            return false;

        return $comment->user->is($user);
    }

    // (?User) what is that??
    public function destroy(User $user = null, Comment $comment): bool
    {
        if ($user === null || $comment->user === null)
            return false;

        return $comment->user->is($user);
    }
}
