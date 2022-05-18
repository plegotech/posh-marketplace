<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected   $table          = 'products';
    protected   $primaryKey     = 'id';
    public      $timestamps     = true;

    protected $fillable = [
        'images', 'name', 'brand', 'sku', 'description', 'vendor_id', 'net_price', 'seller_price', 'filters',
        'sale_price', 'created_at', 'updated_at', 'featured_image', 'parent_category', 'sub_category'
    ];

    public function ParentCategory() {
        return $this->hasMany(Category::class, 'parent_category');
    }    
    public function SubCategory() {
        return $this->hasMany(Category::class, 'sub_category');
    }    
//    public function CartItems() {
//        return $this->hasMany(CartItems::class, 'product_id');
//    }    
    
}
