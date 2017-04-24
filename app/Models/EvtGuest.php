<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtGuest extends Model {

	protected $table = 'evt_guests';
	public $timestamps = true;
	protected $fillable = array('name', 'lastname');

	public function event()
	{
		return $this->belongsTo('App\Models\EvtEvent');
	}

}