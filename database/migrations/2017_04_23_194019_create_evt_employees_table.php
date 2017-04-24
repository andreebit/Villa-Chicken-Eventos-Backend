<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('evt_employees', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->enum('document_type', array('dni', 'ruc', 'ce', 'pas'));
			$table->string('document_number');
			$table->date('admission_date');
			$table->string('name');
			$table->string('lastname');
			$table->string('address');
			$table->string('phone_number');
			$table->string('email');
			$table->integer('position_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_employees');
	}
}