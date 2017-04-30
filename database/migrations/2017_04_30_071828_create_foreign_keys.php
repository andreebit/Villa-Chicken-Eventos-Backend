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
		Schema::table('evt_materials', function(Blueprint $table) {
			$table->foreign('package_id')->references('id')->on('evt_packages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_special_requirements', function(Blueprint $table) {
			$table->foreign('material_id')->references('id')->on('evt_materials')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->foreign('event_type_id')->references('id')->on('evt_event_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->foreign('customer_id')->references('id')->on('evt_customers')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->foreign('lounge_id')->references('id')->on('evt_lounges')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_lounges', function(Blueprint $table) {
			$table->foreign('local_id')->references('id')->on('evt_locals')
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
		Schema::table('evt_materials', function(Blueprint $table) {
			$table->dropForeign('evt_materials_package_id_foreign');
		});
		Schema::table('evt_special_requirements', function(Blueprint $table) {
			$table->dropForeign('evt_special_requirements_material_id_foreign');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->dropForeign('evt_quotations_event_type_id_foreign');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->dropForeign('evt_quotations_customer_id_foreign');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->dropForeign('evt_quotations_lounge_id_foreign');
		});
		Schema::table('evt_lounges', function(Blueprint $table) {
			$table->dropForeign('evt_lounges_local_id_foreign');
		});
	}
}