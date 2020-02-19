<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function updateUser(User $user)
    {
        return $user->admin === 1;
    }
    
}
