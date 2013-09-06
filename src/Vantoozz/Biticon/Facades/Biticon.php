<?php namespace Vantoozz\Biticon\Facades;

use Illuminate\Support\Facades\Facade;

class Biticon extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'biticon';
    }

}