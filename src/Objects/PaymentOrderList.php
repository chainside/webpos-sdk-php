<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderList Object
 *
 * List of Business' payment orders
 *
 * @property \Illuminate\Support\Collection $paymentorders Business' payment orders
 * @property integer $total_pages Total number of pages given the requested page size
 * @property integer $total_items Total number of items
 *
 */
class PaymentOrderList extends SdkObject
{

    protected $subObjects = [
            "paymentorders" => PaymentOrderRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "schema": {"paymentorders": {"type": "array", "rules": ["nullable", "required"], "elements": {"rules": [], "schema": {"address": {"rules": ["required"], "type": "base58"}, "amount": {"rules": ["decimal", "required"], "type": "string"}, "btc_amount": {"rules": ["required"], "type": "integer"}, "callback_url": {"rules": ["regex[https_url]:^https://"], "type": "url"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "created_by": {"rules": ["required"], "schema": {"deposit_account": {"rules": ["required"], "schema": {"name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}}, "type": "object"}, "name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["required", "in:web,mobile"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "active": {"rules": [], "type": "boolean"}}, "type": "object"}, "currency": {"rules": ["required"], "schema": {"name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}}, "type": "object"}, "details": {"rules": ["nullable"], "type": "string"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "expires_in": {"rules": ["required"], "type": "integer"}, "rate": {"rules": ["required"], "schema": {"created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}, "from": {"type": "string", "rules": []}, "to": {"type": "string", "rules": []}}, "type": "object"}, "redirect_url": {"rules": ["regex[https_url]:^https://"], "type": "url"}, "reference": {"rules": ["nullable", "required"], "type": "string"}, "required_confirmations": {"rules": ["required"], "type": "integer"}, "resolved_at": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "dispute_start_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "chargeback_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "state": {"rules": ["required"], "schema": {"in_confirmation": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}, "paid": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "unpaid": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}}, "type": "object"}, "transactions": {"type": "array", "rules": ["nullable", "required"], "elements": {"rules": [], "schema": {"status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs": {"type": "array", "rules": ["required"], "elements": {"rules": [], "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}, "type": "object"}}, "outs_sum": {"rules": ["required"], "type": "integer"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}, "type": "object"}}, "uri": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}}, "type": "object"}}, "total_pages": {"rules": ["required"], "type": "integer"}, "total_items": {"rules": ["required"], "type": "integer"}}, "type": "object"}');
    }

}