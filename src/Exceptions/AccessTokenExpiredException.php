<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * AccessTokenExpiredException class
 *
 * The access token is expired
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class AccessTokenExpiredException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::ACCESS_TOKEN_EXPIRED_ERROR;

    }

    public static function errorDescription()
    {

        return "Access Token Expired";

    }

}