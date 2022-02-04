<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderItems extends Model
{
    protected   $table          = 'order_items';
    protected   $primaryKey     = 'id';
    public      $timestamps     = true;

    protected $fillable = [
        'order_id', 'item_id', 'quantity', 'shipping_date', 'delivery_date',
        'vendor_notes', 'buyer_notes', 'created_at', 'updated_at'
    ];

    public function getAllOrders($per_page)
    {
        return $this->select('products.id as product_id', 'products.name as product_name', 'products.brand', 'products.featured_image',
        'seller.first_name as seller_first_name', 'seller.last_name as seller_last_name', 'vendor.first_name as vendor_first_name',
            'vendor.last_name as vendor_last_name', 'order_items.created_at', 'order_items.quantity',
            DB::raw('SUM((products.net_price * order_items.quantity)) as total_sold'), 'order_items.id as order_item_id')
            ->join('products', 'products.id', '=', 'order_items.item_id')
            ->join('users AS seller', 'seller.id', '=', 'order_items.seller_id')
            ->join('users AS vendor', 'vendor.id', '=', 'products.vendor_id')
            ->groupBy('order_items.id')
            ->orderBy('order_items.id', 'desc')
            ->paginate($per_page);
    }
}
