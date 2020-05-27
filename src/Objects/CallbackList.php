<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * CallbackList Object
 *
 * Callback list object
 *
 * @property \Illuminate\Support\Collection $callbacks Valid payment transitions callbacks
 *
 */
class CallbackList extends SdkObject
{

    protected $subObjects = [
            "callbacks" => Callback::class,
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"callbacks": {"rules": ["required"], "elements": {"schema": {"name": {"type": "string", "rules": ["required"]}}, "type": "object", "rules": []}, "type": "array"}}, "type": "object", "rules": []}');
    }

}