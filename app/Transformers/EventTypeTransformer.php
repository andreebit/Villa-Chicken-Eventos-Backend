<?php

namespace App\Transformers;

use App\Models\Customer;
use League\Fractal;

class CustomerTransformer extends Fractal\TransformerAbstract
{

    /**
     * @var array
     */
    protected $availableIncludes = [
        'document_type'
    ];

    /**
     * @var array
     */
    protected $defaultIncludes = [
        //'document_type'
    ];

    /**
     * @param Customer $customer
     * @return array
     */
    public function transform(Customer $customer)
    {
        $response = [
            'uuid' => (string)$customer->uuid,
            'name' => $customer->name,
            'fathers_lastname' => $customer->fathers_lastname,
            'mothers_lastname' => $customer->mothers_lastname,
            'phone_number' => $customer->phone_number,
            'email' => $customer->email,
            'document_type' => $customer->document_type->code,
            'document_number' => $customer->document_number,
            'data_complete' => (integer) $customer->data_complete,
            'store_quantity' => (integer) $customer->stores->count(),
            'is_subscribed' => $customer->is_subscribed
        ];

        return $response;
    }

    /**
     * @param Customer $customer
     * @return Fractal\Resource\Item
     */
    public function includeDocumentType(Customer $customer)
    {
        $data = $customer->document_type;
        return $this->item($data, new DocumentTypeTransformer(), false);
    }


}