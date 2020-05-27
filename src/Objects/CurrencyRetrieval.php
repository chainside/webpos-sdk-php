<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * CurrencyRetrieval Object
 *
 * Currency Data
 *
 * @property string $type Currency's type (fiat/crypto)
 * @property string $name Name of the currency
 * @property string $uuid UUID of the currency
 *
 */
class CurrencyRetrieval extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"type": {"type": "string", "rules": ["in:crypto,fiat", "required"]}, "name": {"type": "string", "rules": ["required"]}, "uuid": {"type": "uuid", "rules": ["required"]}}, "type": "object", "rules": []}');
    }

}