<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected   $table          = 'orders';
    protected   $primaryKey     = 'id';
    public      $timestamps     = true;

    protected $fillable = [
        'user_id', 'status', 'shipping_address', 'shipping_method', 'payment_methods',
        'notes', 'created_at', 'updated_at'
    ];

    public function getVendorOrderById($id)
    {
        // Oct 01, 2021 09:58 PM
        $order = $this::select('order_items.id', 'order_items.status as item_status', 'order_items.progress',
            'order_items.shipping_date', 'orders.shipping_address', 'orders.shipping_method',
            DB::raw("DATE_FORMAT(orders.created_at, '%b %d, %Y %h:%i %p') AS 'ordered_at'"));
        $order = $order->join('order_items', 'order_items.order_id', '=', 'orders.id');

        $order = $order->where('order_items.id', $id)
        ->first();

        return $order;
    }


    public function getOrdersByVendor($vendor, $per_page, $order_by, $order, $search, $status, $date)
    {   // Oct 01, 2021 09:58 PM
        $orders = $this::select('order_items.id', 'products.brand', 'products.net_price', 'products.name', 'orders.shipping_address',
            'users.first_name', 'users.last_name','products.vendor_id', 'order_items.quantity',
            'order_items.status as item_status', 'order_items.progress',
            DB::raw("DATE_FORMAT(orders.created_at, '%b %d, %Y %h:%i %p') AS 'ordered_at'"));

        if(strlen($search) > 1) {
            $orders = $orders->where(function ($orders) use($search) {
                $orders->where('users.first_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('users.last_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('products.name', 'LIKE', '%'.$search.'%')
                    ->orWhere('products.brand', 'LIKE', '%'.$search.'%')
                    ->orWhere('orders.shipping_address', 'LIKE', '%'.$search.'%')
                    ->orWhere('orders.notes', 'LIKE', '%'.$search.'%');
            });
        }

        if(strlen($status) > 1) {
            if($status == 'delivered') {
                $orders = $orders->where('order_items.progress', $status);
            } else {
                $orders = $orders->where('order_items.status', $status);
            }
        }

        if(strlen($date) > 1) {
            $orders = $orders->where('order_items.created_at', 'LIKE', '%'.$date.'%');
        }

        $orders = $orders->where('products.vendor_id', $vendor);

        $orders = $orders->join('order_items', 'order_items.order_id', '=', 'orders.id');
        $orders = $orders->join('products', 'products.id', '=', 'order_items.item_id');
        $orders = $orders->join('users', 'users.id', '=', 'orders.user_id');

        $orders = $orders->orderBy($order_by, $order)
            ->groupBy('order_items.id');
        // Each item is being considered a separate order as sites contain multiple vendors & a buyer is not
        // restricted to purchase from an specific vendor

        if(!empty($per_page)) {
            $orders = $orders->paginate($per_page);
        } else {
            $orders = $orders->take(25000)
                ->get();
        }
        return $orders;
    }

    public function getOrdersBySeller($seller, $per_page, $order_by, $order, $search, $status, $date)
    {   // Oct 01, 2021 09:58 PM
        $orders = $this::select('order_items.id', 'products.brand', 'products.net_price', 'products.name', 'orders.shipping_address',
            'users.first_name', 'users.last_name','products.vendor_id', 'order_items.quantity',
            'order_items.status as item_status', 'order_items.progress',
            DB::raw("DATE_FORMAT(orders.created_at, '%b %d, %Y %h:%i %p') AS 'ordered_at'"));

        if(strlen($search) > 1) {
            $orders = $orders->where(function ($orders) use($search) {
                $orders->where('users.first_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('users.last_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('products.name', 'LIKE', '%'.$search.'%')
                    ->orWhere('products.brand', 'LIKE', '%'.$search.'%')
                    ->orWhere('orders.shipping_address', 'LIKE', '%'.$search.'%')
                    ->orWhere('orders.notes', 'LIKE', '%'.$search.'%');
            });
        }

        if(strlen($status) > 1) {
            if($status == 'delivered') {
                $orders = $orders->where('order_items.progress', $status);
            } else {
                $orders = $orders->where('order_items.status', $status);
            }
        }

        if(strlen($date) > 1) {
            $orders = $orders->where('order_items.created_at', 'LIKE', '%'.$date.'%');
        }

        $orders = $orders->where('order_items.seller_id', $seller);

        $orders = $orders->join('order_items', 'order_items.order_id', '=', 'orders.id');
        $orders = $orders->join('products', 'products.id', '=', 'order_items.item_id');
        $orders = $orders->join('users', 'users.id', '=', 'orders.user_id');

        $orders = $orders->orderBy($order_by, $order)
            ->groupBy('order_items.id');
        // Each item is being considered a separate order as sites contain multiple vendors & a buyer is not
        // restricted to purchase from an specific vendor

        if(!empty($per_page)) {
            $orders = $orders->paginate($per_page);
        } else {
            $orders = $orders->take(25000)
                ->get();
        }
        return $orders;
    }
}
