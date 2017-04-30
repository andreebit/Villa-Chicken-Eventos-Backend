<?php

namespace App\Http\ValidationRules\V1\Quotation;

class PatchQuotationRules
{

    public static function rules()
    {
        return [
            "event_type_id" => "integer|exists:evt_event_types,id",
            "customer_id" => "integer|exists:evt_customers,id",
            "lounge_id" => "integer|exists:evt_lounges,id",
            "date_event" => "date",
            "description" => "string",
            'items' => 'array',
            'items.*' => 'array',
            'items.*.price' => 'required|numeric',
            'items.*.quantity' => 'required|integer',
            'items.*.material_id' => 'required|integer|exists:evt_materials,id'
        ];
    }

}