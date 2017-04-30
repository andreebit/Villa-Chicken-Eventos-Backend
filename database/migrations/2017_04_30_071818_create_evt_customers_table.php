<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtCustomersTable extends Migration {

	public function up()
	{
		Schema::create('evt_customers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('lastname');
			$table->string('phone_number');
			$table->string('email');
			$table->string('document_number');
			$table->enum('document_type', array('dni', 'ruc'));
			$table->string('name_contact');
			$table->string('phone_number_contact');
			$table->string('email_contact');
		});
	}

	public function down()
	{
		Schema::drop('evt_customers');
	}
}