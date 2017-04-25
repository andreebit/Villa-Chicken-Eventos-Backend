<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\Package;
use App\Repositories\Contracts\CrudRepositoryInterface;

class PackageRepository extends Repository implements CrudRepositoryInterface
{

    protected function model()
    {
        return Package::class;
    }

    public function search($query)
    {
        return null;
    }

    public function getByEventType($eventTypeId)
    {
        return $this->getByFieldValue('event_type_id', $eventTypeId);
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

}