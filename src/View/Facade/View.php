<?php

namespace App\View\Facade;

use Illuminate\Support\Facades\Facade;

class View extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new \App\View\View;
    }
}
