<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidContentTypeHeaderException class
 *
 * The Content Type header is invalid (either is malformed or its value is invalid for the request)
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidContentTypeHeaderException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_CONTENT_TYPE_HEADER_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Content Type Header";

    }

}