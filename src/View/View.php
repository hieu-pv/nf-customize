<?php

namespace App\View;

use App\Traits\View as ViewTrait;

class View
{
    use ViewTrait;
    public function __construct()
    {
        $this->setViewPath(__DIR__ . '/../../resources/views');
        $this->setCachePath(__DIR__ . '/../../resources/cache');
    }
}
