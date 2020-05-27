<?php

namespace Chainside\SDK\WebPos;

use Psr\SimpleCache\CacheInterface;
use Chainside\SDK\WebPos\Actions\Factory;
use Chainside\SDK\WebPos\Objects\PaymentUpdateObject;
use Chainside\SDK\WebPos\Objects\PaymentOrderCreation;
use Chainside\SDK\WebPos\Objects\ClientCredentials;


class Client
{

    protected $factory;

    protected $context;

    public function __construct(array $config, CacheInterface $cache = null)
    {

        $this->context = new ApiContext($config, $cache);
        $this->factory = new Factory($this->context);

    }

    
    /**
    * Endpoint to retrieve the possible sent callbacks based on legal payment's state transitions
    *
    * @param string $paymentOrderUuid
    *
    * @return \Chainside\SDK\WebPos\Objects\CallbackList
    * @throws \SDK\Boilerplate\Exceptions\SdkException
    */
    public function getCallbacks($paymentOrderUuid)
    {

        $action = $this->factory->make('get_callbacks');

        
        $action->setPaymentOrderUuid($paymentOrderUuid);
        return $action->run();
    }
    
    /**
    * Endpoint to reset a payment order to its initial state
    *
    * @param string $paymentOrderUuid
    *
    * @return \Chainside\SDK\WebPos\Objects\PaymentOrderRetrieval
    * @throws \SDK\Boilerplate\Exceptions\SdkException
    */
    public function paymentReset($paymentOrderUuid)
    {

        $action = $this->factory->make('payment_reset');

        
        $action->setPaymentOrderUuid($paymentOrderUuid);
        return $action->run();
    }
    
    /**
    * Endpoint to change a  payment order status and trigger callbacks
    *
    * @param string $paymentOrderUuid
    * @param \Chainside\SDK\WebPos\Objects\PaymentUpdateObject $paymentUpdate
    *
    * @return mixed
    * @throws \SDK\Boilerplate\Exceptions\SdkException
    */
    public function paymentUpdate($paymentOrderUuid, PaymentUpdateObject $paymentUpdate)
    {

        $action = $this->factory->make('payment_update');

        
        $action->setPaymentOrderUuid($paymentOrderUuid);
        
        $action->setPaymentupdateobject($paymentUpdate);
        return $action->run();
    }
    
    /**
    * Endpoint to cancel a payment order
    *
    * @param string $paymentOrderUuid
    *
    * @return \Chainside\SDK\WebPos\Objects\PaymentOrderDeletionResponse
    * @throws \SDK\Boilerplate\Exceptions\SdkException
    */
    public function deletePaymentOrder($paymentOrderUuid)
    {

        $action = $this->factory->make('delete_payment_order');

        
        $action->setPaymentOrderUuid($paymentOrderUuid);
        return $action->run();
    }
    
    /**
    * Endpoint to retrieve a payment order
    *
    * @param string $paymentOrderUuid
    *
    * @return \Chainside\SDK\WebPos\Objects\PaymentOrderRetrieval
    * @throws \SDK\Boilerplate\Exceptions\SdkException
    */
    public function getPaymentOrder($paymentOrderUuid)
    {

        $action = $this->factory->make('get_payment_order');

        
        $action->setPaymentOrderUuid($paymentOrderUuid);
        return $action->run();
    }
    
    /**
    * Endpoint to retrieve all business' payment orders
    *
    * @param string $status
    * @param integer $pageSize
    * @param string $sortBy
    * @param integer $page
    * @param string $sortOrder
    *
    * @return \Chainside\SDK\WebPos\Objects\PaymentOrderList
    * @throws \SDK\Boilerplate\Exceptions\SdkException
    */
    public function getPaymentOrders($status = null, $pageSize = null, $sortBy = null, $page = null, $sortOrder = null)
    {

        $action = $this->factory->make('get_payment_orders');

        if(!is_null($status)) $action->setStatus($status);
        if(!is_null($pageSize)) $action->setPageSize($pageSize);
        if(!is_null($sortBy)) $action->setSortBy($sortBy);
        if(!is_null($page)) $action->setPage($page);
        if(!is_null($sortOrder)) $action->setSortOrder($sortOrder);
        return $action->run();
    }
    
    /**
    * Endpoint to create a new payment order
    *
    * @param \Chainside\SDK\WebPos\Objects\PaymentOrderCreation $createPaymentOrder
    *
    * @return \Chainside\SDK\WebPos\Objects\PaymentOrderCreationResponse
    * @throws \SDK\Boilerplate\Exceptions\SdkException
    */
    public function createPaymentOrder(PaymentOrderCreation $createPaymentOrder)
    {

        $action = $this->factory->make('create_payment_order');

        
        $action->setPaymentordercreation($createPaymentOrder);
        return $action->run();
    }
    
    /**
    * Endpoint to sign in the system
    *
    * @param \Chainside\SDK\WebPos\Objects\ClientCredentials $clientCredentialsLogin
    *
    * @return \Chainside\SDK\WebPos\Objects\ClientCredentialsLoginResponse
    * @throws \SDK\Boilerplate\Exceptions\SdkException
    */
    public function clientCredentialsLogin(ClientCredentials $clientCredentialsLogin)
    {

        $action = $this->factory->make('client_credentials_login');

        
        $action->setClientcredentials($clientCredentialsLogin);
        return $action->run();
    }
    

    /**
     * Returns the Sdk Context
     *
     * @return ApiContext
     */
    public function getContext()
    {
        return $this->context;
    }

}