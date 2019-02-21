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
 *
 */
class PaymentOrderList extends SdkObject
{

    protected $subObjects = [
            "paymentorders" => PaymentOrderRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"paymentorders": {"elements": {"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "transactions": {"elements": {"schema": {"txid": {"rules": ["len:64", "required"], "type": "string"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "outs": {"elements": {"schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}, "rules": [], "type": "object"}, "rules": ["required"], "type": "array"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "outs_sum": {"rules": ["required"], "type": "integer"}}, "rules": [], "type": "object"}, "rules": ["required", "nullable"], "type": "array"}, "chargeback_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "reference": {"rules": ["nullable", "required"], "type": "string"}, "expires_in": {"rules": ["required"], "type": "integer"}, "uri": {"rules": ["required"], "type": "string"}, "btc_amount": {"rules": ["required"], "type": "integer"}, "dispute_start_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "required_confirmations": {"rules": ["required"], "type": "integer"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "address": {"rules": ["required"], "type": "base58"}, "redirect_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "currency": {"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}}, "rules": ["required"], "type": "object"}, "details": {"rules": ["required", "nullable"], "type": "string"}, "amount": {"rules": ["decimal", "required"], "type": "string"}, "rate": {"schema": {"value": {"rules": ["decimal", "required"], "type": "string"}, "source": {"rules": ["required"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}}, "rules": ["required"], "type": "object"}, "resolved_at": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "callback_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "state": {"schema": {"in_confirmation": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "unpaid": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "paid": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}}, "rules": ["required"], "type": "object"}, "created_by": {"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "deposit_account": {"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}}, "rules": ["required"], "type": "object"}, "type": {"rules": ["required", "in:web"], "type": "string"}, "name": {"rules": ["required"], "type": "string"}}, "rules": ["required"], "type": "object"}}, "rules": [], "type": "object"}, "rules": ["required", "nullable"], "type": "array"}}, "rules": [], "type": "object"}');
    }

}