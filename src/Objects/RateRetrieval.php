<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * RateRetrieval Object
 *
 * Rate Data
 *
 * @property string $created_at Creation's date of the rate
 * @property string $source Exchange providing the rate
 * @property string $value Value of the rate
 *
 */
class RateRetrieval extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"created_at": {"rules": ["required"], "type": "ISO_8601_date"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}}}');
    }

}