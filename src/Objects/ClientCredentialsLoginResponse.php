<?php

namespace Chainside\SDK\WebPos\Objects;

use SDK\Boilerplate\SdkObject;
use ElevenLab\Validation\Spec;

/**
 * ClientCredentialsLoginResponse Object
 *
 * Response data for a login performed by a confidential client.
 *
 * @property integer $expires_in Token's expiration time
 * @property string $scope Authorization's scope
 * @property string $token_type Token's type
 * @property string $access_token User's access token
 * @property string $id_token Jwt Token containing identity's informations
 *
 */
class ClientCredentialsLoginResponse extends SdkObject
{

    protected $subObjects = [
            ];

    public static function schema()
    {
        return Spec::fromJson('{"type": "object", "rules": [], "schema": {"expires_in": {"type": "integer", "rules": ["required"]}, "scope": {"type": "string", "rules": ["nullable"]}, "token_type": {"type": "string", "rules": ["equals:Bearer", "required"]}, "access_token": {"type": "string", "rules": ["required"]}, "id_token": {"type": "string", "rules": ["regex:^[A-Za-z0-9-_=]+\\\\.[A-Za-z0-9-_=]+\\\\.?[A-Za-z0-9-_.+/=]*$", "required"]}}}');
    }

}