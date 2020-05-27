<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * DepositAccountLite Object
 *
 * Deposit account lite object when sent nested in other api objects
 *
 * @property string $type Deposit account's type
 * @property string $name Deposit account's name
 * @property string $uuid Deposit account's uuid
 *
 */
class DepositAccountLite extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"type": {"type": "string", "rules": ["in:bank,bitcoin", "required"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": []}');
    }

}