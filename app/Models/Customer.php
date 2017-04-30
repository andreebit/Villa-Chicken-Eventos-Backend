<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model 
{

    protected $table = 'evt_customers';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'lastname', 'phone_number', 'email', 'document_number', 'document_type', 'name_contact', 'phone_number_contact', 'email_contact');

    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation');
    }

}