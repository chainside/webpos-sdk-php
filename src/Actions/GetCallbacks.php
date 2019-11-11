<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Objects\GetCallbacksUrlParams;
use Chainside\SDK\WebPos\Objects\CallbackList;


/**
 * GetCallbacks Class
 *
 * Endpoint to retrieve the possible sent callbacks based on legal payment's state transitions
 *
 * @method CallbackList run() Execute the API call
 *
 */
class GetCallbacks extends WebPosAuthenticatedAction
{

    protected $verb = 'GET';
    protected $route = '/payment-order/{payment_order_uuid}/callbacks';
    protected $requestBodyClass = null;
    protected $responseBodyClass = CallbackList::class;

    public function __construct(Context $context)
    {
        $this->routeParametersSchema = GetCallbacksUrlParams::schema()->toArray();
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