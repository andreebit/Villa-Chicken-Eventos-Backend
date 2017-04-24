<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtSpecialRequirementsTable extends Migration {

	public function up()
	{
		Schema::create('evt_special_requirements', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('description');
			$table->integer('service_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_special_requirements');
	}
}