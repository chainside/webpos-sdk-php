<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderList Object
 *
 * List of Business' payment orders
 *
 * @property integer $total_items Total number of items
 * @property \Illuminate\Support\Collection $paymentorders Business' payment orders
 * @property integer $total_pages Total number of pages given the requested page size
 *
 */
class PaymentOrderList extends SdkObject
{

    protected $subObjects = [
            "paymentorders" => PaymentOrderRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"total_items": {"rules": ["required"], "type": "integer"}, "paymentorders": {"rules": ["required", "nullable"], "elements": {"rules": [], "type": "object", "schema": {"created_by": {"rules": ["required"], "type": "object", "schema": {"active": {"rules": [], "type": "boolean"}, "name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "deposit_account": {"rules": ["required"], "type": "object", "schema": {"name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}}}, "type": {"rules": ["required", "in:web,mobile"], "type": "string"}}}, "uuid": {"rules": ["required"], "type": "uuid"}, "amount": {"rules": ["decimal", "required"], "type": "string"}, "redirect_url": {"rules": ["regex[https_url]:^https://"], "type": "url"}, "dispute_start_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "currency": {"rules": ["required"], "type": "object", "schema": {"name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}}}, "payment_data": {"rules": ["required", "nullable"], "type": "object", "schema": {"expires_in": {"rules": ["required", "nullable"], "type": "integer"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "bitcoin": {"rules": ["nullable"], "type": "object", "schema": {"required_confirmations": {"rules": ["required"], "type": "integer"}, "uri": {"rules": ["required"], "type": "string"}, "address": {"rules": ["required"], "type": "string"}, "transactions": {"rules": ["required", "nullable"], "elements": {"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "outs": {"rules": ["required"], "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}, "type": "array"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}, "type": "array"}, "state": {"rules": ["required"], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "paid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "in_confirmation": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "unpaid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}}}}}, "rate": {"rules": ["required", "nullable"], "type": "object", "schema": {"to": {"rules": [], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "source": {"rules": ["required"], "type": "string"}, "from": {"rules": [], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}}}, "payment_method": {"rules": ["required", "nullable"], "type": "string"}, "ln": {"rules": ["nullable"], "type": "object", "schema": {"invoice": {"rules": ["required"], "type": "string"}}}, "amount": {"rules": ["required", "nullable"], "type": "string"}}}, "resolved_at": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "reference": {"rules": ["nullable", "required"], "type": "string"}, "chargeback_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "details": {"rules": ["nullable"], "type": "string"}, "callback_url": {"rules": ["regex[https_url]:^https://"], "type": "url"}}}, "type": "array"}, "total_pages": {"rules": ["required"], "type": "integer"}}}');
    }

}