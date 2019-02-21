<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidAuthorizationHeaderException class
 *
 * The authorization header is malformed (Format: Authorization: Basic/Bearer {value})
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidAuthorizationHeaderException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_AUTHORIZATION_HEADER_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Authorization Header";

    }

}