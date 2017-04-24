<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtPackageProductsTable extends Migration {

	public function up()
	{
		Schema::create('evt_package_products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('package_id')->unsigned();
			$table->integer('product_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_package_products');
	}
}