<?php

namespace Mambo\Exceptions\Types;

use Mambo\Exceptions\Exception;
use Mambo\Exceptions\Types\Contracts\ExceptionInterface;

class BadRequestException extends Exception implements ExceptionInterface
{

    private $defaultMessage = 'Petición incorrecta.';

    public function __construct($message = '', $detail = [])
    {
        $message = (empty($message)) ? $this->defaultMessage : $message;
        parent::__construct($message, 400, 1001, $detail);
    }

}