<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerProduct extends Model
{
    protected   $table          = 'seller_products';
    protected   $primaryKey     = 'id';
    public      $timestamps     = false;

    protected $fillable = [
        'product_id', 'seller_id'
    ];
}
