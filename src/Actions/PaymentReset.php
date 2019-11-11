<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Objects\PaymentResetUrlParams;
use Chainside\SDK\WebPos\Objects\PaymentOrderRetrieval;


/**
 * PaymentReset Class
 *
 * Endpoint to reset a payment order to its initial state
 *
 * @method PaymentOrderRetrieval run() Execute the API call
 *
 */
class PaymentReset extends WebPosAuthenticatedAction
{

    protected $verb = 'PATCH';
    protected $route = '/payment-order/{payment_order_uuid}/test/reset';
    protected $requestBodyClass = null;
    protected $responseBodyClass = PaymentOrderRetrieval::class;

    public function __construct(Context $context)
    {
        $this->routeParametersSchema = PaymentResetUrlParams::schema()->toArray();
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

    

}