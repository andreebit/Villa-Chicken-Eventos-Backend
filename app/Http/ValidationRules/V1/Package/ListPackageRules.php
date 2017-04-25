<?php

namespace App\Http\ValidationRules\V1\Package;

class ListPackageRules
{

    public static function rules()
    {
        return [
            'event_type_id' => 'exists:evt_event_types,id'
        ];
    }

}