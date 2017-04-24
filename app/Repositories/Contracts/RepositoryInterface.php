<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{

    public function getByFieldValue($key, $value);

    public function getById($id);

}