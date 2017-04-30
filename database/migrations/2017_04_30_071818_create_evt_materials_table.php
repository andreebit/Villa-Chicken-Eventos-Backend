<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtMaterialsTable extends Migration {

	public function up()
	{
		Schema::create('evt_materials', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->decimal('price', 10,2);
			$table->integer('package_id')->unsigned()->nullable();
			$table->boolean('is_package')->default(false);
		});
	}

	public function down()
	{
		Schema::drop('evt_materials');
	}
}