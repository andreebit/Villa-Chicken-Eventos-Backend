<?php

namespace App\Http\ValidationRules\V1\Quotation;

class UpdateQuotationRules
{

    public static function rules()
    {
        return [
            "event_type_id" => "required|integer|exists:evt_event_types,id",
            "customer_id" => "required|integer|exists:evt_customers,id",
            "lounge_id" => "required|integer|exists:evt_lounges,id",
            "date_event" => "required|date",
            "time_event" => "required",
            "description" => "required|string",
            'items' => 'required|array',
            'items.*' => 'array',
            'items.*.price' => 'required|numeric',
            'items.*.quantity' => 'required|integer',
            'items.*.material_id' => 'required|integer|exists:evt_materials,id'
        ];
    }

}