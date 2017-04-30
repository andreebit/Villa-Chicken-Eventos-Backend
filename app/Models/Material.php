<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model 
{

    protected $table = 'evt_materials';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'price', 'package_id', 'is_package');

    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }

    public function special_requirements()
    {
        return $this->hasMany('App\Models\SpecialRequirement');
    }

    public function quotations()
    {
        return $this->belongsToMany('App\Models\Quotation')->withPivot('quantity', 'price');
    }

    public function quotation_materials()
    {
        return $this->hasMany('App\Models\QuotationMaterial');
    }

}