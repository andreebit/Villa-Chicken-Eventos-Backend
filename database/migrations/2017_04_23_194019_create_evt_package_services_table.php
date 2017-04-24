<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtPackageServicesTable extends Migration {

	public function up()
	{
		Schema::create('evt_package_services', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('package_id')->unsigned();
			$table->integer('service_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_package_services');
	}
}