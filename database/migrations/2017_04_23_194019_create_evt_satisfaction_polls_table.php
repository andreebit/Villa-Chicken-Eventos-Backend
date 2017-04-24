<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvtSatisfactionPollsTable extends Migration {

	public function up()
	{
		Schema::create('evt_satisfaction_polls', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->tinyInteger('satisfaction_level')->default('0');
			$table->text('suggestions')->nullable();
			$table->integer('event_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('evt_satisfaction_polls');
	}
}