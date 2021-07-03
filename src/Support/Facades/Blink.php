<?php

namespace Support\Facades;

use Illuminate\Support\Facades\Facade;
use Support\Blink as CoreBlink;

/**
 * @method static mixed|\Spatie\Blink\Blink store($name = 'default')
 *
 * @see Statamic\Support\Blink
 */
class Blink extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CoreBlink::class;
    }
}
