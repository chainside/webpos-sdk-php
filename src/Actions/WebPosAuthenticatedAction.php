<?php

namespace Chainside\SDK\WebPos\Actions;


use Chainside\SDK\WebPos\Exceptions\AccessTokenExpiredException;
use Chainside\SDK\WebPos\Exceptions\ChainsideSdkException;
use Chainside\SDK\WebPos\Exceptions\JwtTokenExpiredException;
use Chainside\SDK\WebPos\Hooks\AuthenticationHook;
use Chainside\SDK\WebPos\Objects\ClientCredentials;
use Illuminate\Support\Str;

abstract class WebPosAuthenticatedAction extends ChainsideAction
{

    const TOKEN_KEY = 'chainside.webpos.sdk.token';

    protected $preSendHooks = [
        AuthenticationHook::class
    ];

    protected $refreshCount = 0;

    public function run()
    {

        if(!$this->getContext()->getCache()->has(self::TOKEN_KEY)) {
            $this->refreshToken();
        }

        try {
            return parent::run();
        } catch (AccessTokenExpiredException $ex) {

            $this->refreshToken();
            return $this->run();
        } catch (JwtTokenExpiredException $ex) {

            $this->refreshToken();
            return $this->run();

        }
    }

    protected function refreshToken()
    {

        if($this->refreshCount > 1 ) {
            throw new ChainsideSdkException(
                'The action was already run ' . $this->refreshCount . ' ' . Str::plural('time', $this->refreshCount)
            );
        }

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

        $this->getContext()->getCache()->set(self::TOKEN_KEY, $response->access_token, $response->expires_in);

        $this->refreshCount++;

    }


}