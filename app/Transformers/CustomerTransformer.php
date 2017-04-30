<?php

namespace App\Transformers;

use App\Models\Customer;
use League\Fractal;

class CustomerTransformer extends Fractal\TransformerAbstract
{

    /**
     * @param Customer $customer
     * @return array
     */
    public function transform(Customer $customer)
    {
        $response = [
            'id' => (int)$customer->id,
            'name' => $customer->name,
            'lastname' => $customer->lastname,
            'phone_number' => $customer->phone_number,
            'email' => $customer->email,
            'document_number' => $customer->document_number,
            'document_type' => $customer->document_type,
            'name_contact' => $customer->name_contact,
            'phone_number_contact' => $customer->phone_number_contact,
            'email_contact' => $customer->email_contact,
            'created_at' => (string) $customer->created_at,
            'updated_at' => (string) $customer->updated_at
        ];

        return $response;
    }

}