<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItems;
use App\User;
use Illuminate\Support\Facades\DB;


class CartItemsController extends Controller {

    //
    public function updateCart(Request $request){
        $data = $request->all();
        $quantity = $data['quantity'];
        $cart_id = $data['cart_id'];
        $A_Cart = explode("_", $cart_id);
        $cart_id = $A_Cart[1];
        if($quantity>0){
            CartItems::find($cart_id)->update(['quantity'=>$quantity]);
        } else {
            CartItems::find($cart_id)->delete();
        }
        CartItems::find($cart_id)->update(['quantity'=>$quantity]);
        return response()->json(array(true));
    }
    public function addToCart(Request $request) {
        $data = $request->all();
        
        $product_id = $data['product_id'];
        $user_id = $data['user_id'];
        $quantity = $data['quantity'];
        
        $Exisitng = CartItems::where(['product_id'=>$product_id,'user_id'=>$user_id])->first();
        if($Exisitng){
            $data['quantity'] += $Exisitng->quantity;
            $model = CartItems::find($Exisitng->id)->update($data);
        } else {
            $model = CartItems::insert($data);
        }
        if ($model) {
            return Response()->json(array(
                        'success' => true,
                        //'message' => $data
                        'message' => User::where('id',$data["user_id"])->with('cartitems')->first()
            )); // 400 being the HTTP code for an invalid request.
        } else {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
            )); // 400 being the HTTP code for an invalid request.
        }
        //return response()->json($model);
    }
    public function removeCartData(Request $request){
        $data = $request->all();
        //return Response()->json($data);
        $Where = [];
        if(isset($data['cart_item_id'])){
            $Where=['user_id'=>$data['user_id'], 'id'=>$data['cart_item_id']];
        } else {
            $Where=['user_id'=>$data['user_id']];
        }
        $model = CartItems::where($Where)->delete();
        if ($model) {
            return Response()->json(array(
                        'success' => true
            )); // 400 being the HTTP code for an invalid request.
        } else {
            return Response()->json(array(
                        'success' => false
            )); // 400 being the HTTP code for an invalid request.
        }

    }
    public function updateShipping(Request $request){
        $data = $request->all();
        $result = \App\UserShipping::create($data);
        
        return response()->json(array('success'=>true));
    }
    public function userCartData(Request $request){
        $data = $request->all();
        $data = (array)$data;
        //$response = CartItems::where('user_id', $data['user_id'])->with('productsTable')->get();
        //$query = DB::table('tablethis')->where('user_id', $data['user_id'])->get();
        /*
         * select ci.*, pd.description,pd.name,pd.name,pd.net_price from cart_items as ci 
inner join products as pd on pd.id = ci.product_id 
where ci.user_id=1001
         */
        
        $qData = DB::table('cart_items as ci')
            ->join('products as pd', 'pd.id', '=', 'ci.product_id')
            ->select('ci.*', 'pd.description', 'pd.name','pd.net_price','pd.featured_image','pd.vendor_id')
                ->where('user_id',$data['user_id'])
            ->get();
        
//        $response = CartItems::where('user_id', $data['user_id'])->get();
        
        return response()->json($qData);
    }
}
