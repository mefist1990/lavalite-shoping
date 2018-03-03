<?php

namespace Laracart\Attribute\Facades;

use Illuminate\Support\Facades\Facade;

class Attribute extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'attribute';
    }
}
