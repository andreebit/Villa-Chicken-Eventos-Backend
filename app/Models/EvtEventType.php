<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtEventType extends Model {

	protected $table = 'evt_event_types';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name');

	public function quotations()
	{
		return $this->hasMany('App\Models\EvtQuotation');
	}

	public function packages()
	{
		return $this->hasMany('App\Models\EvtPackage');
	}

}