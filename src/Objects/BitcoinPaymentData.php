<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * BitcoinPaymentData Object
 *
 * Data needed to perform the checkout of a bitcoin-bound payment order
 *
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $uri Bitcoin Uri
 * @property string $address Bitcoin address
 * @property \Illuminate\Support\Collection $transactions Transactions paying the payment order
 * @property PaymentOrderState $state Current payment state of the payment order
 *
 */
class BitcoinPaymentData extends SdkObject
{

    protected $subObjects = [
            "state" => PaymentOrderState::class,
            "transactions" => Transaction::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"required_confirmations": {"rules": ["required"], "type": "integer"}, "uri": {"rules": ["required"], "type": "string"}, "address": {"rules": ["required"], "type": "string"}, "transactions": {"rules": ["required", "nullable"], "elements": {"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "outs": {"rules": ["required"], "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}, "type": "array"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}, "type": "array"}, "state": {"rules": ["required"], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "paid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "in_confirmation": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "unpaid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}}}}}');
    }

}