<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderState Object
 *
 * Data describing the current state of a payment order
 *
 * @property PaidStatus $in_confirmation Payment order's paid but unconfirmed amount
 * @property PaidStatus $paid Payment order's paid amount
 * @property string $status Payment order's status
 * @property string $blockchain_status Payment order's internal status
 * @property PaidStatus $unpaid Payment order's unpaid amount
 *
 */
class PaymentOrderState extends SdkObject
{

    protected $subObjects = [
            "in_confirmation" => PaidStatus::class,
            "paid" => PaidStatus::class,
            "unpaid" => PaidStatus::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "schema": {"in_confirmation": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}, "paid": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "unpaid": {"rules": ["nullable", "required"], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}}, "type": "object"}');
    }

}