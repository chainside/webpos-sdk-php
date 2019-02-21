<?php

namespace Chainside\SDK\WebPos\Exceptions;


/**
 * InvalidRealmException class
 *
 * Client is not authorized to perform requests on this realm (sandbox/live)
 *
 * @package Chainside\SDK\WebPos\Exceptions
 */
class InvalidRealmException extends ChainsideServerException
{

    public static function errorCode()
    {

        return ChainsideError::INVALID_REALM_ERROR;

    }

    public static function errorDescription()
    {

        return "Invalid Realm";

    }

}