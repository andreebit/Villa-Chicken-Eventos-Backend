<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtEventTypesTable extends Migration {

	public function up()
	{
		Schema::create('evt_event_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('evt_event_types');
	}
}