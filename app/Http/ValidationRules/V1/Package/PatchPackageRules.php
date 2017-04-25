<?php

namespace App\Http\ValidationRules\Api\V1\Customer;

class PatchPackageRules
{

    public static function rules()
    {
        return [
            'name' => 'string'
        ];
    }

}