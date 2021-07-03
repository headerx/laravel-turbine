<?php

namespace Domain\Auth\Actions;

use Domain\Auth\Enums\UserTypeEnum;
use Domain\Auth\Models\User;

class UpdateUserTypeAction
{
    public function __invoke(User $user, $type = null)
    {
        $user->update([
            'type' => $user->isMasterAdmin() ? UserTypeEnum::admin() : $type ?? $user->type,
        ]);
    }
}
