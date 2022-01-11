<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected   $table          = 'products';
    protected   $primaryKey     = 'id';
    public      $timestamps     = false;

    protected $fillable = [
        'images', 'name', 'sku', 'description', 'vendor_id', 'categories', 'net_price',
        'sale_price', 'created_at', 'updated_at'
    ];
}
