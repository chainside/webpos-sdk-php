<?php

namespace Chainside\SDK\WebPos\Hooks;


use SDK\Boilerplate\Hooks\PreSendHook;

class AuthorizationHook extends PreSendHook
{

    public function run()
    {

       $clientId = $this->getContext()->getConfig()->get('client_id');
       $clientSecret = $this->getContext()->getConfig()->get('secret');

       $this->request->addHeaders([
           'Authorization' => 'Basic ' . base64_encode("$clientId:$clientSecret")
       ]);

    }

}