<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderCreationResponse Object
 *
 * Response data for a payment order creation request
 *
 * @property string $uuid UUID of the payment order
 * @property string $created_at Creation date of the payment order
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property string $reference Payment Order reference
 *
 */
class PaymentOrderCreationResponse extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "created_at": {"rules": ["nullable"], "type": "ISO_8601_date"}, "redirect_url": {"rules": ["regex[https_url]:^https://", "required", "nullable"], "type": "url"}, "reference": {"rules": ["nullable"], "type": "string"}}}');
    }

}