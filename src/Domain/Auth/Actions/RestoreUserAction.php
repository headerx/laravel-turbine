<?php

namespace Domain\Auth\Actions;

use Domain\Auth\Events\User\UserRestored;
use Domain\Auth\Models\User;
use Support\Exceptions\GeneralException;

class RestoreUserAction
{
    public function __invoke(User $user): User
    {
        if ($user->restore()) {
            event(new UserRestored($user));

            return $user;
        }

        throw new GeneralException(__('There was a problem restoring this user. Please try again.'));
    }
}
