<?php

namespace App\Http\Controllers;

use App\Companies;
use App\OrderItems;
use Illuminate\Http\Request;
use App\User;
use App\SellerWebsite;
use App\SellerProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class SellerController extends Controller
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

    private function runSignupStepOne($request)
    {
        $user = array(
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email'),
            'phone'         => $request->input('phone'),
            'user_type'     => 'seller',
            'status'        => 'pending',
            'gender'        => $request->input('gender'),
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
                    'licence'               => $request->input('licence'),
                    'ein_number'            => $request->input('ein_number'),
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

    public function seller(Request $request, $step)
    {
        if($step == 0) {
            // Setup the validator
            $rules = array(
                'email'             => 'required|email|unique:users|max:255',
                'first_name'        => 'required|min:3|max:50',
                'last_name'         => 'required|min:3|max:50',
                'address'           => 'required',
                'city'              => 'required',
                'state'             => 'required',
                'gender'            => 'required',
                'phone'             => 'required|max:17',
                'company'           => 'required',
                'licence'           => 'required',
                'ein_number'        => 'required',
                'password'          => 'required|confirmed|max:6'
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
            return $this->runSignupStepOne($request);
        } else {

        }
    }

    public function website($seller)
    {
        return SellerWebsite::where('seller_id', $seller)
            ->first();
    }

    public function soldStatistics($seller_id, $order_by = 'id', $order = 'desc',
                                   $month = 0, $year = 0, $per_page = 5)
    {
        $products = OrderItems::select('products.id', 'order_items.item_id', 'products.name', 'products.parent_category',
            'products.sub_category', 'products.net_price',
            DB::raw('SUM(`order_items`.`quantity`) as sold'))
            ->where('order_items.seller_id', $seller_id)
            ->where('order_items.progress', 'delivered')
            ->join('products', 'products.id', '=', 'order_items.item_id')
            ->orderBy($order_by, $order)
            ->groupBy('order_items.item_id')
            ->paginate($per_page);

        $statistics = array();

        return response()->json(array(
            'products' => $products,
            'statistic' => $statistics
        ));
    }

    public function sellerProduct(Request $request)
    {
        $count = SellerProduct::where('seller_id', $request->input('seller_id'))
            ->where('product_id', $request->input('product_id'))
            ->count();

        if($count) {
            SellerProduct::where('seller_id', $request->input('seller_id'))
                ->where('product_id', $request->input('product_id'))
                ->delete();

            return response()->json(array('status' => 'deleted'));
        } else {
            SellerProduct::create(array(
                'seller_id' => $request->input('seller_id'),
                'product_id' => $request->input('product_id')
            ));

            return response()->json(array('status' => 'created'));
        }
    }
}
