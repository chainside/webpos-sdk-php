<?php

namespace Chainside\SDK\WebPos\Hooks;


use Carbon\Carbon;
use SDK\Boilerplate\Hooks\PreSendHook;
use Chainside\SDK\WebPos\Actions\Factory;
use Chainside\SDK\WebPos\Objects\ClientCredentials;
use Chainside\SDK\WebPos\Actions\ClientCredentialsLogin;

class AuthenticationHook extends PreSendHook
{

    const TOKEN_KEY = 'chainside.webpos.sdk.token';

    public function run()
    {

        $token = $this->getContext()->getCache()->get(self::TOKEN_KEY, null);

        if(!$token) {
            list($token, $ttl) = $this->fetchToken();
            $this->getContext()->getCache()->set(self::TOKEN_KEY, $ttl);
        }

        $this->request->addHeaders([
            'Authorization' => "Bearer {$token}"
        ]);

    }

    protected function fetchToken()
    {

        $actionFactory = new Factory($this->getContext());
        /**
         * @var $action ClientCredentialsLogin
         */
        $action = $actionFactory->make('client_credentials_login');
        $clientCredentials = new ClientCredentials([
            'grant_type' => 'client_credentials',
            'scope' => '*'
        ]);

        $action->setRequestBody($clientCredentials);
        $response = $action->run();

        return [ $response->access_token, $response->expires_in ];

    }

}