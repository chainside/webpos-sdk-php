<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * ForbiddenException class
 *
 * The user has no permission to perform the request
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class ForbiddenException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::FORBIDDEN_ERROR;

    }

    public static function errorDescription()
    {

        return "Forbidden";

    }

}