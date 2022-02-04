<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItems;
use Illuminate\Support\Facades\DB;
use Validator;

use App\Companies;
use App\User;
use App\Exports\CompaniesExport;

class OrdersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($per_page)
    {
        $orderItems = new OrderItems();

        $orders = $orderItems->getAllOrders($per_page);

        return response()->json($orders, 201);
    }

    public function updateVendorOrderStatus($vendor, $order, $status)
    {
        $orderItems = new OrderItems();

        // Select All Products of the O
        $item_ids = $orderItems
            ->where('order_id', $order)
            ->where('vendor_id', $vendor)
            ->join('products', 'products.id', '=', 'order_items.item_id')
            ->pluck('products.id');

        if($item_ids) {
            foreach($item_ids as $key => $item) {
                $orderItems->where('item_id', $item)
                    ->update(['status' => $status]);
            }
        }

        return 'Order was updated successfully.';

    }

    public function getVendorOrderById($id)
    {
        $orders = new Order();

        $order = $orders->getVendorOrderById($id);

        return response()->json($order, 201);
    }

    public function fetchAllByVendor($vendor, $per_page = 25, $order_by = 'id', $order = 'desc', $search = 0, $status)
    {
        $orders = new Order();

        $orders = $orders->getOrdersByVendor($vendor, $per_page, $order_by, $order, $search, $status);

        return response()->json($orders, 201);
    }

    public function fetchAllBySeller($seller, $per_page = 25, $order_by = 'id', $order = 'desc', $search = 0, $status)
    {
        $orders = new Order();

        $orders = $orders->getOrdersBySeller($seller, $per_page, $order_by, $order, $search, $status);

        return response()->json($orders, 201);
    }
}
