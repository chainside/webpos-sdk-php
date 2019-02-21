<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * TooManyRequestsException class
 *
 * Rate limit exceeded
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class TooManyRequestsException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::TOO_MANY_REQUESTS_ERROR;

    }

    public static function errorDescription()
    {

        return "Too many requests";

    }

}