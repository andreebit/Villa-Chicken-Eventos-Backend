<?php

use Illuminate\Database\Seeder;
use App\Models\EventType;

class EventTypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('evt_event_types')->delete();

		// EventTypeCorporativoSeed
		EventType::create(array(
				'name' => 'Corporativo'
			));

		// EventTypeSocialSeed
		EventType::create(array(
				'name' => 'Social'
			));
	}
}