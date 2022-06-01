<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItems;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function fetchUserOrders(Request $request)
    {
        $data = $request->all();
//        return response()->json($data, 201);
        extract($request->all());
        
        if(!isset($user_id)){
             $user_id = '1020';
        }
        
        if(isset($order)){
            $ordertype = [$order];
        } else {
            $ordertype = ['pending','rejected','approved'];
        }
        
        $ReportData = DB::table("orders as o")
                ->join('order_items as oi','oi.order_id','=','o.id')
                ->where("o.user_id",$user_id)
                ->whereIn("oi.status",$ordertype)
                ->select(DB::raw("o.shipping_address, o.shipping_method, o.payment_method, oi.*"))
                ->orderBy("oi.id","desc")
                ->get();

        return response()->json($ReportData, 201);
    }
    public function fetchUserOrdersSummary($user_id)
    {
//        $data = Order::select('status',DB::raw('count(0) as c'))->where('user_id',$user_id)->groupBy('status')->get();
        

        $ReportData = DB::table("orders as o")
                ->join('order_items as oi','oi.order_id','=','o.id')
                ->where("o.user_id",$user_id)
                ->select(DB::raw("o.shipping_address, o.shipping_method, o.payment_method, oi.*"))
                ->get();
        
        $myAr = ['pending'=>0,'rejected'=>0,'approved'=>0];
        if($ReportData){
            foreach($ReportData as $row){
                $myAr[$row->status]+=$row->quantity;
            }
        }
        return response()->json($myAr, 201);
    }
    public function createOrder(Request $request){
        $data = $request->all();
//        return response()->json(["success"=>"true","data"=>"508"]);
//        return response()->json($data);
        $user_id = $data['user_id'];
        $CartData = \App\CartItems::where('user_id',$user_id)->get();
        $UserInfo = \App\User::where('id', $user_id)->first();
        $ShippingInfo = \App\UserShipping::where('user_id', $user_id)->orderBy('id','desc')->first();
        $orderItems = new OrderItems();
        $InsertArray = [
            'user_id'=>$user_id,
            'status'=>'pending',
            'shipping_address'=>$ShippingInfo ? ($ShippingInfo->address." ".$ShippingInfo->city." ".$ShippingInfo->state." ".$ShippingInfo->country) : $UserInfo->u_address,
            'shipping_method'=>'DHL',
            'payment_method'=>'COD',
            'notes'=>'Ok'
        ];
        $model = Order::create($InsertArray);
        if($CartData){
            foreach($CartData as $row){
                $seller = \App\SellerProduct::where('product_id', $row->product_id)->first();
                if($seller){
                    $seller_id = $seller->seller_id;
                } else {
                    $seller_id = 997;
                }
                $OrderItemsArray= [
                    'order_id'=>$model->id,
                    'item_id'=>$row->product_id,
                    'seller_id'=>$seller_id,
                    'quantity'=>$row->quantity,
                    'shipping_date'=>date("Y-m-d"),
                    'delivery_date'=>date("Y-m-d", strtotime("+2 days")),
                    'status'=>'pending',
                    'progress'=>'received',
                    'vendor_notes'=>'Vendor Notes here',
                    'buyer_notes'=>'Buyers Ok'
                ];
                OrderItems::create($OrderItemsArray);                
            }
            \App\CartItems::where('user_id', $user_id)->delete();
        }
        return response()->json(["success"=>"true","data"=>$model->id]);
    }
}
