<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Objects\PaymentUpdateObject;
use Chainside\SDK\WebPos\Objects\PaymentUpdateUrlParams;


/**
 * PaymentUpdate Class
 *
 * Endpoint to change a  payment order status and trigger callbacks
 *
 *
 */
class PaymentUpdate extends WebPosAuthenticatedAction
{

    protected $verb = 'PATCH';
    protected $route = '/payment-order/{payment_order_uuid}/test/';
    protected $requestBodyClass = PaymentUpdateObject::class;
    protected $responseBodyClass = null;

    public function __construct(Context $context)
    {
        $this->routeParametersSchema = PaymentUpdateUrlParams::schema()->toArray();
        parent::__construct($context);
    }

    

    /**
    *
    * @param string $paymentOrderUuid
    * @return $this
    */
    public function setPaymentOrderUuid($paymentOrderUuid) {
        $this->addRouteParameter('payment_order_uuid', $paymentOrderUuid);
        return $this;
    }

    /**
    *
    * @param PaymentUpdateObject $paymentUpdateObject
    * @return $this
    */
    public function setPaymentUpdateObject(PaymentUpdateObject $paymentUpdateObject)
    {
        $this->setRequestBody($paymentUpdateObject);
        return $this;
    }
    

}