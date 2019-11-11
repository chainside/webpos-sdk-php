<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderCreation Object
 *
 * Data required to create a new payment order
 *
 * @property string $amount Payment order's fiat amount
 * @property string $cancel_url The URL where the user is redirected upon successful payment order expiration/cancellation
 * @property string $continue_url The URL where the user is redirected upon successful payment
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property string $details Payment order's details
 * @property string $reference Business' reference of the payment order
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 *
 */
class PaymentOrderCreation extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "schema": {"amount": {"rules": ["required", "decimal"], "type": "string"}, "cancel_url": {"rules": ["regex[https_url]:^https://", "nullable", "maxlen:300"], "type": "url"}, "continue_url": {"rules": ["regex[https_url]:^https://", "nullable", "maxlen:300"], "type": "url"}, "callback_url": {"rules": ["regex[https_url]:^https://", "nullable", "maxlen:300"], "type": "url"}, "details": {"rules": ["maxlen:300", "nullable"], "type": "string"}, "reference": {"rules": ["maxlen:300", "nullable"], "type": "string"}, "required_confirmations": {"rules": ["min:0", "nullable"], "type": "integer"}}, "type": "object"}');
    }

}