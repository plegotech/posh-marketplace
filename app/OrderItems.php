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

    public function getAllOrders($per_page, $search, $category, $sub_category)
    {
        $orders = $this->select('products.id as product_id', 'products.name as product_name', 'products.brand',
            'products.net_price', 'products.featured_image',
            'seller.first_name as seller_first_name', 'seller.last_name as seller_last_name', 'vendor.first_name as vendor_first_name',
            'vendor.last_name as vendor_last_name', 'order_items.created_at', 'order_items.quantity', 'order_items.progress',
            DB::raw('SUM((products.net_price * order_items.quantity)) as total_sold'), 'orders.shipping_address',
            'order_items.id as order_item_id', 'orders.id as order_id', 'orders.user_id', 'customer.first_name as customer_first_name',
            'customer.last_name as customer_last_name');

        if(strlen($search) > 1) {
            $orders = $orders->where(function ($orders) use($search) {
                $orders->where('products.name', 'LIKE', '%'.$search.'%')
                    ->orWhere('orders.shipping_address', 'LIKE', '%'.$search.'%');
            });
        }

        if(strlen($category) > 1) {
            $orders = $orders->where('products.parent_category', $category);
        }

        if(strlen($sub_category) > 1) {
            $orders = $orders->where('products.sub_category', $sub_category);
        }

        $orders = $orders->join('products', 'products.id', '=', 'order_items.item_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('users AS customer', 'customer.id', '=', 'orders.user_id')
            ->join('users AS seller', 'seller.id', '=', 'order_items.seller_id')
            ->join('users AS vendor', 'vendor.id', '=', 'products.vendor_id')
            ->groupBy('order_items.id')
            ->orderBy('order_items.id', 'desc')
            ->paginate($per_page);

        return $orders;
    }
}
