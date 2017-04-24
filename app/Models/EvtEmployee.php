<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtEmployee extends Model {

	protected $table = 'evt_employees';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('document_type', 'document_number', 'admission_date', 'name', 'lastname', 'address', 'phone_number', 'email');

	public function local()
	{
		return $this->belongsTo('App\Models\EvtLocal');
	}

	public function quotations()
	{
		return $this->hasMany('App\Models\EvtQuotation');
	}

	public function position()
	{
		return $this->belongsTo('App\Models\EvtPosition');
	}

	public function events()
	{
		return $this->hasMany('App\Models\EvtEvent');
	}

}