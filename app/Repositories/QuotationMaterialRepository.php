<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\QuotationMaterial;

/**
 * Class QuotationMaterialRepository
 * @package App\Repositories
 */
class QuotationMaterialRepository extends Repository
{

    /**
     * @return string
     */
    protected function model()
    {
        return QuotationMaterial::class;
    }

}