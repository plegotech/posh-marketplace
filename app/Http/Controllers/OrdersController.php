<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItems;
use Validator;
use Illuminate\Http\Request as SRequest;
use Illuminate\Support\Facades\DB;
use FedEx\RateService\Request;
use FedEx\RateService\ComplexType;
use FedEx\RateService\SimpleType;

class OrdersController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function billinginfo(SRequest $request) {

        Order::where('vendor_id')->with("product")->get();
    }

    public function trackingdetails($user_id) {
        $data = Order::where(['user_id' => $user_id, 'status' => 'paid'])->orderBy('id', 'desc')->first();
//        $data = array("raja");
        return response()->json($data);
    }

    public function viewAdminOrder($orderId) {
//        dd($orderId);

        $orders = OrderItems::select('products.id as product_id', 
                        'product_categories.title',
                        'products.name as product_name', 'products.brand',
                        'products.net_price', 
                        'products.featured_image', 
                        'products.vendor_id',
                        'products.description',
                        'seller.first_name as seller_first_name',
                        'seller.last_name as seller_last_name',
                        'seller.phone as seller_phone',
                        'seller.email as seller_email',
                        'vendor.first_name as vendor_first_name',
                        'vendor.last_name as vendor_last_name',
                        'vendor.email as vendor_email',
                        'vendor.phone as vendor_phone',
                        DB::raw("DATE_FORMAT(order_items.created_at, '%b %d, %Y %h:%i %p') AS 'order_date'"),
                        'order_items.quantity', 
                        'order_items.progress',
                        DB::raw('SUM((products.net_price * order_items.quantity)) as total_sold'), 
                        'orders.shipping_address',
                        'order_items.id as order_item_id', 
                        'orders.id as order_id', 
                        'orders.user_id',
                        'customer.first_name as customer_first_name',
                        'customer.last_name as customer_last_name', 
                        'customer.email as customer_email', 
                        'customer.phone as customer_phone');

        $orders = $orders->join('products', 'products.id', '=', 'order_items.item_id')
                ->leftJoin('product_categories', function ($join) {
                    $join->on('product_categories.id', '=', 'products.sub_category');
                })
                ->join('orders', 'orders.id', '=', 'order_items.order_id')
                ->join('users AS customer', 'customer.id', '=', 'orders.user_id')
                ->join('users AS seller', 'seller.id', '=', 'order_items.seller_id')
                ->join('users AS vendor', 'vendor.id', '=', 'products.vendor_id')
                ->where('order_items.id', $orderId)
                ->first();
        return response()->json($orders, 201);
    }

    public function index($per_page, $search = 0, $category = 0, $sub_category = 0) {
        $orderItems = new OrderItems();

        $orders = $orderItems->getAllOrders($per_page, $search, $category, $sub_category);

        return response()->json($orders, 201);
    }

    public function updateOrderStatus($vendor, $order, $status) {
        $orderItems = new OrderItems();

        $orderItems->where('id', $order)
                ->update(['status' => $status]);

        return 'Order was updated successfully.';
    }

    public function getVendorOrderById($id) {
        $orders = new Order();

        $order = $orders->getVendorOrderById($id);

        return response()->json($order, 201);
    }

    public function fetchAllByVendor($vendor = 0, $per_page = 25, $order_by = 'id', $order = 'desc', $search = 0, $status, $date = 0) {
        $orders = new Order();

        $orders = $orders->getOrdersByVendor($vendor, $per_page, $order_by, $order, $search, $status, $date);

        return response()->json($orders, 201);
    }

    public function fetchAllBySeller($seller = 0, $per_page = 25, $order_by = 'id', $order = 'desc', $search = 0, $status, $date = 0) {
        $orders = new Order();

        $orders = $orders->getOrdersBySeller($seller, $per_page, $order_by, $order, $search, $status, $date);

        return response()->json($orders, 201);
    }

    public function fetchUserOrders(SRequest $request) {
        $data = $request->all();
//        return response()->json($data, 200);
//        extract($request->all());

        $user_id = $data['user_id'];
        //if (!isset($user_id)) {
        //  $user_id = '1020';
        //}

        if (array_key_exists('order', $data) && $data['order']) {
            $ordertype = [$data['order']];
        } else {
            $ordertype = ['pending', 'rejected', 'approved'];
        }

        $ReportData = DB::table("orders as o")
                ->join('order_items as oi', 'oi.order_id', '=', 'o.id')
                ->where("o.user_id", $user_id)
                ->whereIn("oi.status", $ordertype)
                ->select(DB::raw("o.shipping_address, o.shipping_method, o.payment_method, oi.*"))
                ->orderBy("oi.id", "desc")
                ->get();

        return response()->json($ReportData, 200);
    }

    public function fetchUserOrdersSummary($user_id) {
//        $data = Order::select('status',DB::raw('count(0) as c'))->where('user_id',$user_id)->groupBy('status')->get();


        $ReportData = DB::table("orders as o")
                ->join('order_items as oi', 'oi.order_id', '=', 'o.id')
                ->where("o.user_id", $user_id)
                ->select(DB::raw("o.shipping_address, o.shipping_method, o.payment_method, oi.*"))
                ->get();

        $myAr = ['pending' => 0, 'rejected' => 0, 'approved' => 0];
        if ($ReportData) {
            foreach ($ReportData as $row) {
                $myAr[$row->status] += $row->quantity;
            }
        }
        return response()->json($myAr, 201);
    }

    public function createOrder(SRequest $request) {
        $data = $request->all();
//        return response()->json(["success"=>"true","data"=>"508"]);
//        return response()->json($data);
        $user_id = $data['user_id'];
        $CartData = \App\CartItems::where('user_id', $user_id)->get();
        $UserInfo = \App\User::where('id', $user_id)->first();
        $ShippingInfo = \App\UserShipping::where('user_id', $user_id)->orderBy('id', 'desc')->first();
        $orderItems = new OrderItems();
        $InsertArray = [
            'user_id' => $user_id,
            'status' => 'pending',
            'shipping_address' => $ShippingInfo ? ($ShippingInfo->address . " " . $ShippingInfo->city . " " . $ShippingInfo->state . " " . $ShippingInfo->country) : $UserInfo->u_address,
            'shipping_method' => 'FEDEX',
            'payment_method' => 'PAYPAL',
            'tracking_id' => $data['tracking'],
            'shipping_charges' => $data['amount'],
            'currency' => $data['currency'],
            'notes' => 'Ok'
        ];
        $model = Order::create($InsertArray);
        if ($CartData) {
            foreach ($CartData as $row) {
                $seller = \App\SellerProduct::where('product_id', $row->product_id)->first();
                $product_info = \App\Product::where('id',$row->product_id)->first();
                if ($seller) {
                    $seller_id = $seller->seller_id;
                } else {
                    $seller_id = 997;
                }
                $OrderItemsArray = [
                    'order_id' => $model->id,
                    'item_id' => $row->product_id,
                    'seller_id' => $seller_id,
                    'quantity' => $row->quantity,
                    'net_price' => $product_info->net_price,
                    'seller_price' => $product_info->seller_price,
                    'shipping_date' => date("Y-m-d"),
                    'delivery_date' => date("Y-m-d", strtotime("+2 days")),
                    'status' => 'pending',
                    'progress' => 'received',
                    'vendor_notes' => 'Vendor Notes here',
                    'buyer_notes' => 'Buyers Ok'
                ];
                OrderItems::create($OrderItemsArray);
            }
            \App\CartItems::where('user_id', $user_id)->delete();
        }
        return response()->json(["success" => "true", "data" => $model->id]);
    }

}
