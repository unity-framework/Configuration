<?php

namespace Unity\Component\Config\Drivers\File\Exceptions;


use Exception;
use Throwable;

class ConfigFileNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}