<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItems;
use Validator;

class OrdersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($per_page, $search = 0, $category = 0, $sub_category = 0)
    {
        $orderItems = new OrderItems();

        $orders = $orderItems->getAllOrders($per_page, $search, $category, $sub_category);

        return response()->json($orders, 201);
    }

    public function updateOrderStatus($vendor, $order, $status)
    {
        $orderItems = new OrderItems();

        $orderItems->where('id', $order)
            ->update(['status' => $status]);

        return 'Order was updated successfully.';
    }

    public function getVendorOrderById($id)
    {
        $orders = new Order();

        $order = $orders->getVendorOrderById($id);

        return response()->json($order, 201);
    }

    public function fetchAllByVendor($vendor = 0, $per_page = 25, $order_by = 'id', $order = 'desc', $search = 0, $status, $date = 0)
    {
        $orders = new Order();

        $orders = $orders->getOrdersByVendor($vendor, $per_page, $order_by, $order, $search, $status, $date);

        return response()->json($orders, 201);
    }

    public function fetchAllBySeller($seller = 0, $per_page = 25, $order_by = 'id', $order = 'desc', $search = 0, $status, $date = 0)
    {
        $orders = new Order();

        $orders = $orders->getOrdersBySeller($seller, $per_page, $order_by, $order, $search, $status, $date);

        return response()->json($orders, 201);
    }
}
