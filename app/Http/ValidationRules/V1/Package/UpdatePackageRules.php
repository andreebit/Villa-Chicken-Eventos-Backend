<?php

namespace App\Http\ValidationRules\V1\Package;

class UpdatePackageRules
{

    public static function rules()
    {
        return [
            "event_type_id" => "required|integer|exists:evt_event_types,id",
            'name' => 'required|string',
            'minimum_pax' => 'required|numeric',
            'price' => 'required|numeric',
            'items' => 'required|array',
            'items.*' => 'array',
            'items.*.description' => 'required|string',
            'items.*.service_category_id' => 'required|integer|exists:evt_service_categories,id'
        ];
    }

}