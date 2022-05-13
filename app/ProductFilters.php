<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFilters extends Model
{
    //
    protected $table = 'products_category_filters';
    protected $fillable = [
        'filters', 
        'subcategory_id', 
        'category_id', 
        'created_at',
	'updated_at'
    ];    
}
