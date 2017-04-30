<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('EventTypeTableSeeder');
		$this->command->info('EventType table seeded!');

		$this->call('ServiceCategoryTableSeeder');
		$this->command->info('ServiceCategory table seeded!');

		$this->call('CustomerTableSeeder');
		$this->command->info('Customer table seeded!');
	}
}