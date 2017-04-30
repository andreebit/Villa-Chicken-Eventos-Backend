<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialRequirement extends Model 
{

    protected $table = 'evt_special_requirements';
    public $timestamps = true;
    protected $fillable = array('description', 'material_id');

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

}