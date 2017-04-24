<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtLounge extends Model {

	protected $table = 'evt_lounges';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('capacity', 'price');

	public function local()
	{
		return $this->belongsTo('App\Models\EvtLocal');
	}

}