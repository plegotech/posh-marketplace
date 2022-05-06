<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    //
    
    //
    protected $table = 'seller_promotions';
    protected $fillable = [
        'link1', 
        'image1', 
        'link2', 
        'image2', 
        'link3', 
        'image3', 
	'link4', 
	'image4',
        'seller_id', 
        'created_at', 
        'updated_at'
    ];
}
