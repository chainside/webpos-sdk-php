<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidAccessTokenException class
 *
 * The provided access token does not exist
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidAccessTokenException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_ACCESS_TOKEN_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Access Token";

    }

}