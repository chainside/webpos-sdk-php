<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidGrantTypeException class
 *
 * Grant type used to perform authentication not supported
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidGrantTypeException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_GRANT_TYPE_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Grant Type";

    }

}