<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * FunctionalityDownException class
 *
 * The functionality is temporarily down
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class FunctionalityDownException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::FUNCTIONALITY_DOWN_ERROR;

    }

    public static function errorDescription()
    {

        return "Functionality Down";

    }

}