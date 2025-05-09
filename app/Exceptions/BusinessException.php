<?php

namespace App\Exceptions;

use Exception;

class BusinessException extends Exception
{
    public function __construct($message = "Erro", $code = 422)
    {
        parent::__construct($message, $code);
    }
}
