<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * Out Object
 *
 * Transaction's output
 *
 * @property integer $amount Output's amount
 * @property integer $n Transaction output's index
 *
 */
class Out extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"amount": {"rules": ["required"], "type": "integer"}, "n": {"rules": ["required"], "type": "integer"}}, "rules": [], "type": "object"}');
    }

}