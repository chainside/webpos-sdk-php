<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * ClientCredentials Object
 *
 * Data required to perform a confidential client login
 *
 * @property string $scope Oauth2 scope of the client's authorization
 * @property string $grant_type Oauth2 Authorization's grant type
 *
 */
class ClientCredentials extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"scope": {"type": "string", "rules": ["in:*", "required"]}, "grant_type": {"type": "string", "rules": ["equals:client_credentials", "required"]}}}');
    }

}