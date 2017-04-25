<?php

namespace App\Http\ValidationRules\V1\Package;

class PatchPackageRules
{

    public static function rules()
    {
        return [
            "event_type_id" => "integer|exists:evt_event_types,id",
            'name' => 'string',
            'minimum_pax' => 'numeric',
            'price' => 'numeric',
            'items' => 'array',
            'items.*' => 'array',
            'items.*.description' => 'required|string',
            'items.*.service_category_id' => 'required|integer|exists:evt_service_categories,id'
        ];
    }

}