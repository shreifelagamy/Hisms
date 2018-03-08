<?php

namespace Shreifelagamy\Hisms;

use Illuminate\Support\Facades\Facade;

class HismsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'hisms';
    }
}
