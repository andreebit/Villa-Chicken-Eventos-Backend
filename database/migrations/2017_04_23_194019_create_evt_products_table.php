<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtProductsTable extends Migration {

	public function up()
	{
		Schema::create('evt_products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->decimal('price', 10,2)->default('0');
			$table->integer('product_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_products');
	}
}