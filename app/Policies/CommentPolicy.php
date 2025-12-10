<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    public function delete(User $user, Comment $comment): bool
    {
        // Chỉ admin hoặc chính người comment được xóa
        return $user->isAdmin() || $user->id === $comment->user_id;
    }
}
