<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model 
{

    protected $table = 'evt_packages';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('event_type_id', 'name', 'price', 'minimum_pax');

    public function package_items()
    {
        return $this->hasMany('App\Models\PackageItem');
    }

    public function event_type()
    {
        return $this->belongsTo('App\Models\EventType');
    }

}