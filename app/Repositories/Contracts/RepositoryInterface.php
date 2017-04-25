<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{

    public function getModel();

    public function getAll();

    public function getAllPaginated($perPage, $filters = []);

    public function getByFieldValue($key, $value);

    public function getById($id);

}