<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    //
    
    //
    protected $table = 'seller_sliders';
    protected $fillable = [
        'link1', 
        'image1', 
        'link2',
        'image2', 
        'link3',
        'image3', 
	'seller_id', 
        'created_at', 
        'updated_at'
    ];
}