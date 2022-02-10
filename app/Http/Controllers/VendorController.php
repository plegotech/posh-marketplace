<?php

namespace App\Http\Controllers;

use App\Companies;
use App\OrderItems;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class VendorController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return 'silence is the gold';
    }

    public function dashboard($id)
    {
        $sql = "SELECT COUNT(*) FROM order_items inner join products on products.id = order_items.item_id";
        $sql .= " where products.vendor_id = '$id' AND ";
        $stats =OrderItems::select(DB::raw('('.$sql.' order_items.status = "approved" AND order_items.progress != "delivered") as total_orders'),
            DB::raw('('.$sql.' order_items.status = "pending") as pending_orders'),
            DB::raw('('.$sql.' order_items.status = "rejected") as cancelled_orders'),
            DB::raw('('.$sql.' order_items.progress = "delivered") as successful_orders')
        )
            ->first()->toArray();

        $orders = OrderItems::select('order_items.id', 'products.name', DB::raw("DATE_FORMAT(orders.created_at, '%b %d, %Y %h:%i %p') AS 'ordered_at'"),
            'order_items.quantity', 'products.net_price', 'order_items.progress', 'orders.shipping_address'
            , 'orders.shipping_method', 'orders.payment_method', DB::raw('SUM((products.net_price * order_items.quantity)) as total_sold'))
            ->where('products.vendor_id', $id)
            ->join('products', 'products.id', '=', 'order_items.item_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->orderBy('order_items.id', 'desc')
            ->limit(10)
            ->get()
            ->toArray();

        $stats['orders'] = $orders;

        return response()->json($stats);
    }

    public function vendor(Request $request)
    {
        // Setup the validator
        $rules = array(
            'email'             => 'required|email|unique:users|max:255',
            'first_name'        => 'required|min:3|max:50',
            'last_name'         => 'required|min:3|max:50',
            'address'           => 'required',
            'gender'            => 'required|min:3|max:7',
            'city'              => 'required',
            'state'             => 'required',
            'phone'             => 'required|max:17',
            'company'           => 'required',
            'password'          => 'required|confirmed'
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }

        $user = array(
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email'),
            'phone'         => $request->input('phone'),
            'gender'        => $request->input('gender'),
            'user_type'     => 'vendor',
            'status'        => 'pending',
            'password'      => Hash::make($request->input('password')),
        );

        if(!empty($request->input('id'))) {
            User::where('id', $request->input('id'))
                ->update($user);
        } else {
            $user = User::create($user);

            if((int) $user->id > 0) {
                $company = array(
                    'name'                  => $request->input('company'),
                    'user_id'               => $user->id,
                    'subscription_fee'      => 0,
                    'address'               => $request->input('address'),
                    'city'                  => $request->input('city'),
                    'state'                 => $request->input('state'),
                    'country'               => 'United States'
                );

                $company = Companies::create($company);
            }
        }

        return response()->json(['success' => 'true', 'created' => $user->id, 'company' => $company->id]);
    }
}
