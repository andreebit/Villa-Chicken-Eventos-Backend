<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtActivity extends Model {

	protected $table = 'evt_activities';
	public $timestamps = true;
	protected $fillable = array('description', 'start_time', 'end_time');

	public function event()
	{
		return $this->belongsTo('App\Models\EvtEvent');
	}

}