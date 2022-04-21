<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProductVisited extends Model
{
    //
    protected $table = 'user_products_visited';
    protected $fillable = [
        'user_id', 'product_id','created_at','updated_at'
    ];
}
