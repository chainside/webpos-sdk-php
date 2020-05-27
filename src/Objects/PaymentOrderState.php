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
 * @property PaidStatus $unpaid Payment order's unpaid amount
 * @property PaidStatus $paid Payment order's paid amount
 * @property string $status Payment order's status
 * @property string $blockchain_status Payment order's internal status
 *
 */
class PaymentOrderState extends SdkObject
{

    protected $subObjects = [
            "in_confirmation" => PaidStatus::class,
            "unpaid" => PaidStatus::class,
            "paid" => PaidStatus::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"in_confirmation": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "unpaid": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "paid": {"schema": {"crypto": {"type": "integer", "rules": ["required"]}, "fiat": {"type": "string", "rules": ["required", "decimal"]}}, "type": "object", "rules": ["required", "nullable"]}, "status": {"type": "string", "rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"]}, "blockchain_status": {"type": "string", "rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"]}}, "type": "object", "rules": []}');
    }

}