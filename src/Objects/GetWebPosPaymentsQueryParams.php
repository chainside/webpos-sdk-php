<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * GetWebPosPaymentsQueryParams Object
 *
 * 
 *
 * @property string $status Status of the payment orders to retrieve
 *
 */
class GetWebPosPaymentsQueryParams extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback"], "type": "string"}}, "rules": ["nullable"], "type": "object"}');
    }

}