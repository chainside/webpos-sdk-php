<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderRetrieval Object
 *
 * Payment order retrieval data
 *
 * @property PaymentOrderCreator $created_by Data of the pos which created the payment order
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property string $dispute_start_date Time at which either the payment order has been fully paid or is expired
 * @property string $uri Bitcoin uri
 * @property CurrencyRetrieval $currency Fiat currency of the payment order
 * @property string $resolved_at Time at which either the payment order has been fully paid or is expired
 * @property string $uuid UUID of the payment order
 * @property PaymentOrderState $state Current payment state of the payment order
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property integer $required_confirmations Required confirmations for transactions paying the payment order
 * @property string $expiration_time Expiration date of the payment order
 * @property RateRetrieval $rate Crypto/Fiat rate of the payment order
 * @property string $address Bitcoin address of the payment order
 * @property string $amount Fiat's amount of the payment order
 * @property integer $btc_amount  Bitcoin amount of the payment order
 * @property string $created_at Creation date of the payment order
 * @property integer $expires_in  Expiration time of the payment order
 * @property \Illuminate\Support\Collection $transactions Transactions paying the payment order
 * @property string $reference Business' reference for the payment order
 * @property string $chargeback_date Time at which either the payment order has been fully paid or is expired
 * @property string $details Payment order's details
 *
 */
class PaymentOrderRetrieval extends SdkObject
{

    protected $subObjects = [
            "created_by" => PaymentOrderCreator::class,
            "currency" => CurrencyRetrieval::class,
            "state" => PaymentOrderState::class,
            "transactions" => Transaction::class,
            "rate" => RateRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"required_confirmations": {"rules": ["required"], "type": "integer"}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "created_by": {"rules": ["required"], "type": "object", "schema": {"name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "deposit_account": {"rules": ["required"], "type": "object", "schema": {"name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}}}, "type": {"rules": ["required", "in:web"], "type": "string"}}}, "uuid": {"rules": ["required"], "type": "uuid"}, "callback_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "redirect_url": {"rules": ["regex[https_url]:^https://", "required"], "type": "url"}, "dispute_start_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "state": {"rules": ["required"], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "paid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "in_confirmation": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "unpaid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}}}, "uri": {"rules": ["required"], "type": "string"}, "currency": {"rules": ["required"], "type": "object", "schema": {"name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}}}, "btc_amount": {"rules": ["required"], "type": "integer"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "expires_in": {"rules": ["required"], "type": "integer"}, "address": {"rules": ["required"], "type": "base58"}, "transactions": {"rules": ["required", "nullable"], "elements": {"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "outs": {"rules": ["required"], "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}, "type": "array"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}, "type": "array"}, "reference": {"rules": ["nullable", "required"], "type": "string"}, "rate": {"rules": ["required"], "type": "object", "schema": {"created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}}}, "resolved_at": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "chargeback_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "details": {"rules": ["required", "nullable"], "type": "string"}, "amount": {"rules": ["decimal", "required"], "type": "string"}}}');
    }

}