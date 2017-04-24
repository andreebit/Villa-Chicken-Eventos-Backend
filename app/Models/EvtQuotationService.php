<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtQuotationService extends Model {

	protected $table = 'evt_quotation_services';
	public $timestamps = true;
	protected $fillable = array('price', 'quantity', 'status', 'observation');

	public function quotation()
	{
		return $this->belongsTo('App\Models\EvtQuotation');
	}

	public function service()
	{
		return $this->belongsTo('App\Models\EvtService');
	}

}