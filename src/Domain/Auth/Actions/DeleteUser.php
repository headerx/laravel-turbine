<?php

namespace Domain\Auth\Actions;

use Laravel\Jetstream\Contracts\DeletesUsers;
use Domain\Auth\Events\User\UserDeleted;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->syncMenuItems([]);
        $user->delete();

        event(new UserDeleted($user));
    }
}
