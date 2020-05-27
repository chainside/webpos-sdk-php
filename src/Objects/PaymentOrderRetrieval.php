<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderRetrieval Object
 *
 * Payment order retrieval data
 *
 * @property string $dispute_start_date Time at which either the payment order has been fully paid or is expired
 * @property string $chargeback_date Time at which either the payment order has been fully paid or is expired
 * @property string $resolved_at Time at which either the payment order has been fully paid or is expired
 * @property \Illuminate\Support\Collection $transactions Transactions paying the payment order
 * @property string $details Payment order's details
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property integer $expires_in  Expiration time of the payment order
 * @property PaymentOrderState $state Current payment state of the payment order
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $uuid UUID of the payment order
 * @property string $uri Bitcoin uri
 * @property string $expiration_time Expiration date of the payment order
 * @property PaymentOrderCreator $created_by Data of the pos which created the payment order
 * @property RateRetrieval $rate Crypto/Fiat rate of the payment order
 * @property string $created_at Creation date of the payment order
 * @property string $amount Fiat's amount of the payment order
 * @property string $reference Business' reference for the payment order
 * @property CurrencyRetrieval $currency Fiat currency of the payment order
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property integer $btc_amount  Bitcoin amount of the payment order
 * @property string $address Bitcoin address of the payment order
 *
 */
class PaymentOrderRetrieval extends SdkObject
{

    protected $subObjects = [
            "currency" => CurrencyRetrieval::class,
            "rate" => RateRetrieval::class,
            "transactions" => Transaction::class,
            "created_by" => PaymentOrderCreator::class,
            "state" => PaymentOrderState::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"resolved_at": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "reference": {"type": "string", "rules": ["nullable", "required"]}, "required_confirmations": {"type": "integer", "rules": ["required"]}, "dispute_start_date": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "created_by": {"schema": {"deposit_account": {"schema": {"type": {"type": "string", "rules": ["in:bank,bitcoin", "required"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": ["required"]}, "type": {"type": "string", "rules": ["required", "in:web"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": ["required"]}, "chargeback_date": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "expiration_time": {"type": "ISO_8601_date", "rules": ["required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "rate": {"schema": {"source": {"type": "string", "rules": ["required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "value": {"type": "string", "rules": ["decimal", "required"]}}, "type": "object", "rules": ["required"]}, "transactions": {"rules": ["required", "nullable"], "elements": {"schema": {"outs": {"rules": ["required"], "elements": {"schema": {"n": {"type": "integer", "rules": ["required"]}, "amount": {"type": "integer", "rules": ["required"]}}, "type": "object", "rules": []}, "type": "array"}, "status": {"type": "string", "rules": ["required", "in:unconfirmed,confirmed,reverted"]}, "normalized_txid": {"type": "string", "rules": ["len:64", "required"]}, "outs_sum": {"type": "integer", "rules": ["required"]}, "txid": {"type": "string", "rules": ["len:64", "required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "blockchain_status": {"type": "string", "rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"]}}, "type": "object", "rules": []}, "type": "array"}, "details": {"type": "string", "rules": ["required", "nullable"]}, "amount": {"type": "string", "rules": ["decimal", "required"]}, "currency": {"schema": {"type": {"type": "string", "rules": ["in:crypto,fiat", "required"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": ["required"]}, "callback_url": {"type": "url", "rules": ["regex[https_url]:^https://", "required"]}, "expires_in": {"type": "integer", "rules": ["required"]}, "state": {"schema": {"in_confirmation": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "unpaid": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "paid": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "status": {"type": "string", "rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"]}, "blockchain_status": {"type": "string", "rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"]}}, "type": "object", "rules": ["required"]}, "redirect_url": {"type": "url", "rules": ["regex[https_url]:^https://", "required"]}, "btc_amount": {"type": "integer", "rules": ["required"]}, "address": {"type": "base58", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "uri": {"type": "string", "rules": ["required"]}}, "type": "object", "rules": []}');
    }

}