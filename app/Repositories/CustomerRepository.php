<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\Customer;

/**
 * Class CustomerRepository
 * @package App\Repositories
 */
class CustomerRepository extends Repository
{

    /**
     * @return mixed
     */
    protected function model()
    {
        return Customer::class;
    }

    /**
     * @param $type
     * @param $number
     * @return mixed
     */
    public function getByDocument($type, $number) {
        return $this->getModel()
            ->where('document_type', '=', $type)
            ->where('document_number', '=', $number)->first();
    }

}