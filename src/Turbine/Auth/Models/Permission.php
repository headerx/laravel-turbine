<?php

namespace Turbine\Auth\Models;

use Turbine\Auth\Concerns\GetsAuthConnection;
use Turbine\Auth\Concerns\PermissionRelationship;
use Turbine\Auth\QueryBuilders\PermissionQueryBuilder;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Support\Concerns\CachesQueries;
use Support\Concerns\HasUuid;
use Wildside\Userstamps\Userstamps;

class Permission extends SpatiePermission
{
    use GetsAuthConnection;
    use CachesQueries;
    use HasUuid;
    use PermissionRelationship;
    use Userstamps;

    public function newEloquentBuilder($query): PermissionQueryBuilder
    {
        return new PermissionQueryBuilder($query);
    }
}