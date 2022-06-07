<?php

namespace DenizTezcan\LaravelPayNL\Facades;

use Illuminate\Support\Facades\Facade;

class PayNL extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'paynl';
    }
}