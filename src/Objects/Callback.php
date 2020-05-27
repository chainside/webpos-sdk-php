<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * Callback Object
 *
 * Callback Retrieval object
 *
 * @property string $name Namespace of a callback sent after the related payment status' transition
 *
 */
class Callback extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"name": {"type": "string", "rules": ["required"]}}, "type": "object", "rules": []}');
    }

}