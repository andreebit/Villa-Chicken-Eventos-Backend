<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtProduct extends Model {

	protected $table = 'evt_products';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name', 'price');

	public function quotations()
	{
		return $this->belongsToMany('App\Models\EvtQuotation')->withPivot('quantity', 'price');
	}

	public function product_type()
	{
		return $this->belongsTo('App\Models\EvtProductType');
	}

	public function packages()
	{
		return $this->belongsToMany('App\Models\EvtPackage');
	}

	public function quotation_products()
	{
		return $this->hasMany('App\Models\EvtQuotationProduct');
	}

	public function package_products()
	{
		return $this->hasMany('App\Models\EvtPackageProduct');
	}

}