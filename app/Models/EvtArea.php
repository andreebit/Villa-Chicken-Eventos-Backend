<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtArea extends Model {

	protected $table = 'evt_areas';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name');

	public function positions()
	{
		return $this->hasMany('App\Models\EvtPosition');
	}

}