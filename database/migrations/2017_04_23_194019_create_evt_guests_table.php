<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtGuestsTable extends Migration {

	public function up()
	{
		Schema::create('evt_guests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('lastname');
			$table->integer('event_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_guests');
	}
}