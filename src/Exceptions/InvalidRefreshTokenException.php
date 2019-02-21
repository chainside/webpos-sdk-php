<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidRefreshTokenException class
 *
 * The provided refresh token does not exist
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidRefreshTokenException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_REFRESH_TOKEN_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Refresh Token";

    }

}