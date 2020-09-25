<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * LnPaymentData Object
 *
 * Data needed to perform the checkout of a ln-bound payment order
 *
 * @property string $invoice Ln bolt11 invoice
 *
 */
class LnPaymentData extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"invoice": {"rules": ["required"], "type": "string"}}}');
    }

}