<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderList Object
 *
 * List of Business' payment orders
 *
 * @property integer $total_pages Total number of pages given the requested page size
 * @property \Illuminate\Support\Collection $paymentorders Business' payment orders
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
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"total_pages": {"type": "integer", "rules": ["required"]}, "paymentorders": {"type": "array", "rules": ["nullable", "required"], "elements": {"type": "object", "rules": [], "schema": {"details": {"type": "string", "rules": ["nullable"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "currency": {"type": "object", "rules": ["required"], "schema": {"name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "type": {"type": "string", "rules": ["in:crypto,fiat", "required"]}}}, "required_confirmations": {"type": "integer", "rules": ["required"]}, "amount": {"type": "string", "rules": ["decimal", "required"]}, "expires_in": {"type": "integer", "rules": ["required"]}, "callback_url": {"type": "url", "rules": ["regex[https_url]:^https://"]}, "created_by": {"type": "object", "rules": ["required"], "schema": {"name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "active": {"type": "boolean", "rules": []}, "deposit_account": {"type": "object", "rules": ["required"], "schema": {"name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "type": {"type": "string", "rules": ["in:bank,bitcoin", "required"]}}}, "type": {"type": "string", "rules": ["required", "in:web,mobile"]}}}, "rate": {"type": "object", "rules": ["required"], "schema": {"source": {"type": "string", "rules": ["required"]}, "value": {"type": "string", "rules": ["decimal", "required"]}, "from": {"type": "string", "rules": []}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "to": {"type": "string", "rules": []}}}, "chargeback_date": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "reference": {"type": "string", "rules": ["nullable", "required"]}, "redirect_url": {"type": "url", "rules": ["regex[https_url]:^https://"]}, "expiration_time": {"type": "ISO_8601_date", "rules": ["required"]}, "dispute_start_date": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "address": {"type": "string", "rules": ["regex:^(bc1|[13]|tb1|[2nm]|bcrt)[a-zA-HJ-NP-Z0-9]{25,40}$", "required"]}, "state": {"type": "object", "rules": ["required"], "schema": {"in_confirmation": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}, "status": {"type": "string", "rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"]}, "paid": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}, "blockchain_status": {"type": "string", "rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"]}, "unpaid": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}}}, "resolved_at": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "transactions": {"type": "array", "rules": ["nullable", "required"], "elements": {"type": "object", "rules": [], "schema": {"status": {"type": "string", "rules": ["required", "in:unconfirmed,confirmed,reverted"]}, "normalized_txid": {"type": "string", "rules": ["len:64", "required"]}, "txid": {"type": "string", "rules": ["len:64", "required"]}, "blockchain_status": {"type": "string", "rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "outs": {"type": "array", "rules": ["required"], "elements": {"type": "object", "rules": [], "schema": {"n": {"type": "integer", "rules": ["required"]}, "amount": {"type": "integer", "rules": ["required"]}}}}, "outs_sum": {"type": "integer", "rules": ["required"]}}}}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "uri": {"type": "string", "rules": ["required"]}, "btc_amount": {"type": "integer", "rules": ["required"]}}}}, "total_items": {"type": "integer", "rules": ["required"]}}}');
    }

}