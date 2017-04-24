<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtQuotationServicesTable extends Migration {

	public function up()
	{
		Schema::create('evt_quotation_services', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->decimal('price', 10,2);
			$table->integer('quantity');
			$table->enum('status', array('pendiente', 'correcto', 'observado'));
			$table->text('observation')->nullable();
			$table->integer('quotation_id')->unsigned();
			$table->integer('service_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_quotation_services');
	}
}