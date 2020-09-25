<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * ClientCredentialsLoginResponse Object
 *
 * Response data for a login performed by a confidential client.
 *
 * @property string $id_token Jwt Token containing identity's informations
 * @property string $scope Authorization's scope
 * @property string $token_type Token's type
 * @property integer $expires_in Token's expiration time
 * @property string $access_token User's access token
 *
 */
class ClientCredentialsLoginResponse extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"rules": [], "type": "object", "schema": {"token_type": {"rules": ["equals:Bearer", "required"], "type": "string"}, "scope": {"rules": ["nullable"], "type": "string"}, "expires_in": {"rules": ["required"], "type": "integer"}, "id_token": {"rules": ["regex:^[A-Za-z0-9-_=]+\\\\.[A-Za-z0-9-_=]+\\\\.?[A-Za-z0-9-_.+/=]*$", "required"], "type": "string"}, "access_token": {"rules": ["required"], "type": "string"}}}');
    }

}