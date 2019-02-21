<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * UnauthorizedClientException class
 *
 * Client performing the request is unauthorized (wrong client id/secret)
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class UnauthorizedClientException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::UNAUTHORIZED_CLIENT_ERROR;

    }

    public static function errorDescription()
    {

        return "Unauthorized Client";

    }

}