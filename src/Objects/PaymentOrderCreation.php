<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderCreation Object
 *
 * Data required to create a new payment order
 *
 * @property string $cancel_url The URL where the user is redirected upon successful payment order expiration/cancellation
 * @property string $amount Payment order's fiat amount
 * @property string $continue_url The URL where the user is redirected upon successful payment
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $reference Business' reference of the payment order
 * @property string $details Payment order's details
 *
 */
class PaymentOrderCreation extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"cancel_url": {"type": "url", "rules": ["regex[https_url]:^https://", "nullable", "maxlen:300"]}, "amount": {"type": "string", "rules": ["required", "decimal"]}, "continue_url": {"type": "url", "rules": ["regex[https_url]:^https://", "nullable", "maxlen:300"]}, "callback_url": {"type": "url", "rules": ["regex[https_url]:^https://", "nullable", "maxlen:300"]}, "required_confirmations": {"type": "integer", "rules": ["min:0", "nullable"]}, "reference": {"type": "string", "rules": ["maxlen:300", "nullable"]}, "details": {"type": "string", "rules": ["maxlen:300", "nullable"]}}}');
    }

}