<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImages extends Model
{
    //
    
    //
    protected $table = 'seller_homepage';
    protected $fillable = [
        'seller_id', 
        'link_cat', 
        'images_cat', 
        'link_hot', 
        'images_hot', 
	'link_new',
	'images_new', 
	'link_home',
	'images_home', 
	'link_elec',
	'images_elec', 
	'created_at',
	'updated_at'
    ];
}