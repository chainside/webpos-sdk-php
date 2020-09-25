<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\ActionFactory;
use SDK\Boilerplate\Exceptions\SdkException;

class Factory extends ActionFactory
{

    public function make($what = null, ...$parameters)
    {

        $actions = self::actions();

        if(!array_key_exists($what, $actions))
            throw new SdkException("Unknown action $what");

        $action = $actions[$what];

        return new $action($this->context);
    }


    public static function actions()
    {

        return [
            "client_credentials_login" => ClientCredentialsLogin::class,
            "get_callbacks" => GetCallbacks::class,
            "payment_reset" => PaymentReset::class,
            "payment_update" => PaymentUpdate::class,
            "delete_payment_order" => DeletePaymentOrder::class,
            "get_payment_order" => GetPaymentOrder::class,
            "get_payment_orders" => GetPaymentOrders::class,
            "create_payment_order" => CreatePaymentOrder::class,
            
        ];

    }

}