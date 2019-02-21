<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InternalServerErrorException class
 *
 * An internal server error has occurred
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InternalServerErrorException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INTERNAL_SERVER_ERROR;

    }

    public static function errorDescription()
    {

        return "Internal Server Error";

    }

}