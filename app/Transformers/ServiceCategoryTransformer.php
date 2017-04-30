<?php

namespace App\Transformers;

use App\Models\ServiceCategory;
use League\Fractal;

class ServiceCategoryTransformer extends Fractal\TransformerAbstract
{

    /**
     * @param ServiceCategory $serviceCategory
     * @return array
     */
    public function transform(ServiceCategory $serviceCategory)
    {
        $response = [
            'id' => (int)$serviceCategory->id,
            'name' => $serviceCategory->name,
            'created_at' => (string) $serviceCategory->created_at,
            'updated_at' => (string) $serviceCategory->updated_at
        ];

        return $response;
    }

}