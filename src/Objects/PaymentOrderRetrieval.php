<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderRetrieval Object
 *
 * Payment order retrieval data
 *
 * @property string $redirect_url URL where to redirect the user to perform the payment
 * @property PaymentData $payment_data Data needed to perform the checkout
 * @property string $created_at Creation date of the payment order
 * @property string $chargeback_date Time at which either the payment order has been fully paid or is expired
 * @property string $amount Fiat's amount of the payment order
 * @property string $resolved_at Time at which either the payment order has been fully paid or is expired
 * @property PaymentOrderCreator $created_by Data of the pos which created the payment order
 * @property string $status Payment order's status
 * @property CurrencyRetrieval $currency Fiat currency of the payment order
 * @property string $reference Business' reference for the payment order
 * @property string $callback_url The URL contacted to send callbacks related to payment status changes
 * @property string $dispute_start_date Time at which either the payment order has been fully paid or is expired
 * @property string $uuid UUID of the payment order
 * @property string $details Payment order's details
 *
 */
class PaymentOrderRetrieval extends SdkObject
{

    protected $subObjects = [
            "created_by" => PaymentOrderCreator::class,
            "payment_data" => PaymentData::class,
            "currency" => CurrencyRetrieval::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"redirect_url": {"rules": ["regex[https_url]:^https://"], "type": "url"}, "payment_data": {"rules": ["nullable", "required"], "type": "object", "schema": {"bitcoin": {"rules": ["nullable"], "type": "object", "schema": {"transactions": {"rules": ["required", "nullable"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["required", "in:mempool,unconfirmed,confirmed,reverted"], "type": "string"}, "status": {"rules": ["required", "in:unconfirmed,confirmed,reverted"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "outs": {"rules": ["required"], "type": "array", "elements": {"rules": [], "type": "object", "schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}}}, "normalized_txid": {"rules": ["len:64", "required"], "type": "string"}, "outs_sum": {"rules": ["required"], "type": "integer"}, "txid": {"rules": ["len:64", "required"], "type": "string"}}}}, "state": {"rules": ["required"], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "in_confirmation": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "paid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "unpaid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}}}, "uri": {"rules": ["required"], "type": "string"}, "required_confirmations": {"rules": ["required"], "type": "integer"}, "address": {"rules": ["required"], "type": "string"}}}, "expires_in": {"rules": ["required", "nullable"], "type": "integer"}, "ln": {"rules": ["nullable"], "type": "object", "schema": {"invoice": {"rules": ["required"], "type": "string"}}}, "expiration_time": {"rules": ["required"], "type": "ISO_8601_date"}, "amount": {"rules": ["required", "nullable"], "type": "string"}, "rate": {"rules": ["nullable", "required"], "type": "object", "schema": {"from": {"rules": [], "type": "string"}, "to": {"rules": [], "type": "string"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}}}, "payment_method": {"rules": ["required", "nullable"], "type": "string"}}}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "chargeback_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "amount": {"rules": ["decimal", "required"], "type": "string"}, "resolved_at": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "created_by": {"rules": ["required"], "type": "object", "schema": {"type": {"rules": ["required", "in:web,mobile"], "type": "string"}, "deposit_account": {"rules": ["required"], "type": "object", "schema": {"type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}, "active": {"rules": [], "type": "boolean"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "currency": {"rules": ["required"], "type": "object", "schema": {"type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}, "reference": {"rules": ["nullable", "required"], "type": "string"}, "callback_url": {"rules": ["regex[https_url]:^https://"], "type": "url"}, "dispute_start_date": {"rules": ["required", "nullable"], "type": "ISO_8601_date"}, "uuid": {"rules": ["required"], "type": "uuid"}, "details": {"rules": ["nullable"], "type": "string"}}}');
    }

}