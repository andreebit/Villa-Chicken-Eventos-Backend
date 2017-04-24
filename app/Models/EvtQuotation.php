<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtQuotation extends Model {

	protected $table = 'evt_quotations';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('date', 'start_time', 'date_event', 'description', 'pax', 'status', 'end_time');

	public function employee()
	{
		return $this->belongsTo('App\Models\EvtEmployee');
	}

	public function lounge()
	{
		return $this->belongsTo('App\Models\EvtLounge');
	}

	public function customer()
	{
		return $this->belongsTo('App\Models\EvtCustomer');
	}

	public function event_type()
	{
		return $this->belongsTo('App\Models\EvtEventType');
	}

	public function products()
	{
		return $this->belongsToMany('App\Models\EvtProduct')->withPivot('quantity', 'price');
	}

	public function services()
	{
		return $this->belongsToMany('App\Models\EvtService')->withPivot('quantity', 'price', 'status');
	}

	public function event()
	{
		return $this->belongsTo('App\Models\EvtEvent');
	}

	public function quotation_products()
	{
		return $this->hasMany('App\Models\EvtQuotationProduct');
	}

	public function quotation_services()
	{
		return $this->hasMany('App\Models\EvtQuotationService');
	}

}