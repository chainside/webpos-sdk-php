<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * RateRetrieval Object
 *
 * Rate Data
 *
 * @property string $from Starting currency for rate calculation
 * @property string $to Target currency for rate calculation
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
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"from": {"rules": [], "type": "string"}, "to": {"rules": [], "type": "string"}, "source": {"rules": ["required"], "type": "string"}, "value": {"rules": ["decimal", "required"], "type": "string"}, "created_at": {"rules": ["required"], "type": "ISO_8601_date"}}}');
    }

}