<?php

namespace App\Http\ValidationRules\Api\V1\Customer;

class ListPackageRules
{

    public static function rules()
    {
        return [
            'page' => 'integer',
            'items' => 'integer',
            'name' => 'string'
        ];
    }

}