<?php
namespace Mambo\Exceptions\Types\Contracts;

interface ExceptionInterface
{
    public function __construct($message, $detail);
}