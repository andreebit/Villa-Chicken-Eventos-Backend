<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtQuotationProduct extends Model {

	protected $table = 'evt_quotation_products';
	public $timestamps = true;
	protected $fillable = array('price', 'quantity');

	public function quotation()
	{
		return $this->belongsTo('App\Models\EvtQuotation');
	}

	public function product()
	{
		return $this->belongsTo('App\Models\EvtProduct');
	}

}