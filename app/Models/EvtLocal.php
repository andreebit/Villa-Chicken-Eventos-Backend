<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtLocal extends Model {

	protected $table = 'evt_locals';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name', 'address', 'phone_number');

	public function lounges()
	{
		return $this->hasMany('App\Models\EvtLounge');
	}

	public function employees()
	{
		return $this->hasMany('App\Models\EvtEmployee');
	}

}