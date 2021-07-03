<?php

namespace Domain\Auth\Actions;

use DB;
use Exception;
use Illuminate\Validation\Rule;
use Domain\Auth\Enums\UserTypeEnum;
use Domain\Auth\Events\Role\RoleCreated;
use Domain\Auth\Models\Role;
use Spatie\Enum\Laravel\Rules\EnumRule;
use Support\Exceptions\GeneralException;
use Validator;

class CreateRoleAction
{
    public function __invoke(array $data = []): Role
    {
        Validator::make($data, [
            'type' => [new EnumRule(UserTypeEnum::class)],
            'name' => ['required', Rule::unique('roles')],
            'permissions' => ['array'],
            'menus' => ['array'],
        ])->validateWithBag('createdRoleForm');

        DB::beginTransaction();

        try {
            $role = Role::create(['type' => $data['type'], 'name' => $data['name']]);
            $role->syncPermissions($data['permissions'] ?? []);
            $role->syncMenusWithChildren($data['menuItems'] ?? []);
        } catch (Exception $e) {
            DB::rollBack();


            if (app()->environment(['local', 'testing'])) {
                throw $e;
            }

            throw new GeneralException(__('There was a problem creating the role.'));
        }

        DB::commit();

        event(new RoleCreated($role));


        return $role;
    }
}
