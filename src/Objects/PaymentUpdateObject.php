<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentUpdateObject Object
 *
 * Callback's trigger request body
 *
 * @property string $callback Name of the callback to be sent
 *
 */
class PaymentUpdateObject extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"callback": {"rules": ["required"], "type": "string"}}}');
    }

}