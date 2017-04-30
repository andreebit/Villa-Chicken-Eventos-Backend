<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model 
{

    protected $table = 'evt_quotations';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('date_event', 'time_event', 'description', 'event_type_id', 'customer_id', 'lounge_id');

    public function materials()
    {
        return $this->belongsToMany('App\Models\Material')->withPivot('quantity', 'price');
    }

    public function event_type()
    {
        return $this->belongsTo('App\Models\EventType');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function lounge()
    {
        return $this->belongsTo('App\Models\Lounge');
    }

    public function quotation_materials()
    {
        return $this->hasMany('App\Models\QuotationMaterial');
    }

}