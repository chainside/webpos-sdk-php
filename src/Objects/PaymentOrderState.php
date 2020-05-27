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
 * @property string $status Payment order's status
 * @property PaidStatus $paid Payment order's paid amount
 * @property string $blockchain_status Payment order's internal status
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
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"in_confirmation": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}, "status": {"type": "string", "rules": ["in:pending,paid,cancelled,expired,network_dispute,chargeback", "required"]}, "paid": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}, "blockchain_status": {"type": "string", "rules": ["in:pending,partial,mempool_unconfirmed,unconfirmed,paid,cancelled,expired,network_dispute,mempool_network_dispute,possible_chargeback,chargeback", "required"]}, "unpaid": {"type": "object", "rules": ["nullable", "required"], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}}}');
    }

}