<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtServicesTable extends Migration {

	public function up()
	{
		Schema::create('evt_services', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('description');
			$table->decimal('price', 10,2)->default('0');
			$table->integer('service_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_services');
	}
}