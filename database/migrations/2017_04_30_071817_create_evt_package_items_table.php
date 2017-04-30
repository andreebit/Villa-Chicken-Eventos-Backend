<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtPackageItemsTable extends Migration {

	public function up()
	{
		Schema::create('evt_package_items', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('description');
			$table->integer('package_id')->unsigned();
			$table->integer('service_category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_package_items');
	}
}