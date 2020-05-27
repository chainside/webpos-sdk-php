<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * GetCallbacksUrlParams Object
 *
 * 
 *
 * @property string $payment_order_uuid 
 *
 */
class GetCallbacksUrlParams extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"payment_order_uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": ["nullable"]}');
    }

}