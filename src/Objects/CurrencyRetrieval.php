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
 * @property string $uuid UUID of the currency
 * @property string $name Name of the currency
 *
 */
class CurrencyRetrieval extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "name": {"rules": ["required"], "type": "string"}}}');
    }

}