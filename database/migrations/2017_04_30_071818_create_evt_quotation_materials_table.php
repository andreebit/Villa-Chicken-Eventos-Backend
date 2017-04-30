<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtQuotationMaterialsTable extends Migration {

	public function up()
	{
		Schema::create('evt_quotation_materials', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->decimal('price', 10,2);
			$table->integer('quantity')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('evt_quotation_materials');
	}
}