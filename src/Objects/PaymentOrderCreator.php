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
 * @property bool $active Wheter the creator active
 * @property string $uuid Payment order creator's uuid
 * @property string $name Payment order creator's name
 *
 */
class PaymentOrderCreator extends SdkObject
{

    protected $subObjects = [
            "deposit_account" => DepositAccountLite::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"type": {"rules": ["required", "in:web,mobile"], "type": "string"}, "deposit_account": {"rules": ["required"], "type": "object", "schema": {"type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}, "active": {"rules": [], "type": "boolean"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}');
    }

}