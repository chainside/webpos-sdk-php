<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaymentOrderCreator Object
 *
 * Data of payment order's creator
 *
 * @property DepositAccountLite $deposit_account Deposit account associated to the payment order's creator
 * @property string $name Payment order creator's name
 * @property string $type Payment order creator's type
 * @property string $uuid Payment order creator's uuid
 * @property bool $active Wheter the creator active
 *
 */
class PaymentOrderCreator extends SdkObject
{

    protected $subObjects = [
            "deposit_account" => DepositAccountLite::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "schema": {"deposit_account": {"rules": ["required"], "schema": {"name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}}, "type": "object"}, "name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["required", "in:web,mobile"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "active": {"rules": [], "type": "boolean"}}, "type": "object"}');
    }

}