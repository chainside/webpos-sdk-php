<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * GetPaymentOrdersQueryParams Object
 *
 * 
 *
 * @property string $sort_by Field used to sort pages (default: created_at)
 * @property integer $page Index of the page to be returned (default: 0)
 * @property string $status Status of the payment orders to retrieve
 * @property string $sort_order Ordering to be used for the sort (default: desc)
 * @property integer $page_size Size of the returned page (default: 20)
 *
 */
class GetPaymentOrdersQueryParams extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": ["nullable"], "type": "object", "schema": {"sort_by": {"rules": ["in:amount,created_at", "nullable"], "type": "string"}, "page": {"rules": ["nullable", "min:0"], "type": "integer"}, "status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback"], "type": "string"}, "sort_order": {"rules": ["in:asc,desc", "nullable"], "type": "string"}, "page_size": {"rules": ["nullable", "max:40"], "type": "integer"}}}');
    }

}