<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtSatisfactionPoll extends Model {

	protected $table = 'evt_satisfaction_polls';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('satisfaction_level', 'suggestions');

	public function event()
	{
		return $this->belongsTo('App\Models\EvtEvent');
	}

}