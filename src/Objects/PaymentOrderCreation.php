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
 * @property string $reference Business' reference of the payment order
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property string $details Payment order's details
 * @property string $amount Payment order's fiat amount
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $continue_url The URL where the user is redirected upon successful payment
 *
 */
class PaymentOrderCreation extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"cancel_url": {"rules": ["regex[https_url]:^https://", "nullable"], "type": "url"}, "reference": {"rules": [], "type": "string"}, "callback_url": {"rules": ["regex[https_url]:^https://", "nullable"], "type": "url"}, "details": {"rules": ["required"], "type": "string"}, "amount": {"rules": ["required", "decimal"], "type": "string"}, "required_confirmations": {"rules": ["min:0", "required"], "type": "integer"}, "continue_url": {"rules": ["regex[https_url]:^https://", "nullable"], "type": "url"}}, "rules": [], "type": "object"}');
    }

}