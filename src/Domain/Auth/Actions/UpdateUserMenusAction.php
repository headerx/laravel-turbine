<?php

namespace Domain\Auth\Actions;

use Domain\Auth\Models\User;

class UpdateUserMenusAction
{
    public function __invoke(User $user, array $menuItems = [])
    {
        $user->syncMenusWithChildren($menuItems);
    }
}
