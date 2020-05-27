<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidCallbackException class
 *
 * The requested callback is invalid for the current payment state
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidCallbackException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_CALLBACK_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Callback";

    }

}