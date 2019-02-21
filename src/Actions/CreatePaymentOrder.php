<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Objects\PaymentOrderCreation;
use Chainside\SDK\WebPos\Objects\PaymentOrderCreationResponse;


/**
 * CreatePaymentOrder Class
 *
 * Endpoint to create a new payment order
 *
 * @method PaymentOrderCreationResponse run() Execute the API call
 *
 */
class CreatePaymentOrder extends WebPosAuthenticatedAction
{

    protected $verb = 'POST';
    protected $route = '/payment-order';
    protected $requestBodyClass = PaymentOrderCreation::class;
    protected $responseBodyClass = PaymentOrderCreationResponse::class;

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    

    

    /**
    *
    * @param PaymentOrderCreation $paymentOrderCreation
    * @return $this
    */
    public function setPaymentOrderCreation(PaymentOrderCreation $paymentOrderCreation)
    {
        $this->setRequestBody($paymentOrderCreation);
        return $this;
    }
    

}