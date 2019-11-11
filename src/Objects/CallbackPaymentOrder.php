<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * CallbackPaymentOrder Object
 *
 * Payment order retrieval data
 *
 * @property string $address Bitcoin address of the payment order
 * @property string $amount Fiat's amount of the payment order
 * @property integer $btc_amount  Bitcoin amount of the payment order
 * @property string $cancel_url The URL where the user is redirected upon payment order expiration/cancellation
 * @property string $continue_url The URL where the user is redirected upon successful payment
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property string $created_at Creation date of the payment order
 * @property PaymentOrderCreator $created_by Data of the pos which created the payment order
 * @property CurrencyRetrieval $currency Fiat currency of the payment order
 * @property string $details Payment order's details
 * @property string $expiration_time Expiration date of the payment order
 * @property integer $expires_in  Expiration time of the payment order
 * @property RateRetrieval $rate Crypto/Fiat rate of the payment order
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property string $reference Business' reference for the payment order
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $resolved_at Time at which either the payment order has been fully paid or is expired
 * @property PaymentOrderState $state Current payment state of the payment order
 * @property \Illuminate\Support\Collection $transactions Transactions paying the payment order
 * @property string $dispute_start_date Time at which either the payment order has been fully paid or is expired
 * @property string $chargeback_date Time at which either the payment order has been fully paid or is expired
 * @property string $uri Bitcoin uri
 * @property string $uuid UUID of the payment order
 *
 */
class CallbackPaymentOrder extends SdkObject
{

    protected $subObjects = [
            "created_by" => PaymentOrderCreator::class,
            "currency" => CurrencyRetrieval::class,
            "rate" => RateRetrieval::class,
            "state" => PaymentOrderState::class,
            "transactions" => Transaction::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "schema": {"address": {"rules": ["required"], "type": "base58"}, "amount": {"rules": ["decimal", "required"], "type": "string"}, "btc_amount": {"rules": ["required"], "type": "integer"}, "cancel_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "continue_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "callback_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "created_by": {"rules": ["required"], "schema": {"deposit_account": {"rules": ["required"], "schema": {"name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}}, "type": "object"}, "name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["required", "in:web,mobile"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "active": {"rules": [], "type": "boolean"}}, "type": "object"}, "currency": {"rules": ["required"], "schema": {"name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}}, "type": "object"}, "details": {"rules": ["required", "nullable"], "type": "string"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "expires_in": {"rules": ["required"], "type": "integer"}, "rate": {"rules": ["required"], "schema": {"created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}, "from": {"type": "string", "rules": []}, "to": {"type": "string", "rules": []}}, "type": "object"}, "redirect_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "reference": {"rules": ["nullable", "required"], "type": "string"}, "required_confirmations": {"rules": ["required"], "type": "integer"}, "resolved_at": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "state": {"rules": ["required"], "schema": {"in_confirmation": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}, "paid": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "unpaid": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}}, "type": "object"}, "transactions": {"type": "array", "rules": ["nullable", "required"], "elements": {"rules": [], "schema": {"status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs": {"type": "array", "rules": ["required"], "elements": {"rules": [], "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}, "type": "object"}}, "outs_sum": {"rules": ["required"], "type": "integer"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}, "type": "object"}}, "dispute_start_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "chargeback_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "uri": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}}, "type": "object"}');
    }

}