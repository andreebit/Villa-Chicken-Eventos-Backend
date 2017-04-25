<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageItem extends Model 
{

    protected $table = 'evt_package_items';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('package_id', 'service_category_id', 'description');

    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }

    public function service_category()
    {
        return $this->belongsTo('App\Models\ServiceCategory');
    }

}