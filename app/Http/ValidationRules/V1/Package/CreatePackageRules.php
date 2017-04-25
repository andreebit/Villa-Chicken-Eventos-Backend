<?php

namespace App\Http\ValidationRules\Api\V1\Customer;

class CreatePackageRules
{

    public static function rules()
    {
        return [
            'name' => 'required|string'
        ];
    }

}