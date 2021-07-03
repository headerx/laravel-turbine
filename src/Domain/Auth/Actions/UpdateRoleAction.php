<?php

namespace Domain\Auth\Actions;

use DB;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Domain\Auth\Enums\UserTypeEnum;
use Domain\Auth\Events\Role\RoleUpdated;
use Domain\Auth\Models\Role;
use Spatie\Enum\Laravel\Rules\EnumRule;
use Support\Exceptions\GeneralException;
use Validator;

class UpdateRoleAction
{
    public function __invoke(Role $role, array $data = []): Role
    {
        Validator::make($data, [
            'type' => [new EnumRule(UserTypeEnum::class)],
            'name' => [ Rule::unique('roles')->ignore($role->id)],
            'permissions' => ['array'],
            'menus' => ['array'],
        ])->validateWithBag('updateRoleForm');

        DB::beginTransaction();

        try {
            $role->update(['type' => $data['type'], 'name' => $data['name']]);
            $role->syncPermissions($data['permissions'] ?? []);
            $role->syncMenusWithChildren($data['menusItems'] ?? []);
        } catch (Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            throw new GeneralException(__('There was a problem updating the role.'));
        }

        event(new RoleUpdated($role));

        DB::commit();

        return $role;
    }
}
