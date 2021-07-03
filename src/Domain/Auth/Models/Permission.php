<?php

namespace Domain\Auth\Models;

use Domain\Auth\Concerns\GetsAuthConnection;
use Domain\Auth\Concerns\PermissionRelationship;
use Domain\Auth\QueryBuilders\PermissionQueryBuilder;
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
