<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WaterLog;

class WaterLogPolicy
{
    public function update(User $user, WaterLog $waterLog): bool
    {
        return $user->isAdmin() || $user->id === $waterLog->tank->user_id;
    }

    public function delete(User $user, WaterLog $waterLog): bool
    {
        return $user->isAdmin() || $user->id === $waterLog->tank->user_id;
    }
}
