<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\Lounge;

/**
 * Class LoungeRepository
 * @package App\Repositories
 */
class LoungeRepository extends Repository
{

    /**
     * @return mixed
     */
    protected function model()
    {
        return Lounge::class;
    }

    /**
     * @param $localId
     * @return mixed
     */
    public function getByLocal($localId) {
        return $this->getModel()
            ->where('local_id', '=', $localId)->get();
    }

}