<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * DepositAccountLite Object
 *
 * Deposit account lite object when sent nested in other api objects
 *
 * @property string $uuid Deposit account's uuid
 * @property string $name Deposit account's name
 * @property string $type Deposit account's type
 *
 */
class DepositAccountLite extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}, "type": {"rules": ["in:bank,bitcoin", "required"], "type": "string"}}, "rules": [], "type": "object"}');
    }

}