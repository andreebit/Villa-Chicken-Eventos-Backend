<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtLocalsTable extends Migration {

	public function up()
	{
		Schema::create('evt_locals', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('address');
			$table->string('phone_number');
		});
	}

	public function down()
	{
		Schema::drop('evt_locals');
	}
}