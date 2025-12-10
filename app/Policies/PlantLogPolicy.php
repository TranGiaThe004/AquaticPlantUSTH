<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PlantLog;

class PlantLogPolicy
{
    public function update(User $user, PlantLog $plantLog): bool
    {
        return $user->isAdmin()
            || $user->id === $plantLog->tankPlant->tank->user_id;
    }

    public function delete(User $user, PlantLog $plantLog): bool
    {
        return $user->isAdmin()
            || $user->id === $plantLog->tankPlant->tank->user_id;
    }
}
