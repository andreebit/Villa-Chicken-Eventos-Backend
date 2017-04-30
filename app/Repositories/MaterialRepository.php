<?php
/**
 * Created by PhpStorm.
 * User: andree
 * Date: 23/04/17
 * Time: 15:28
 */

namespace App\Repositories;


use App\Models\Customer;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

/**
 * Class MaterialRepository
 * @package App\Repositories
 */
class MaterialRepository extends Repository
{

    /**
     * @return string
     */
    protected function model()
    {
        return Material::class;
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getByEventType($type) {
        return DB::select(DB::raw("
        (select evt_materials.* from evt_materials 
        inner join evt_packages on evt_materials.package_id = evt_packages.id
        where is_package = 1 and event_type_id = :event_type and evt_materials.deleted_at is null) 
        union 
        (select * from evt_materials where is_package = 0 and deleted_at is null)
        "), ['event_type' => $type]);
    }

}