<?php

namespace Chainside\SDK\WebPos\Actions;

use SDK\Boilerplate\Context;
use Chainside\SDK\WebPos\Objects\GetPaymentOrdersQueryParams;
use Chainside\SDK\WebPos\Objects\PaymentOrderList;


/**
 * GetPaymentOrders Class
 *
 * Endpoint to retrieve all business' payment orders
 *
 * @method PaymentOrderList run() Execute the API call
 *
 */
class GetPaymentOrders extends WebPosAuthenticatedAction
{

    protected $verb = 'GET';
    protected $route = '/payment-order';
    protected $requestBodyClass = null;
    protected $responseBodyClass = PaymentOrderList::class;

    public function __construct(Context $context)
    {
        $this->queryParametersSchema = GetPaymentOrdersQueryParams::schema()->toArray();
        parent::__construct($context);
    }

    /**
    *
    * @param string $status
    * @return $this
    */
    public function setStatus($status) {
        $this->addQueryParameter('status', $status);
        return $this;
    }/**
    *
    * @param string $sortBy
    * @return $this
    */
    public function setSortBy($sortBy) {
        $this->addQueryParameter('sort_by', $sortBy);
        return $this;
    }/**
    *
    * @param string $sortOrder
    * @return $this
    */
    public function setSortOrder($sortOrder) {
        $this->addQueryParameter('sort_order', $sortOrder);
        return $this;
    }/**
    *
    * @param integer $page
    * @return $this
    */
    public function setPage($page) {
        $this->addQueryParameter('page', $page);
        return $this;
    }/**
    *
    * @param integer $pageSize
    * @return $this
    */
    public function setPageSize($pageSize) {
        $this->addQueryParameter('page_size', $pageSize);
        return $this;
    }

    

    

}