<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationMaterial extends Model 
{

    protected $table = 'evt_quotation_materials';
    public $timestamps = true;
    protected $fillable = array('price', 'quantity', 'quotation_id', 'material_id');

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

}