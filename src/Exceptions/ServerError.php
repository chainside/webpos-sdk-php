<?php

namespace Chainside\SDK\WebPos\Exceptions;


interface ServerError
{

    public static function errorCode();

    public static function errorDescription();

}