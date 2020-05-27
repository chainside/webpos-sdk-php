<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * CallbackPaymentOrder Object
 *
 * Payment order retrieval data
 *
 * @property string $uuid UUID of the payment order
 * @property CurrencyRetrieval $currency Fiat currency of the payment order
 * @property string $amount Fiat's amount of the payment order
 * @property integer $expires_in  Expiration time of the payment order
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property string $chargeback_date Time at which either the payment order has been fully paid or is expired
 * @property string $reference Business' reference for the payment order
 * @property string $dispute_start_date Time at which either the payment order has been fully paid or is expired
 * @property string $address Bitcoin address of the payment order
 * @property string $resolved_at Time at which either the payment order has been fully paid or is expired
 * @property string $continue_url The URL where the user is redirected upon successful payment
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $details Payment order's details
 * @property string $cancel_url The URL where the user is redirected upon payment order expiration/cancellation
 * @property \Illuminate\Support\Collection $transactions Transactions paying the payment order
 * @property PaymentOrderCreator $created_by Data of the pos which created the payment order
 * @property RateRetrieval $rate Crypto/Fiat rate of the payment order
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property string $expiration_time Expiration date of the payment order
 * @property PaymentOrderState $state Current payment state of the payment order
 * @property string $created_at Creation date of the payment order
 * @property string $uri Bitcoin uri
 * @property integer $btc_amount  Bitcoin amount of the payment order
 *
 */
class CallbackPaymentOrder extends SdkObject
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
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"uuid": {"type": "uuid", "rules": ["required"]}, "currency": {"type": "object", "rules": ["required"], "schema": {"name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "type": {"type": "string", "rules": ["in:crypto,fiat", "required"]}}}, "amount": {"type": "string", "rules": ["decimal", "required"]}, "expires_in": {"type": "integer", "rules": ["required"]}, "callback_url": {"type": "url", "rules": ["regex[https_url]:^https://", "required"]}, "chargeback_date": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "reference": {"type": "string", "rules": ["nullable", "required"]}, "dispute_start_date": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "address": {"type": "string", "rules": ["regex:^(bc1|[13]|tb1|[2nm]|bcrt)[a-zA-HJ-NP-Z0-9]{25,40}$", "required"]}, "resolved_at": {"type": "ISO_8601_date", "rules": ["required", "nullable"]}, "continue_url": {"type": "url", "rules": ["regex[https_url]:^https://", "required"]}, "required_confirmations": {"type": "integer", "rules": ["required"]}, "details": {"type": "string", "rules": ["required", "nullable"]}, "cancel_url": {"type": "url", "rules": ["regex[https_url]:^https://", "required"]}, "transactions": {"type": "array", "rules": ["nullable", "required"], "elements": {"type": "object", "rules": [], "schema": {"status": {"type": "string", "rules": ["required", "in:unconfirmed,confirmed,reverted"]}, "normalized_txid": {"type": "string", "rules": ["len:64", "required"]}, "txid": {"type": "string", "rules": ["len:64", "required"]}, "blockchain_status": {"type": "string", "rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "outs": {"type": "array", "rules": ["required"], "elements": {"type": "object", "rules": [], "schema": {"n": {"type": "integer", "rules": ["required"]}, "amount": {"type": "integer", "rules": ["required"]}}}}, "outs_sum": {"type": "integer", "rules": ["required"]}}}}, "created_by": {"type": "object", "rules": ["required"], "schema": {"name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "active": {"type": "boolean", "rules": []}, "deposit_account": {"type": "object", "rules": ["required"], "schema": {"name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}, "type": {"type": "string", "rules": ["in:bank,bitcoin", "required"]}}}, "type": {"type": "string", "rules": ["required", "in:web,mobile"]}}}, "rate": {"type": "object", "rules": ["required"], "schema": {"source": {"type": "string", "rules": ["required"]}, "value": {"type": "string", "rules": ["decimal", "required"]}, "from": {"type": "string", "rules": []}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "to": {"type": "string", "rules": []}}}, "redirect_url": {"type": "url", "rules": ["regex[https_url]:^https://", "required"]}, "expiration_time": {"type": "ISO_8601_date", "rules": ["required"]}, "state": {"type": "object", "rules": ["required"], "schema": {"in_confirmation": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}, "status": {"type": "string", "rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"]}, "paid": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}, "blockchain_status": {"type": "string", "rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"]}, "unpaid": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}}}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}, "uri": {"type": "string", "rules": ["required"]}, "btc_amount": {"type": "integer", "rules": ["required"]}}}');
    }

}