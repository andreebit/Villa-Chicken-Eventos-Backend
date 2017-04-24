<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtLicencesTable extends Migration {

	public function up()
	{
		Schema::create('evt_licences', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('description');
			$table->enum('type', array('unimpro', 'apdayc'));
			$table->enum('document_type', array('boleta', 'factura'));
			$table->string('document_number');
			$table->integer('event_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_licences');
	}
}