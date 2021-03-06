<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller {

    public function createpaypal() {
        return view('paypal_view');
    }

    public function processPaypal(Request $request) {
        $data = $request->all();
//        return response()->json($request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('processSuccess'),
                "cancel_url" => route('processCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $data['price']
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {

                if ($links['rel'] == 'approve') {
                    return response()->json(array("status" => 1, "message" => $links['href']));
//                    return redirect()->away($links['href']);
                }
            }
            return response()->json(array("status" => 2, "message" => "Something went wrong"));
//            return redirect()
//                            ->route('createpaypal')
//                            ->with('error', 'Something went wrong.');
        } else {
            return response()->json(array("status" => 2, "message" => "Something went wrong"));
//            return redirect()
//                            ->route('createpaypal')
//                            ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function processSuccess(Request $request) {

//        return response()->json($request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order = \App\Order::orderBy('id', 'desc')->limit(1)->first();
            if ($order) {
                $order_id = $order->id;
                \App\Order::find($order_id)->update(['status' => 'paid']);
            }
            header("Location: https://posh-temp1.plego.pro/success"); exit;
            //return "<h1>Payment Successful</h1>";
            //return response()->json(array("success" => true, "message" => "Transaction complete"));
//            return redirect()
//                            ->route('createpaypal')
//                            ->with('success', 'Transaction complete.');
        } else {
            return response()->json(array("success" => false, "message" => "Something went wrong"));
//            return redirect()
//                            ->route('createpaypal')
//                            ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function processCancel(Request $request) {
        return response()->json(array("success" => false, "message" => "You have canceled the transaction."));
//        return redirect()
//                        ->route('createpaypal')
//                        ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

}
