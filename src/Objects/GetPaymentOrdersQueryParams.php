<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * GetPaymentOrdersQueryParams Object
 *
 * 
 *
 * @property string $status Status of the payment orders to retrieve
 * @property integer $page_size Size of the returned page (default: 20)
 * @property string $sort_by Field used to sort pages (default: created_at)
 * @property integer $page Index of the page to be returned (default: 0)
 * @property string $sort_order Ordering to be used for the sort (default: desc)
 *
 */
class GetPaymentOrdersQueryParams extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"type": "object", "rules": ["nullable"], "schema": {"status": {"type": "string", "rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback"]}, "page_size": {"type": "integer", "rules": ["nullable", "max:40"]}, "sort_by": {"type": "string", "rules": ["in:amount,created_at", "nullable"]}, "sort_order": {"type": "string", "rules": ["in:asc,desc", "nullable"]}, "page": {"type": "integer", "rules": ["nullable", "min:0"]}}}');
    }

}