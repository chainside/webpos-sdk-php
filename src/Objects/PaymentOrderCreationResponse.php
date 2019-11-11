<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderCreationResponse Object
 *
 * Response data for a payment order creation request
 *
 * @property string $address Bitcoin address of the payment order
 * @property integer $amount Crypto amount of the payment order
 * @property string $expiration_time Expiration's date of the payment order
 * @property integer $expires_in Expiration's time of the payment order
 * @property RateRetrieval $rate Crypto/Fiat rate of the payment order
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property string $uri Bitcoin uri according to BIP 21 (https://github.com/bitcoin/bips/blob/master/bip-0021.mediawiki)
 * @property string $uuid UUID of the payment order
 * @property string $created_at Creation date of the payment order
 * @property string $reference Payment Order reference
 *
 */
class PaymentOrderCreationResponse extends SdkObject
{

    protected $subObjects = [
            "rate" => RateRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "schema": {"address": {"rules": ["regex:^", "required"], "type": "string"}, "amount": {"rules": ["required"], "type": "integer"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "expires_in": {"rules": ["required"], "type": "integer"}, "rate": {"rules": ["required"], "schema": {"created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}, "from": {"type": "string", "rules": []}, "to": {"type": "string", "rules": []}}, "type": "object"}, "redirect_url": {"rules": ["regex[https_url]:^https://", "required", "nullable"], "type": "url"}, "uri": {"rules": ["regex:^", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "created_at": {"rules": ["nullable"], "type": "ISO_8601_date"}, "reference": {"rules": ["nullable"], "type": "string"}}, "type": "object"}');
    }

}