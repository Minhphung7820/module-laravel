<?php

namespace Modules\Blog\Services\Facades;

use Illuminate\Support\Facades\Facade;

class DemoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'demo';
    }
}
