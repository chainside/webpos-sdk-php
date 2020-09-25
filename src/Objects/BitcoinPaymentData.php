<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * BitcoinPaymentData Object
 *
 * Data needed to perform the checkout of a bitcoin-bound payment order
 *
 * @property \Illuminate\Support\Collection $transactions Transactions paying the payment order
 * @property PaymentOrderState $state Current payment state of the payment order
 * @property string $uri Bitcoin Uri
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $address Bitcoin address
 *
 */
class BitcoinPaymentData extends SdkObject
{

    protected $subObjects = [
            "transactions" => Transaction::class,
            "state" => PaymentOrderState::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"transactions": {"rules": ["required", "nullable"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "outs": {"rules": ["required"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}}, "state": {"rules": ["required"], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "in_confirmation": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "paid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "unpaid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}}}, "uri": {"rules": ["required"], "type": "string"}, "required_confirmations": {"rules": ["required"], "type": "integer"}, "address": {"rules": ["required"], "type": "string"}}}');
    }

}