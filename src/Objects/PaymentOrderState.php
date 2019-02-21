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
 * @property string $status Payment order's status
 * @property PaidStatus $paid Payment order's paid amount
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
        return Spec::fromJson('{"schema": {"in_confirmation": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "unpaid": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "status": {"rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"], "type": "string"}, "paid": {"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": ["required", "nullable"], "type": "object"}, "blockchain_status": {"rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"], "type": "string"}}, "rules": [], "type": "object"}');
    }

}