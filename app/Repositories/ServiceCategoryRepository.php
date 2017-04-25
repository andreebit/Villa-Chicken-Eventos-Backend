<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\ServiceCategory;

class ServiceCategoryRepository extends Repository
{

    /**
     * @return mixed
     */
    protected function model()
    {
        return ServiceCategory::class;
    }

    /**
     * @param $query
     * @return null
     */
    public function search($query)
    {
        return null;
    }

}