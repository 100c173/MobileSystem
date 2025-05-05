<?php

namespace App\Exceptions;

use Exception;

class AgentRequestNotFoundException extends Exception
{
    public function __construct($message = 'There is no registered agent request for you')
    {
        parent::__construct($message, 409); // 409 Conflict
    }
}
