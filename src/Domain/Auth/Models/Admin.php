<?php

namespace Domain\Auth\Models;

use Support\Concerns\CachesQueries;
use Support\Concerns\HasParent;

class Admin extends User
{
    use CachesQueries;
    use HasParent;

    public function guardName()
    {
        return parent::guardName();
    }
}
