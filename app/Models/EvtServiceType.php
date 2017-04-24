<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtServiceType extends Model {

	protected $table = 'evt_service_types';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name');

	public function services()
	{
		return $this->hasMany('App\Models\EvtService');
	}

}