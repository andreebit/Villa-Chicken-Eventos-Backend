<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\PackageItem;

/**
 * Class PackageItemRepository
 * @package App\Repositories
 */
class PackageItemRepository extends Repository
{

    /**
     * @return string
     */
    protected function model()
    {
        return PackageItem::class;
    }

    /**
     * @param $packageId
     * @return mixed
     */
    public function getByPackageId($packageId)
    {
        return $this->getByFieldValue('package_id', $packageId);
    }

}