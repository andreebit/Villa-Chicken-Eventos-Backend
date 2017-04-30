<?php

namespace App\Http\ValidationRules\V1\Quotation;

class ListQuotationRules
{

    public static function rules()
    {
        return [
            'id' => 'exists:evt_quotations,id'
        ];
    }

}