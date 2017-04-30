<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('evt_customers')->delete();

		// CustomerRucSeed
		Customer::create(array(
				'name' => 'Cliente',
				'lastname' => 'RUC',
				'phone_number' => '999999999',
				'email' => 'clienteruc@ejemplo.com',
				'document_number' => '10000000001',
				'document_type' => 'ruc',
				'name_contact' => 'Cliente RUC',
				'phone_number_contact' => '999999999',
				'email_contact' => 'clienteruc@ejemplo.com'
			));

		// CustomerDniSeed
		Customer::create(array(
				'name' => 'Cliente',
				'lastname' => 'DNI',
				'phone_number' => '7777777',
				'email' => 'clientedni@ejemplo.com',
				'document_number' => '00000000',
				'document_type' => 'dni',
				'name_contact' => 'Cliente DNI',
				'phone_number_contact' => '7777777',
				'email_contact' => 'clientedni@ejemplo.com'
			));
	}
}