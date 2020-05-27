<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * RateUnavailableException class
 *
 * An accurate Rate is unavailable
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class RateUnavailableException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::RATE_UNAVAILABLE_ERROR;

    }

    public static function errorDescription()
    {

        return "Rate Unavailable";

    }

}