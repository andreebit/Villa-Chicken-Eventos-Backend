<?php

namespace App\Transformers;

use App\Models\Lounge;
use League\Fractal;

class LoungeTransformer extends Fractal\TransformerAbstract
{

    /**
     * @param Lounge $lounge
     * @return array
     */
    public function transform(Lounge $lounge)
    {
        $response = [
            'id' => (int)$lounge->id,
            'name' => $lounge->name,
            'capacity' => (int) $lounge->capacity,
            'price' => $lounge->price,
            'created_at' => (string) $lounge->created_at,
            'updated_at' => (string) $lounge->updated_at
        ];

        return $response;
    }

}