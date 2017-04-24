<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtProductTypesTable extends Migration {

	public function up()
	{
		Schema::create('evt_product_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('unit');
		});
	}

	public function down()
	{
		Schema::drop('evt_product_types');
	}
}