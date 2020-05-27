<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderDeletionResponse Object
 *
 * Payment order deletion response
 *
 * @property string $cancel_url The URL where the user is redirected upon payment order expiration/cancellation
 *
 */
class PaymentOrderDeletionResponse extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"cancel_url": {"type": "url", "rules": ["regex[https_url]:^https://", "required"]}}}');
    }

}