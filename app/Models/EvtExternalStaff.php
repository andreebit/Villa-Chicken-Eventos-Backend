<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtExternalStaff extends Model {

	protected $table = 'evt_external_staffs';
	public $timestamps = true;
	protected $fillable = array('document_type', 'document_number', 'name', 'lastname');

	public function event()
	{
		return $this->belongsTo('App\Models\EvtEvent');
	}

}