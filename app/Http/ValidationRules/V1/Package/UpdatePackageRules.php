<?php

namespace App\Http\ValidationRules\Api\V1\Customer;

class UpdatePackageRules
{

    public static function rules()
    {
        return [
            'name' => 'required|string'
        ];
    }

}