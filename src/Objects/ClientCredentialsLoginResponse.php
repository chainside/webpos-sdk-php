<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * ClientCredentialsLoginResponse Object
 *
 * Response data for a login performed by a confidential client.
 *
 * @property string $token_type Token's type
 * @property integer $expires_in Token's expiration time
 * @property string $access_token User's access token
 * @property string $id_token Jwt Token containing identity's informations
 * @property string $scope Authorization's scope
 *
 */
class ClientCredentialsLoginResponse extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"schema": {"token_type": {"type": "string", "rules": ["equals:Bearer", "required"]}, "expires_in": {"type": "integer", "rules": ["required"]}, "access_token": {"type": "string", "rules": ["required"]}, "id_token": {"type": "string", "rules": ["regex:^[A-Za-z0-9-_=]+\\\\.[A-Za-z0-9-_=]+\\\\.?[A-Za-z0-9-_.+/=]*$", "required"]}, "scope": {"type": "string", "rules": ["nullable"]}}, "type": "object", "rules": []}');
    }

}