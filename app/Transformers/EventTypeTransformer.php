<?php

namespace App\Transformers;

use App\Models\EventType;
use League\Fractal;

class EventTypeTransformer extends Fractal\TransformerAbstract
{

    /**
     * @param EventType $eventType
     * @return array
     */
    public function transform(EventType $eventType)
    {
        $response = [
            'id' => (int)$eventType->id,
            'name' => $eventType->name,
            'created_at' => (string) $eventType->created_at,
            'updated_at' => (string) $eventType->updated_at
        ];

        return $response;
    }

}