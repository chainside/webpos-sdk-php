<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderCreator Object
 *
 * Data of payment order's creator
 *
 * @property string $type Payment order creator's type
 * @property DepositAccountLite $deposit_account Deposit account associated to the payment order's creator
 * @property string $name Payment order creator's name
 * @property string $uuid Payment order creator's uuid
 *
 */
class PaymentOrderCreator extends SdkObject
{

    protected $subObjects = [
            "deposit_account" => DepositAccountLite::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"deposit_account": {"schema": {"type": {"type": "string", "rules": ["in:bank,bitcoin", "required"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": ["required"]}, "type": {"type": "string", "rules": ["required", "in:web"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": []}');
    }

}