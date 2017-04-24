<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtQuotationProductsTable extends Migration {

	public function up()
	{
		Schema::create('evt_quotation_products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->decimal('price', 10,2)->default('0');
			$table->integer('quantity');
			$table->integer('quotation_id')->unsigned();
			$table->integer('product_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_quotation_products');
	}
}