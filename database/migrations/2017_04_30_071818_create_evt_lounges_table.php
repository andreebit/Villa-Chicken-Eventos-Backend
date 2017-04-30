<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtLoungesTable extends Migration {

	public function up()
	{
		Schema::create('evt_lounges', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('local_id')->unsigned();
			$table->integer('capacity')->default('0');
			$table->decimal('price', 10,2);
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('evt_lounges');
	}
}