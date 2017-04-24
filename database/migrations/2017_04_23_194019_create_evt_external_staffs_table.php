<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtExternalStaffsTable extends Migration {

	public function up()
	{
		Schema::create('evt_external_staffs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->enum('document_type', array('dni', 'ruc', 'ce', 'pas'));
			$table->string('document_number');
			$table->string('name');
			$table->string('lastname');
			$table->integer('event_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_external_staffs');
	}
}