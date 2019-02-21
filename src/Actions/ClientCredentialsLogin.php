<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Objects\ClientCredentials;
use Chainside\SDK\WebPos\Objects\ClientCredentialsLoginResponse;


/**
 * ClientCredentialsLogin Class
 *
 * Endpoint to sign in the system
 *
 * @method ClientCredentialsLoginResponse run() Execute the API call
 *
 */
class ClientCredentialsLogin extends WebPosAuthenticatingAction
{

    protected $verb = 'POST';
    protected $route = '/token';
    protected $requestBodyClass = ClientCredentials::class;
    protected $responseBodyClass = ClientCredentialsLoginResponse::class;

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    

    

    /**
    *
    * @param ClientCredentials $clientCredentials
    * @return $this
    */
    public function setClientCredentials(ClientCredentials $clientCredentials)
    {
        $this->setRequestBody($clientCredentials);
        return $this;
    }
    

}