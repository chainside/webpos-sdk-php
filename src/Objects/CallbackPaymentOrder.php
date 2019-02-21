<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * CallbackPaymentOrder Object
 *
 * Payment order retrieval data
 *
 * @property string $cancel_url The URL where the user is redirected upon payment order expiration/cancellation
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property integer $expires_in  Expiration time of the payment order
 * @property integer $btc_amount  Bitcoin amount of the payment order
 * @property string $dispute_start_date Time at which either the payment order has been fully paid or is expired
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $continue_url The URL where the user is redirected upon successful payment
 * @property string $created_at Creation date of the payment order
 * @property CurrencyRetrieval $currency Fiat currency of the payment order
 * @property string $uri Bitcoin uri
 * @property string $resolved_at Time at which either the payment order has been fully paid or is expired
 * @property \Illuminate\Support\Collection $transactions Transactions paying the payment order
 * @property string $address Bitcoin address of the payment order
 * @property string $uuid UUID of the payment order
 * @property string $chargeback_date Time at which either the payment order has been fully paid or is expired
 * @property string $reference Business' reference for the payment order
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property string $amount Fiat's amount of the payment order
 * @property PaymentOrderState $state Current payment state of the payment order
 * @property string $details Payment order's details
 * @property RateRetrieval $rate Crypto/Fiat rate of the payment order
 * @property string $expiration_time Expiration date of the payment order
 * @property PaymentOrderCreator $created_by Data of the pos which created the payment order
 *
 */
class CallbackPaymentOrder extends SdkObject
{

    protected $subObjects = [
            "rate" => RateRetrieval::class,
            "currency" => CurrencyRetrieval::class,
            "created_by" => PaymentOrderCreator::class,
            "transactions" => Transaction::class,
            "state" => PaymentOrderState::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"cancel_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "redirect_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "expires_in": {"rules": ["required"], "type": "integer"}, "btc_amount": {"rules": ["required"], "type": "integer"}, "dispute_start_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "required_confirmations": {"rules": ["required"], "type": "integer"}, "continue_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "currency": {"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}}, "rules": ["required"], "type": "object"}, "uri": {"rules": ["required"], "type": "string"}, "resolved_at": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "transactions": {"elements": {"schema": {"txid": {"rules": ["len:64", "required"], "type": "string"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "outs": {"elements": {"schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}, "rules": [], "type": "object"}, "rules": ["required"], "type": "array"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "outs_sum": {"rules": ["required"], "type": "integer"}}, "rules": [], "type": "object"}, "rules": ["required", "nullable"], "type": "array"}, "address": {"rules": ["required"], "type": "base58"}, "uuid": {"rules": ["required"], "type": "uuid"}, "chargeback_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "reference": {"rules": ["nullable", "required"], "type": "string"}, "callback_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "amount": {"rules": ["decimal", "required"], "type": "string"}, "state": {"schema": {"in_confirmation": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "unpaid": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "paid": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}}, "rules": ["required"], "type": "object"}, "details": {"rules": ["required", "nullable"], "type": "string"}, "rate": {"schema": {"value": {"rules": ["decimal", "required"], "type": "string"}, "source": {"rules": ["required"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}}, "rules": ["required"], "type": "object"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "created_by": {"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "deposit_account": {"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}}, "rules": ["required"], "type": "object"}, "type": {"rules": ["required", "in:web"], "type": "string"}, "name": {"rules": ["required"], "type": "string"}}, "rules": ["required"], "type": "object"}}, "rules": [], "type": "object"}');
    }

}