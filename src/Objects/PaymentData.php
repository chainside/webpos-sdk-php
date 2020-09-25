<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentData Object
 *
 * Data needed to perform the checkout
 *
 * @property BitcoinPaymentData $bitcoin Data for bitcoin payment checkout
 * @property integer $expires_in Expiration seconds of the payment order
 * @property LnPaymentData $ln Data for lightning network payment checkout
 * @property string $expiration_time Expiration date of the payment order
 * @property string $amount Amount related to the selected payment method (with rate conversion if any)
 * @property RateRetrieval $rate Payment order rate
 * @property string $payment_method Bound payment method
 *
 */
class PaymentData extends SdkObject
{

    protected $subObjects = [
            "bitcoin" => BitcoinPaymentData::class,
            "ln" => LnPaymentData::class,
            "rate" => RateRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"bitcoin": {"rules": ["nullable"], "type": "object", "schema": {"transactions": {"rules": ["required", "nullable"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "outs": {"rules": ["required"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}}, "state": {"rules": ["required"], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "in_confirmation": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "paid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "unpaid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}}}, "uri": {"rules": ["required"], "type": "string"}, "required_confirmations": {"rules": ["required"], "type": "integer"}, "address": {"rules": ["required"], "type": "string"}}}, "expires_in": {"rules": ["required", "nullable"], "type": "integer"}, "ln": {"rules": ["nullable"], "type": "object", "schema": {"invoice": {"rules": ["required"], "type": "string"}}}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "amount": {"rules": ["required", "nullable"], "type": "string"}, "rate": {"rules": ["nullable", "required"], "type": "object", "schema": {"from": {"rules": [], "type": "string"}, "to": {"rules": [], "type": "string"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}}}, "payment_method": {"rules": ["required", "nullable"], "type": "string"}}}');
    }

}