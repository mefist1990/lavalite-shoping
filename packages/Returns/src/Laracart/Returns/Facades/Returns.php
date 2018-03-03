<?php

namespace Laracart\Returns\Facades;

use Illuminate\Support\Facades\Facade;

class Returns extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'returns';
    }
}
