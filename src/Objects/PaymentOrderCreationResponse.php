<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderCreationResponse Object
 *
 * Response data for a payment order creation request
 *
 * @property string $expiration_time Expiration's date of the payment order
 * @property string $uuid UUID of the payment order
 * @property RateRetrieval $rate Crypto/Fiat rate of the payment order
 * @property string $created_at Creation date of the payment order
 * @property integer $amount Crypto amount of the payment order
 * @property string $reference Payment Order reference
 * @property integer $expires_in Expiration's time of the payment order
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property string $address Bitcoin address of the payment order
 * @property string $uri Bitcoin uri according to BIP 21 (https://github.com/bitcoin/bips/blob/master/bip-0021.mediawiki)
 *
 */
class PaymentOrderCreationResponse extends SdkObject
{

    protected $subObjects = [
            "rate" => RateRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"amount": {"type": "integer", "rules": ["required"]}, "expiration_time": {"type": "ISO_8601_date", "rules": ["required"]}, "reference": {"type": "string", "rules": ["nullable"]}, "expires_in": {"type": "integer", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "redirect_url": {"type": "url", "rules": ["regex[https_url]:^https://", "required", "nullable"]}, "rate": {"schema": {"source": {"type": "string", "rules": ["required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "to": {"type": "string", "rules": []}, "from": {"type": "string", "rules": []}, "value": {"type": "string", "rules": ["decimal", "required"]}}, "type": "object", "rules": ["required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["nullable"]}, "address": {"type": "string", "rules": ["regex:^(bc1|[13]|tb1|[2nm]|bcrt)[a-zA-HJ-NP-Z0-9]{25,40}$", "required"]}, "uri": {"type": "string", "rules": ["regex:^", "required"]}}, "type": "object", "rules": []}');
    }

}