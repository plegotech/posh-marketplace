<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerProduct extends Model {

    protected $table = 'seller_products';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'product_id', 'seller_id', 'seller_price'
    ];

    public function products() {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

}
