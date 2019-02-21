<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * MethodNotAllowedException class
 *
 * The endpoint does not expose the requested http method
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class MethodNotAllowedException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::METHOD_NOT_ALLOWED_ERROR;

    }

    public static function errorDescription()
    {

        return "Method not allowed";

    }

}