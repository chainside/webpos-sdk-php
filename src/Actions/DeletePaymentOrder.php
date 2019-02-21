<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Objects\DeletePaymentOrderUrlParams;
use Chainside\SDK\WebPos\Objects\PaymentOrderDeletionResponse;


/**
 * DeletePaymentOrder Class
 *
 * Endpoint to cancel a payment order
 *
 * @method PaymentOrderDeletionResponse run() Execute the API call
 *
 */
class DeletePaymentOrder extends WebPosAuthenticatedAction
{

    protected $verb = 'DELETE';
    protected $route = '/payment-order/{payment_order_uuid}';
    protected $requestBodyClass = null;
    protected $responseBodyClass = PaymentOrderDeletionResponse::class;

    public function __construct(Context $context)
    {
        $this->routeParametersSchema = DeletePaymentOrderUrlParams::schema()->toArray();
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