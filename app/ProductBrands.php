<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBrands extends Model
{
    //
    protected $table = 'products_category_brands';
    protected $fillable = [
        'brands', 
        'subcategory_id', 
        'category_id', 
        'created_at',
	'updated_at'
    ];    
}
