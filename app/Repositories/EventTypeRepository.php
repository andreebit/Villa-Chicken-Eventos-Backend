<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\EventType;

/**
 * Class EventTypeRepository
 * @package App\Repositories
 */
class EventTypeRepository extends Repository
{

    /**
     * @return mixed
     */
    protected function model()
    {
        return EventType::class;
    }

}