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
 * @property PaidStatus $paid Payment order's paid amount
 * @property string $status Payment order's status
 * @property PaidStatus $in_confirmation Payment order's paid but unconfirmed amount
 * @property PaidStatus $unpaid Payment order's unpaid amount
 *
 */
class PaymentOrderState extends SdkObject
{

    protected $subObjects = [
            "paid" => PaidStatus::class,
            "in_confirmation" => PaidStatus::class,
            "unpaid" => PaidStatus::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}, "paid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "in_confirmation": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}, "unpaid": {"rules": ["required", "nullable"], "type": "object", "schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}}}}');
    }

}