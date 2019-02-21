<?php

namespace Chainside\SDK\WebPos\Laravel\Facades;


use Illuminate\Support\Facades\Facade;

class CallbackHandler extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'chainside.sdk.webpos.callback.handler';
    }

}