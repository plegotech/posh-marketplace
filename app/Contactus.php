<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model {
    //
    protected $table = 'contactus';
    protected $fillable = [
        'name', 'email', 'phone', 'purpose','message', 'seller_id', 'created_at', 'updated_at'
    ];
}
