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
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"paymentorders": {"rules": ["nullable", "required"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"redirect_url": {"rules": ["regex[https_url]:^https://"], "type": "url"}, "payment_data": {"rules": ["nullable", "required"], "type": "object", "schema": {"bitcoin": {"rules": ["nullable"], "type": "object", "schema": {"transactions": {"rules": ["required", "nullable"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "outs": {"rules": ["required"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}}, "state": {"rules": ["required"], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "in_confirmation": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "paid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "unpaid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}}}, "uri": {"rules": ["required"], "type": "string"}, "required_confirmations": {"rules": ["required"], "type": "integer"}, "address": {"rules": ["required"], "type": "string"}}}, "expires_in": {"rules": ["required", "nullable"], "type": "integer"}, "ln": {"rules": ["nullable"], "type": "object", "schema": {"invoice": {"rules": ["required"], "type": "string"}}}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "amount": {"rules": ["required", "nullable"], "type": "string"}, "rate": {"rules": ["nullable", "required"], "type": "object", "schema": {"from": {"rules": [], "type": "string"}, "to": {"rules": [], "type": "string"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}}}, "payment_method": {"rules": ["required", "nullable"], "type": "string"}}}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "chargeback_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "amount": {"rules": ["decimal", "required"], "type": "string"}, "resolved_at": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "created_by": {"rules": ["required"], "type": "object", "schema": {"type": {"rules": ["required", "in:web,mobile"], "type": "string"}, "deposit_account": {"rules": ["required"], "type": "object", "schema": {"type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}, "active": {"rules": [], "type": "boolean"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "currency": {"rules": ["required"], "type": "object", "schema": {"type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}, "reference": {"rules": ["nullable", "required"], "type": "string"}, "callback_url": {"rules": ["regex[https_url]:^https://"], "type": "url"}, "dispute_start_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "uuid": {"rules": ["required"], "type": "uuid"}, "details": {"rules": ["nullable"], "type": "string"}}}}, "total_pages": {"rules": ["required"], "type": "integer"}, "total_items": {"rules": ["required"], "type": "integer"}}}');
    }

}