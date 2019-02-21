<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidAcceptHeaderException class
 *
 * The Accept header is invalid (either is malformed or its value is invalid for the request)
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidAcceptHeaderException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_ACCEPT_HEADER_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Accept Header";

    }

}