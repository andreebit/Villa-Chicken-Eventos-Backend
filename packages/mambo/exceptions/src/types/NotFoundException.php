<?php

namespace Mambo\Exceptions\Types;

use Mambo\Exceptions\Exception;
use Mambo\Exceptions\Types\Contracts\ExceptionInterface;

class NotFoundException extends Exception implements ExceptionInterface
{

    private $defaultMessage = 'No se encontró el recurso.';

    public function __construct($message = '', $detail = [])
    {
        $message = (empty($message)) ? $this->defaultMessage : $message;
        parent::__construct($message, 404, 1003, $detail);
    }

}