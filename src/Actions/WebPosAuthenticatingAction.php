<?php

namespace Chainside\SDK\WebPos\Actions;


use Chainside\SDK\WebPos\Hooks\AuthorizationHook;

abstract class WebPosAuthenticatingAction extends ChainsideAction
{

    protected $preSendHooks = [
        AuthorizationHook::class
    ];

}