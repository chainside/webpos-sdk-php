<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * GetPaymentOrdersQueryParams Object
 *
 * 
 *
 * @property integer $page_size Size of the returned page (default: 20)
 * @property integer $page Index of the page to be returned (default: 0)
 * @property string $sort_order Ordering to be used for the sort (default: desc)
 * @property string $sort_by Field used to sort pages (default: created_at)
 * @property string $status Status of the payment orders to retrieve
 *
 */
class GetPaymentOrdersQueryParams extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"page_size": {"type": "integer", "rules": ["nullable", "max:40"]}, "page": {"type": "integer", "rules": ["nullable", "min:0"]}, "sort_order": {"type": "string", "rules": ["in:asc,desc", "nullable"]}, "sort_by": {"type": "string", "rules": ["in:amount,created_at", "nullable"]}, "status": {"type": "string", "rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback"]}}, "type": "object", "rules": ["nullable"]}');
    }

}