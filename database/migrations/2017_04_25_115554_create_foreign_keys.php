<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('evt_packages', function(Blueprint $table) {
			$table->foreign('event_type_id')->references('id')->on('evt_event_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_package_items', function(Blueprint $table) {
			$table->foreign('package_id')->references('id')->on('evt_packages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_package_items', function(Blueprint $table) {
			$table->foreign('service_category_id')->references('id')->on('evt_service_categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('evt_packages', function(Blueprint $table) {
			$table->dropForeign('evt_packages_event_type_id_foreign');
		});
		Schema::table('evt_package_items', function(Blueprint $table) {
			$table->dropForeign('evt_package_items_package_id_foreign');
		});
		Schema::table('evt_package_items', function(Blueprint $table) {
			$table->dropForeign('evt_package_items_service_category_id_foreign');
		});
	}
}