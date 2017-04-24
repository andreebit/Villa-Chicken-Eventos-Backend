<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtQuotationsTable extends Migration {

	public function up()
	{
		Schema::create('evt_quotations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->date('date');
			$table->time('start_time');
			$table->date('date_event');
			$table->text('description');
			$table->integer('pax')->default('0');
			$table->enum('status', array('pendiente', 'contrato', 'cerrada'));
			$table->time('end_time');
			$table->integer('customer_id')->unsigned();
			$table->integer('employee_id')->unsigned();
			$table->integer('event_type_id')->unsigned();
			$table->integer('lounge_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_quotations');
	}
}