<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtPositionsTable extends Migration {

	public function up()
	{
		Schema::create('evt_positions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->integer('area_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_positions');
	}
}