<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lounge extends Model 
{

    protected $table = 'evt_lounges';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('local_id', 'capacity', 'price');

    public function local()
    {
        return $this->belongsTo('App\Models\Local');
    }

    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation');
    }

}