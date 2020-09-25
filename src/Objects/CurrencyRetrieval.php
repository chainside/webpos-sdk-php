<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * CurrencyRetrieval Object
 *
 * Currency Data
 *
 * @property string $name Name of the currency
 * @property string $uuid UUID of the currency
 * @property string $type Currency's type (fiat/crypto)
 *
 */
class CurrencyRetrieval extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"name": {"rules": ["required"], "type": "string"}, "uuid": {"rules": ["required"], "type": "uuid"}, "type": {"rules": ["in:crypto,fiat", "required"], "type": "string"}}}');
    }

}