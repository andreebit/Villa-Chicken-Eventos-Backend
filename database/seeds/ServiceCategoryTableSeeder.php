<?php

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategoryTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('evt_service_categories')->delete();

		// ServiceCategoryAyBSeed
		ServiceCategory::create(array(
				'name' => 'A y B'
			));

		// ServiceCategoryMenajeriaSeed
		ServiceCategory::create(array(
				'name' => 'Menajería'
			));

		// ServiceCategoryPersonalMantenimientoSeed
		ServiceCategory::create(array(
				'name' => 'Personal de Mantenimiento'
			));

		// ServiceCategoryPersonalOperativo
		ServiceCategory::create(array(
				'name' => 'Personal Operativo'
			));

		// ServiceCategoryFloresSeed
		ServiceCategory::create(array(
				'name' => 'Flores'
			));

		// ServiceCategoryMiscelaneosSeed
		ServiceCategory::create(array(
				'name' => 'Miscelaneos'
			));
	}
}