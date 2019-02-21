<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * GetWebPosPaymentsUrlParams Object
 *
 * 
 *
 * @property string $pos_uuid 
 *
 */
class GetWebPosPaymentsUrlParams extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"pos_uuid": {"rules": ["required"], "type": "uuid"}}, "rules": ["nullable"], "type": "object"}');
    }

}