<?php

namespace Litecms\Newsletter\Facades;

use Illuminate\Support\Facades\Facade;

class Newsletter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'newsletter';
    }
}
