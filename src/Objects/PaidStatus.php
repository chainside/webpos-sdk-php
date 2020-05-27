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
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"fiat": {"type": "string", "rules": ["required", "decimal"]}, "crypto": {"type": "integer", "rules": ["required"]}}}');
    }

}