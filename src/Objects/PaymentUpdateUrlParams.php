<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentUpdateUrlParams Object
 *
 * 
 *
 * @property string $payment_order_uuid 
 *
 */
class PaymentUpdateUrlParams extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": ["nullable"], "type": "object", "schema": {"payment_order_uuid": {"rules": ["required"], "type": "uuid"}}}');
    }

}