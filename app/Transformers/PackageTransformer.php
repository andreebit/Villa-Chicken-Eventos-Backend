<?php

namespace App\Transformers;

use App\Models\EventType;
use App\Models\Package;
use League\Fractal;

class PackageTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param Package $package
     * @return array
     */
    public function transform(Package $package)
    {

        $items = $package->package_items()->get();

        $arrayItems = [];
        foreach ($items as $item) {
            $arrayItems[] = [
                'description' => $item->description,
                'service_category' => [
                    'id' => $item->service_category->id,
                    'name' => $item->service_category->name
                ]
            ];
        }

        $response = [
            'id' => (int)$package->id,
            'name' => $package->name,
            'price' => (float) $package->price,
            'minimum_pax' => (integer) $package->minimum_pax,
            'event_type_id' => $package->event_type->id,
            'event_type' => $package->event_type->name,
            'items' => $arrayItems,
            'created_at' => (string) $package->created_at,
            'updated_at' => (string) $package->updated_at
        ];

        return $response;
    }

}