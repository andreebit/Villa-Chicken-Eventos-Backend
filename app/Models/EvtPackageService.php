<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtPackageService extends Model {

	protected $table = 'evt_package_services';
	public $timestamps = true;

	public function package()
	{
		return $this->belongsTo('App\Models\EvtPackage');
	}

	public function service()
	{
		return $this->belongsTo('App\Models\EvtService');
	}

}