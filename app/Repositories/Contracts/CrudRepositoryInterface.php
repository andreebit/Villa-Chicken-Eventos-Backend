<?php

namespace App\Repositories\Contracts;

interface CrudRepositoryInterface
{

    public function create($data);

    public function update($id, $data);

    public function delete($id);

}