<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * RateRetrieval Object
 *
 * Rate Data
 *
 * @property string $source Exchange providing the rate
 * @property string $value Value of the rate
 * @property string $created_at Creation's date of the rate
 *
 */
class RateRetrieval extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"source": {"type": "string", "rules": ["required"]}, "value": {"type": "string", "rules": ["decimal", "required"]}, "created_at": {"type": "ISO_8601_date", "rules": ["required"]}}}');
    }

}