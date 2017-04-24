<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvtService extends Model {

	protected $table = 'evt_services';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('description', 'price');

	public function quotations()
	{
		return $this->belongsToMany('App\Models\EvtQuotation')->withPivot('quantity', 'price', 'status');
	}

	public function special_requirements()
	{
		return $this->hasMany('App\Models\EvtSpecialRequirement');
	}

	public function packages()
	{
		return $this->belongsToMany('App\Models\EvtPackage');
	}

	public function service_type()
	{
		return $this->belongsTo('App\Models\EvtServiceType');
	}

	public function quotation_services()
	{
		return $this->hasMany('App\Models\EvtQuotationService');
	}

	public function package_services()
	{
		return $this->hasMany('App\Models\EvtPackageService');
	}

}