<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderCreator Object
 *
 * Data of payment order's creator
 *
 * @property string $name Payment order creator's name
 * @property string $uuid Payment order creator's uuid
 * @property DepositAccountLite $deposit_account Deposit account associated to the payment order's creator
 * @property string $type Payment order creator's type
 *
 */
class PaymentOrderCreator extends SdkObject
{

    protected $subObjects = [
            "deposit_account" => DepositAccountLite::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "deposit_account": {"rules": ["required"], "type": "object", "schema": {"name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}}}, "type": {"rules": ["required", "in:web"], "type": "string"}}}');
    }

}