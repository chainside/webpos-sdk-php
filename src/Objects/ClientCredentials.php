<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * ClientCredentials Object
 *
 * Data required to perform a confidential client login
 *
 * @property string $grant_type Oauth2 Authorization's grant type
 * @property string $scope Oauth2 scope of the client's authorization
 *
 */
class ClientCredentials extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "schema": {"grant_type": {"rules": ["equals:client_credentials", "required"], "type": "string"}, "scope": {"rules": ["in:*", "required"], "type": "string"}}, "type": "object"}');
    }

}