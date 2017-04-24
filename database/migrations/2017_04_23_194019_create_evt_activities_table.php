<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtActivitiesTable extends Migration {

	public function up()
	{
		Schema::create('evt_activities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('description');
			$table->time('start_time');
			$table->string('end_time');
			$table->integer('event_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_activities');
	}
}