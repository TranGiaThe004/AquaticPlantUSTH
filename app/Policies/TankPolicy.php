<?php

namespace App\Policies;

use App\Models\Tank;
use App\Models\User;

class TankPolicy
{
    public function view(User $user, Tank $tank): bool
    {
        // Admin hoặc chủ bể
        return $user->isAdmin() || $user->id === $tank->user_id;
    }

    public function update(User $user, Tank $tank): bool
    {
        // Chỉ admin hoặc chủ bể mới sửa
        return $user->isAdmin() || $user->id === $tank->user_id;
    }

    public function delete(User $user, Tank $tank): bool
    {
        // Chỉ admin hoặc chủ bể mới xóa
        return $user->isAdmin() || $user->id === $tank->user_id;
    }
}
