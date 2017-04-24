<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtEventsTable extends Migration {

	public function up()
	{
		Schema::create('evt_events', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('contract_number');
			$table->enum('status', array('pendiente', 'ejecutando', 'finalizado', 'anulado'));
			$table->integer('quotation_id')->unsigned();
			$table->integer('employee_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_events');
	}
}