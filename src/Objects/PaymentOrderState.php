<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderState Object
 *
 * Data describing the current state of a payment order
 *
 * @property string $blockchain_status Payment order's internal status
 * @property PaidStatus $in_confirmation Payment order's paid but unconfirmed amount
 * @property PaidStatus $paid Payment order's paid amount
 * @property PaidStatus $unpaid Payment order's unpaid amount
 *
 */
class PaymentOrderState extends SdkObject
{

    protected $subObjects = [
            "unpaid" => PaidStatus::class,
            "in_confirmation" => PaidStatus::class,
            "paid" => PaidStatus::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "in_confirmation": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "paid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}, "unpaid": {"rules": ["nullable", "required"], "type": "object", "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}}}}');
    }

}