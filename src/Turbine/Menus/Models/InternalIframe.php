<?php

namespace Turbine\Menus\Models;

use Database\Factories\InternalIframeFactory;
use Support\Concerns\HasParent;
use Turbine\Icons\Casts\IconIdCast;
use Turbine\Menus\Casts\InternalIframeUriCast;
use Turbine\Menus\Casts\SnakeCast;
use Turbine\Menus\Enums\MenuItemTemplateEnum;
use Turbine\Menus\Enums\MenuItemTypeEnum;

class InternalIframe extends MenuItem
{
    use HasParent;

    protected $casts = [
        'type' => MenuItemTypeEnum::class,
        'template' => MenuItemTemplateEnum::class,
        'icon_id' => IconIdCast::class,
        'active' => 'bool',
        'handle' => SnakeCast::class,
        'uri' => InternalIframeUriCast::class,
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return InternalIframeFactory::new();
    }
}
