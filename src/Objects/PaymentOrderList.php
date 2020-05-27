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
        return Spec::fromJson('{"schema": {"total_items": {"type": "integer", "rules": ["required"]}, "paymentorders": {"rules": ["required", "nullable"], "elements": {"schema": {"resolved_at": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "reference": {"type": "string", "rules": ["nullable", "required"]}, "required_confirmations": {"type": "integer", "rules": ["required"]}, "dispute_start_date": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "created_by": {"schema": {"deposit_account": {"schema": {"type": {"type": "string", "rules": ["in:bank,bitcoin", "required"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": ["required"]}, "active": {"type": "boolean", "rules": []}, "type": {"type": "string", "rules": ["required", "in:web,mobile"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": ["required"]}, "chargeback_date": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "expiration_time": {"type": "ISO_8601_date", "rules": ["required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "rate": {"schema": {"source": {"type": "string", "rules": ["required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "to": {"type": "string", "rules": []}, "from": {"type": "string", "rules": []}, "value": {"type": "string", "rules": ["decimal", "required"]}}, "type": "object", "rules": ["required"]}, "transactions": {"rules": ["required", "nullable"], "elements": {"schema": {"outs": {"rules": ["required"], "elements": {"schema": {"n": {"type": "integer", "rules": ["required"]}, "amount": {"type": "integer", "rules": ["required"]}}, "type": "object", "rules": []}, "type": "array"}, "status": {"type": "string", "rules": ["required", "in:unconfirmed,confirmed,reverted"]}, "normalized_txid": {"type": "string", "rules": ["len:64", "required"]}, "outs_sum": {"type": "integer", "rules": ["required"]}, "txid": {"type": "string", "rules": ["len:64", "required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "blockchain_status": {"type": "string", "rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"]}}, "type": "object", "rules": []}, "type": "array"}, "details": {"type": "string", "rules": ["nullable"]}, "amount": {"type": "string", "rules": ["decimal", "required"]}, "currency": {"schema": {"type": {"type": "string", "rules": ["in:crypto,fiat", "required"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": ["required"]}, "callback_url": {"type": "url", "rules": ["regex[https_url]:^https://"]}, "expires_in": {"type": "integer", "rules": ["required"]}, "state": {"schema": {"in_confirmation": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "unpaid": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "paid": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "status": {"type": "string", "rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"]}, "blockchain_status": {"type": "string", "rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"]}}, "type": "object", "rules": ["required"]}, "redirect_url": {"type": "url", "rules": ["regex[https_url]:^https://"]}, "btc_amount": {"type": "integer", "rules": ["required"]}, "address": {"type": "string", "rules": ["regex:^(bc1|[13]|tb1|[2nm]|bcrt)[a-zA-HJ-NP-Z0-9]{25,40}$", "required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "uri": {"type": "string", "rules": ["required"]}}, "type": "object", "rules": []}, "type": "array"}, "total_pages": {"type": "integer", "rules": ["required"]}}, "type": "object", "rules": []}');
    }

}