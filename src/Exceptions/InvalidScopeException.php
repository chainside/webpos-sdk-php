<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidScopeException class
 *
 * The requested scope is invalid (either does not exist or is not available for the client)
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidScopeException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_SCOPE_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Scope";

    }

}