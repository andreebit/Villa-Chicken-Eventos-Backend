<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtPackagesTable extends Migration {

	public function up()
	{
		Schema::create('evt_packages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
            $table->decimal('price');
            $table->integer('minimum_pax')->default(0);
			$table->integer('event_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_packages');
	}
}