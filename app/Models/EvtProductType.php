<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtProductType extends Model {

	protected $table = 'evt_product_types';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name', 'unit');

	public function products()
	{
		return $this->hasMany('App\Models\EvtProduct');
	}

}