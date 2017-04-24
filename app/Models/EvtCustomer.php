<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtCustomer extends Model {

	protected $table = 'evt_customers';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function quotations()
	{
		return $this->hasMany('App\Models\EvtQuotation');
	}

}