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
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property integer $expires_in Expiration's time of the payment order
 * @property integer $amount Crypto amount of the payment order
 * @property string $uri Bitcoin uri according to BIP 21 (https://github.com/bitcoin/bips/blob/master/bip-0021.mediawiki)
 * @property RateRetrieval $rate Crypto/Fiat rate of the payment order
 * @property string $expiration_time Expiration's date of the payment order
 * @property string $address Bitcoin address of the payment order
 *
 */
class PaymentOrderCreationResponse extends SdkObject
{

    protected $subObjects = [
            "rate" => RateRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "redirect_url": {"rules": ["regex[https_url]:^https://", "required", "nullable"], "type": "url"}, "expires_in": {"rules": ["required"], "type": "integer"}, "uri": {"rules": ["regex:^", "required"], "type": "string"}, "rate": {"schema": {"value": {"rules": ["decimal", "required"], "type": "string"}, "source": {"rules": ["required"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}}, "rules": ["required"], "type": "object"}, "amount": {"rules": ["required"], "type": "integer"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "address": {"rules": ["regex:^", "required"], "type": "string"}}, "rules": [], "type": "object"}');
    }

}