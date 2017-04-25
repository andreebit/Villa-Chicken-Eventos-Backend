<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\PackageItem;

class PackageItemRepository extends Repository
{

    protected function model()
    {
        return PackageItem::class;
    }

    public function search($query)
    {
        return null;
    }

    public function getByPackageId($packageId)
    {
        return $this->getByFieldValue('package_id', $packageId$packageId);
    }

}