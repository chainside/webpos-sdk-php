<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Objects\GetPaymentOrderUrlParams;
use Chainside\SDK\WebPos\Objects\PaymentOrderRetrieval;


/**
 * GetPaymentOrder Class
 *
 * Endpoint to retrieve a payment order
 *
 * @method PaymentOrderRetrieval run() Execute the API call
 *
 */
class GetPaymentOrder extends WebPosAuthenticatedAction
{

    protected $verb = 'GET';
    protected $route = '/payment-order/{payment_order_uuid}';
    protected $requestBodyClass = null;
    protected $responseBodyClass = PaymentOrderRetrieval::class;

    public function __construct(Context $context)
    {
        $this->routeParametersSchema = GetPaymentOrderUrlParams::schema()->toArray();
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