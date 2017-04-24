<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtPackage extends Model {

	protected $table = 'evt_packages';
	public $timestamps = true;
	protected $fillable = array('name');

	public function event_type()
	{
		return $this->belongsTo('App\Models\EvtEventType');
	}

	public function products()
	{
		return $this->belongsToMany('App\Models\EvtProduct');
	}

	public function services()
	{
		return $this->belongsToMany('App\Models\EvtService');
	}

	public function package_services()
	{
		return $this->hasMany('App\Models\EvtPackageService');
	}

	public function package_products()
	{
		return $this->hasMany('App\Models\EvtPackageProduct');
	}

}