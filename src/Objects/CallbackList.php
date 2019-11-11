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
        return Spec::fromJson('{"rules": [], "schema": {"callbacks": {"type": "array", "rules": ["required"], "elements": {"rules": [], "schema": {"name": {"type": "string", "rules": ["required"]}}, "type": "object"}}}, "type": "object"}');
    }

}