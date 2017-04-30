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
			$table->date('date_event');
			$table->time('time_event');
			$table->text('description');
			$table->integer('event_type_id')->unsigned();
			$table->integer('customer_id')->unsigned();
			$table->integer('lounge_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_quotations');
	}
}