<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Local extends Model 
{

    protected $table = 'evt_locals';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'address');

    public function lounges()
    {
        return $this->hasMany('App\Models\Lounge');
    }

}