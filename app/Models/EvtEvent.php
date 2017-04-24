<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtEvent extends Model {

	protected $table = 'evt_events';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('contract_number', 'status');

	public function quotation()
	{
		return $this->hasOne('App\Models\EvtQuotation');
	}

	public function external_staffs()
	{
		return $this->hasMany('App\Models\EvtExternalStaff');
	}

	public function guests()
	{
		return $this->hasMany('App\Models\EvtGuest');
	}

	public function activities()
	{
		return $this->hasMany('App\Models\EvtActivity');
	}

	public function satisfaction_poll()
	{
		return $this->hasOne('App\Models\EvtSatisfactionPoll');
	}

	public function licences()
	{
		return $this->hasMany('App\Models\EvtLicence');
	}

	public function employee()
	{
		return $this->belongsTo('App\Models\EvtEmployee');
	}

}