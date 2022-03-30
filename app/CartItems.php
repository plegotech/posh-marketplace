<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    //
    //
    protected $table = 'cart_items';
    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'created_at', 'updated_at'
    ];
    public function productsTable() {
        //return $this->hasMany(Product::class, 'product_id');
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
