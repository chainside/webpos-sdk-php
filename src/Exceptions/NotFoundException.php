<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * NotFoundException class
 *
 * Requested resource does not exists
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class NotFoundException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::NOT_FOUND_ERROR;

    }

    public static function errorDescription()
    {

        return "Not Found";

    }

}