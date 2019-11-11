<?php

namespace Chainside\SDK\WebPos\Exceptions;

use Throwable;

class UnknownError extends ChainsideSdkException
{

    public function __construct($message, Throwable $previous = null)
    {
        parent::__construct($message, -1, $previous);
    }

}