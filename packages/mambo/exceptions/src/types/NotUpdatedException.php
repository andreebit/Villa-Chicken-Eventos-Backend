<?php

namespace Mambo\Exceptions\Types;

use Mambo\Exceptions\Exception;
use Mambo\Exceptions\Types\Contracts\ExceptionInterface;

class NotUpdatedException extends Exception implements ExceptionInterface
{

    private $defaultMessage = 'No se actualizó el recurso.';

    public function __construct($message = '', $detail = [])
    {
        $message = (empty($message)) ? $this->defaultMessage : $message;
        parent::__construct($message, 422, 2003, $detail);
    }

}