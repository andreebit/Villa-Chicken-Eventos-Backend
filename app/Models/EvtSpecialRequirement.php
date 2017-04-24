<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtSpecialRequirement extends Model {

	protected $table = 'evt_special_requirements';
	public $timestamps = true;
	protected $fillable = array('description');

	public function service()
	{
		return $this->belongsTo('App\Models\EvtService');
	}

}