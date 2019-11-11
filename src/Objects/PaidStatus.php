<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * PaidStatus Object
 *
 * Cryto and fiat paid amounts
 *
 * @property integer $crypto Cryto Amount
 * @property string $fiat Fiat Amount
 *
 */
class PaidStatus extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "schema": {"crypto": {"rules": ["required"], "type": "integer"}, "fiat": {"rules": ["required", "decimal"], "type": "string"}}, "type": "object"}');
    }

}