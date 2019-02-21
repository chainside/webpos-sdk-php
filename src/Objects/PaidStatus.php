<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaidStatus Object
 *
 * Cryto and fiat paid amounts
 *
 * @property string $fiat Fiat Amount
 * @property integer $crypto Cryto Amount
 *
 */
class PaidStatus extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"fiat": {"rules": ["required", "decimal"], "type": "string"}, "crypto": {"rules": ["required"], "type": "integer"}}, "rules": [], "type": "object"}');
    }

}