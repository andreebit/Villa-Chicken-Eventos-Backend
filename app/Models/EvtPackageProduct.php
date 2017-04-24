<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtPackageProduct extends Model {

	protected $table = 'evt_package_products';
	public $timestamps = true;

	public function package()
	{
		return $this->belongsTo('App\Models\EvtPackage');
	}

	public function product()
	{
		return $this->belongsTo('App\Models\EvtProduct');
	}

}