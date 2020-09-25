<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * CallbackPaymentOrder Object
 *
 * Payment order retrieval data
 *
 * @property string $uuid UUID of the payment order
 *
 */
class CallbackPaymentOrder extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"uuid": {"rules": ["required"], "type": "uuid"}}}');
    }

}