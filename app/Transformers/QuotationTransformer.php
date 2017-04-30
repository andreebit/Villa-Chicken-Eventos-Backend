<?php

namespace App\Transformers;

use App\Models\Customer;
use App\Models\Quotation;
use League\Fractal;

class QuotationTransformer extends Fractal\TransformerAbstract
{

    /**
     * @param Quotation $quotation
     * @return array
     */
    public function transform(Quotation $quotation)
    {


        $items = $quotation->quotation_materials()->get();

        $arrayItems = [];
        foreach ($items as $item) {
            $arrayItems[] = [
                'material' => [
                    'id' => $item->material->id,
                    'name' => $item->material->name,
                    'is_package' => (boolean) $item->material->is_package,
                    'package_id' => (int) $item->material->package_id
                ],
                'quantity' => (int) $item->quantity,
                'price' => (double) $item->price
            ];
        }


        $response = [
            'id' => (int)$quotation->id,
            'description' => $quotation->description,
            'date_event' => $quotation->date_event,
            'time_event' => $quotation->time_event,
            'customer' => [
                'id' => $quotation->customer->id,
                'name' => $quotation->customer->name . ' ' . $quotation->customer->lastname
            ],
            'event_type' => [
                'id' => $quotation->event_type->id,
                'name' => $quotation->event_type->name
            ],
            'lounge' => [
                'id' => $quotation->lounge->id,
                'id' => $quotation->lounge->name
            ],
            'items' => $arrayItems

        ];

        return $response;
    }

}