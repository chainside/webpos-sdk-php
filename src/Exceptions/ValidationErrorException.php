<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * ValidationErrorException class
 *
 * The request body is invalid. Further informations are available in the error response
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class ValidationErrorException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::VALIDATION_ERROR;

    }

    public static function errorDescription()
    {

        return "Validation Error";

    }

}