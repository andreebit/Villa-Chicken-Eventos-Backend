<?php

namespace App\Transformers;

use App\Models\Customer;
use App\Models\Material;
use League\Fractal;

class MaterialTransformer extends Fractal\TransformerAbstract
{

    /**
     * @param $material
     * @return array
     */
    public function transform($material)
    {
        $response = [
            'id' => (int)$material->id,
            'name' => $material->name,
            'price' => (double) $material->price,
            'is_package' => $material->is_package,
            'package_id' => $material->package_id,
            'created_at' => (string) $material->created_at,
            'updated_at' => (string) $material->updated_at
        ];

        return $response;
    }

}