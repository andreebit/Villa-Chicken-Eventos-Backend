<?php

namespace Mambo\Exceptions\Types;

use Mambo\Exceptions\Exception;
use Mambo\Exceptions\Types\Contracts\ExceptionInterface;

class BadParamRequestException extends Exception implements ExceptionInterface
{

    private $defaultMessage = 'Parámetros incorrectos.';

    public function __construct($message = '', $detail = [])
    {
        $message = (empty($message)) ? $this->defaultMessage : $message;
        parent::__construct($message, 400, 1002, $detail);
    }

}