<?php

namespace Domain\Auth\Actions;

use Illuminate\Support\Facades\Validator;
use Domain\Auth\Models\User;

class UpdateUserPermissionsAction
{
    public function __invoke(User $user, array $input)
    {
        Validator::make($input, [
            'roles' => ['array', 'nullable'],
        ])->validateWithBag('updateRoles');

        if (! $user->isMasterAdmin()) {
            $user->syncRoles($input['roles'] ?? []);
            $user->syncPermissions($input['permissions'] ?? []);
        }
    }
}
