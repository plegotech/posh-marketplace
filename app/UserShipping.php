<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShipping extends Model
{
    //
    //
    protected $table = 'users_shipping';
    protected $fillable = [
        'user_id', 
        'first_name', 
        'last_name', 
        'phone',
        'email',
        'address', 
	'country',
	'state',
	'city',
	'zip',
        'created_at', 
        'updated_at'
    ];
}
