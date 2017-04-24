<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtPosition extends Model {

	protected $table = 'evt_positions';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name');

	public function employees()
	{
		return $this->hasMany('App\Models\EvtEmployee');
	}

	public function area()
	{
		return $this->belongsTo('App\Models\EvtArea');
	}

}