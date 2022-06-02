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
    public function Shipping() {

        $rateRequest = new ComplexType\RateRequest();

//authentication & client details
        $rateRequest->WebAuthenticationDetail->UserCredential->Key = "R8CaN1lfhTz9cr34";
        $rateRequest->WebAuthenticationDetail->UserCredential->Password = "Raja@#123";
        $rateRequest->ClientDetail->AccountNumber = "510087160";
        $rateRequest->ClientDetail->MeterNumber = "119285961";

        $rateRequest->TransactionDetail->CustomerTransactionId = 'testing rate service request';

//version
        $rateRequest->Version->ServiceId = 'crs';
        $rateRequest->Version->Major = 24;
        $rateRequest->Version->Minor = 0;
        $rateRequest->Version->Intermediate = 0;

        $rateRequest->ReturnTransitAndCommit = true;

//shipper
        $rateRequest->RequestedShipment->PreferredCurrency = 'USD';
        $rateRequest->RequestedShipment->Shipper->Address->StreetLines = ['10 Fed Ex Pkwy'];
        $rateRequest->RequestedShipment->Shipper->Address->City = 'Memphis';
        $rateRequest->RequestedShipment->Shipper->Address->StateOrProvinceCode = 'TN';
        $rateRequest->RequestedShipment->Shipper->Address->PostalCode = 38115;
        $rateRequest->RequestedShipment->Shipper->Address->CountryCode = 'US';

//recipient
        $rateRequest->RequestedShipment->Recipient->Address->StreetLines = ['13450 Farmcrest Ct'];
        $rateRequest->RequestedShipment->Recipient->Address->City = 'Herndon';
        $rateRequest->RequestedShipment->Recipient->Address->StateOrProvinceCode = 'VA';
        $rateRequest->RequestedShipment->Recipient->Address->PostalCode = 20171;
        $rateRequest->RequestedShipment->Recipient->Address->CountryCode = 'US';

//shipping charges payment
        $rateRequest->RequestedShipment->ShippingChargesPayment->PaymentType = SimpleType\PaymentType::_SENDER;

//rate request types
        $rateRequest->RequestedShipment->RateRequestTypes = [SimpleType\RateRequestType::_PREFERRED, SimpleType\RateRequestType::_LIST];

        $rateRequest->RequestedShipment->PackageCount = 2;

//create package line items
        $rateRequest->RequestedShipment->RequestedPackageLineItems = [new ComplexType\RequestedPackageLineItem(), new ComplexType\RequestedPackageLineItem()];

//package 1
        $rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Weight->Value = 2;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Weight->Units = SimpleType\WeightUnits::_LB;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Length = 10;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Width = 10;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Height = 3;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[0]->Dimensions->Units = SimpleType\LinearUnits::_IN;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[0]->GroupPackageCount = 1;

//package 2
        $rateRequest->RequestedShipment->RequestedPackageLineItems[1]->Weight->Value = 5;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[1]->Weight->Units = SimpleType\WeightUnits::_LB;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[1]->Dimensions->Length = 20;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[1]->Dimensions->Width = 20;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[1]->Dimensions->Height = 10;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[1]->Dimensions->Units = SimpleType\LinearUnits::_IN;
        $rateRequest->RequestedShipment->RequestedPackageLineItems[1]->GroupPackageCount = 1;

        $rateServiceRequest = new Request();
//$rateServiceRequest->getSoapClient()->__setLocation(Request::PRODUCTION_URL); //use production URL

        $rateReply = $rateServiceRequest->getGetRatesReply($rateRequest); // send true as the 2nd argument to return the SoapClient's stdClass response.


        if (!empty($rateReply->RateReplyDetails)) {
            foreach ($rateReply->RateReplyDetails as $rateReplyDetail) {
                var_dump($rateReplyDetail->ServiceType);
                if (!empty($rateReplyDetail->RatedShipmentDetails)) {
                    foreach ($rateReplyDetail->RatedShipmentDetails as $ratedShipmentDetail) {
                        var_dump($ratedShipmentDetail->ShipmentRateDetail->RateType . ": " . $ratedShipmentDetail->ShipmentRateDetail->TotalNetCharge->Amount);
                    }
                }
                echo "<hr />";
            }
        }

        var_dump($rateReply);
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
//        return response()->json($data, 201);
        extract($request->all());

        if (!isset($user_id)) {
            $user_id = '1020';
        }

        if (isset($order)) {
            $ordertype = [$order];
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

        return response()->json($ReportData, 201);
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
            'payment_method' => 'COD',
            'tracking_id' => $data['tracking'],
            'shipping_charges' => $data['amount'],
            'currency' => $data['currency'],
            'notes' => 'Ok'
        ];
        $model = Order::create($InsertArray);
        if ($CartData) {
            foreach ($CartData as $row) {
                $seller = \App\SellerProduct::where('product_id', $row->product_id)->first();
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
