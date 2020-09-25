<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentData Object
 *
 * Data needed to perform the checkout
 *
 * @property integer $expires_in Expiration seconds of the payment order
 * @property string $expiration_time Expiration date of the payment order
 * @property BitcoinPaymentData $bitcoin Data for bitcoin payment checkout
 * @property RateRetrieval $rate Payment order rate
 * @property string $payment_method Bound payment method
 * @property LnPaymentData $ln Data for lightning network payment checkout
 * @property string $amount Amount related to the selected payment method (with rate conversion if any)
 *
 */
class PaymentData extends SdkObject
{

    protected $subObjects = [
            "bitcoin" => BitcoinPaymentData::class,
            "rate" => RateRetrieval::class,
            "ln" => LnPaymentData::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"expires_in": {"rules": ["required", "nullable"], "type": "integer"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "bitcoin": {"rules": ["nullable"], "type": "object", "schema": {"required_confirmations": {"rules": ["required"], "type": "integer"}, "uri": {"rules": ["required"], "type": "string"}, "address": {"rules": ["required"], "type": "string"}, "transactions": {"rules": ["required", "nullable"], "elements": {"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "outs": {"rules": ["required"], "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}, "type": "array"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}, "type": "array"}, "state": {"rules": ["required"], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "paid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "in_confirmation": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "unpaid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}}}}}, "rate": {"rules": ["required", "nullable"], "type": "object", "schema": {"to": {"rules": [], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "source": {"rules": ["required"], "type": "string"}, "from": {"rules": [], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}}}, "payment_method": {"rules": ["required", "nullable"], "type": "string"}, "ln": {"rules": ["nullable"], "type": "object", "schema": {"invoice": {"rules": ["required"], "type": "string"}}}, "amount": {"rules": ["required", "nullable"], "type": "string"}}}');
    }

}