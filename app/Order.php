<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected   $table          = 'orders';
    protected   $primaryKey     = 'id';
    public      $timestamps     = false;

    protected $fillable = [
        'user_id', 'status', 'shipping_address', 'shipping_method', 'payment_methods',
        'notes', 'created_at', 'updated_at'
    ];


    public function getOrdersByVendor($vendor, $per_page, $order_by, $order, $search, $status)
    {   // Oct 01, 2021 09:58 PM
        $orders = $this::select('orders.*', 'users.first_name', 'users.last_name',
            DB::raw("DATE_FORMAT(orders.created_at, '%b %d, %Y %h:%i %p') AS 'ordered_at'"))
            ->where('users.status', $status);

        if(strlen($search) > 1) {
            $orders = $orders->where(function ($orders) use($search) {
                $orders->where('users.first_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('users.last_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('orders.shipping_address', 'LIKE', '%'.$search.'%')
                    ->orWhere('orders.notes', 'LIKE', '%'.$search.'%');
            });
        }

        if(strlen($status) > 1) {
            $orders = $orders->where('users.status', $status);
        } else {
            $orders = $orders->where('users.status', 'approved');
        }

        $orders = $orders->where('products.vendor_id', $vendor);

        $orders = $orders->join('order_items', 'order_items.order_id', '=', 'orders.id');
        $orders = $orders->join('products', 'products.id', '=', 'order_items.item_id');
        $orders = $orders->join('users', 'users.id', '=', 'orders.user_id');

        $orders = $orders->orderBy($order_by, $order)
            ->groupBy('orders.id');

        if(!empty($per_page)) {
            $orders = $orders->paginate($per_page);
        } else {
            $orders = $orders->take(25000)
                ->get();
        }
        return $orders;
    }
}
