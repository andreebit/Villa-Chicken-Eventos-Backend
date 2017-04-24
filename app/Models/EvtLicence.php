<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvtLicence extends Model {

	protected $table = 'evt_licences';
	public $timestamps = true;
	protected $fillable = array('description', 'type', 'document_type', 'document_number');

	public function event()
	{
		return $this->belongsTo('App\Models\EvtEvent');
	}

}