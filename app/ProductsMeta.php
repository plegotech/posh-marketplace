<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsMeta extends Model
{
    //
    protected $table = 'products_meta';
    protected $fillable = [
        'field', 
        'value', 
        'product_id', 
        'category_id', 
        'subcategory_id', 
        'created_at',
	'updated_at'
    ]; 
}
