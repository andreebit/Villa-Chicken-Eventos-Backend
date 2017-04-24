<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('evt_lounges', function(Blueprint $table) {
			$table->foreign('local_id')->references('id')->on('evt_locals')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_employees', function(Blueprint $table) {
			$table->foreign('position_id')->references('id')->on('evt_positions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->foreign('customer_id')->references('id')->on('evt_customers')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->foreign('employee_id')->references('id')->on('evt_employees')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->foreign('event_type_id')->references('id')->on('evt_event_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->foreign('lounge_id')->references('id')->on('evt_lounges')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_positions', function(Blueprint $table) {
			$table->foreign('area_id')->references('id')->on('evt_areas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_products', function(Blueprint $table) {
			$table->foreign('product_type_id')->references('id')->on('evt_product_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_services', function(Blueprint $table) {
			$table->foreign('service_type_id')->references('id')->on('evt_service_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_special_requirements', function(Blueprint $table) {
			$table->foreign('service_id')->references('id')->on('evt_services')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_packages', function(Blueprint $table) {
			$table->foreign('event_type_id')->references('id')->on('evt_event_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_events', function(Blueprint $table) {
			$table->foreign('quotation_id')->references('id')->on('evt_quotations')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_events', function(Blueprint $table) {
			$table->foreign('employee_id')->references('id')->on('evt_employees')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_guests', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('evt_events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_external_staffs', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('evt_events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_satisfaction_polls', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('evt_events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_licences', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('evt_events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_activities', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('evt_events')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotation_products', function(Blueprint $table) {
			$table->foreign('quotation_id')->references('id')->on('evt_quotations')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotation_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('evt_products')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_package_products', function(Blueprint $table) {
			$table->foreign('package_id')->references('id')->on('evt_packages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_package_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('evt_products')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotation_services', function(Blueprint $table) {
			$table->foreign('quotation_id')->references('id')->on('evt_quotations')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_quotation_services', function(Blueprint $table) {
			$table->foreign('service_id')->references('id')->on('evt_services')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_package_services', function(Blueprint $table) {
			$table->foreign('package_id')->references('id')->on('evt_packages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('evt_package_services', function(Blueprint $table) {
			$table->foreign('service_id')->references('id')->on('evt_services')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('evt_lounges', function(Blueprint $table) {
			$table->dropForeign('evt_lounges_local_id_foreign');
		});
		Schema::table('evt_employees', function(Blueprint $table) {
			$table->dropForeign('evt_employees_position_id_foreign');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->dropForeign('evt_quotations_customer_id_foreign');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->dropForeign('evt_quotations_employee_id_foreign');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->dropForeign('evt_quotations_event_type_id_foreign');
		});
		Schema::table('evt_quotations', function(Blueprint $table) {
			$table->dropForeign('evt_quotations_lounge_id_foreign');
		});
		Schema::table('evt_positions', function(Blueprint $table) {
			$table->dropForeign('evt_positions_area_id_foreign');
		});
		Schema::table('evt_products', function(Blueprint $table) {
			$table->dropForeign('evt_products_product_type_id_foreign');
		});
		Schema::table('evt_services', function(Blueprint $table) {
			$table->dropForeign('evt_services_service_type_id_foreign');
		});
		Schema::table('evt_special_requirements', function(Blueprint $table) {
			$table->dropForeign('evt_special_requirements_service_id_foreign');
		});
		Schema::table('evt_packages', function(Blueprint $table) {
			$table->dropForeign('evt_packages_event_type_id_foreign');
		});
		Schema::table('evt_events', function(Blueprint $table) {
			$table->dropForeign('evt_events_quotation_id_foreign');
		});
		Schema::table('evt_events', function(Blueprint $table) {
			$table->dropForeign('evt_events_employee_id_foreign');
		});
		Schema::table('evt_guests', function(Blueprint $table) {
			$table->dropForeign('evt_guests_event_id_foreign');
		});
		Schema::table('evt_external_staffs', function(Blueprint $table) {
			$table->dropForeign('evt_external_staffs_event_id_foreign');
		});
		Schema::table('evt_satisfaction_polls', function(Blueprint $table) {
			$table->dropForeign('evt_satisfaction_polls_event_id_foreign');
		});
		Schema::table('evt_licences', function(Blueprint $table) {
			$table->dropForeign('evt_licences_event_id_foreign');
		});
		Schema::table('evt_activities', function(Blueprint $table) {
			$table->dropForeign('evt_activities_event_id_foreign');
		});
		Schema::table('evt_quotation_products', function(Blueprint $table) {
			$table->dropForeign('evt_quotation_products_quotation_id_foreign');
		});
		Schema::table('evt_quotation_products', function(Blueprint $table) {
			$table->dropForeign('evt_quotation_products_product_id_foreign');
		});
		Schema::table('evt_package_products', function(Blueprint $table) {
			$table->dropForeign('evt_package_products_package_id_foreign');
		});
		Schema::table('evt_package_products', function(Blueprint $table) {
			$table->dropForeign('evt_package_products_product_id_foreign');
		});
		Schema::table('evt_quotation_services', function(Blueprint $table) {
			$table->dropForeign('evt_quotation_services_quotation_id_foreign');
		});
		Schema::table('evt_quotation_services', function(Blueprint $table) {
			$table->dropForeign('evt_quotation_services_service_id_foreign');
		});
		Schema::table('evt_package_services', function(Blueprint $table) {
			$table->dropForeign('evt_package_services_package_id_foreign');
		});
		Schema::table('evt_package_services', function(Blueprint $table) {
			$table->dropForeign('evt_package_services_service_id_foreign');
		});
	}
}