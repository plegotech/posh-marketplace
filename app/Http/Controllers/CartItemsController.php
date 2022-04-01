<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItems;
use App\User;

class CartItemsController extends Controller {

    //
    public function updateCart(Request $request){
        $data = $request->all();
        $quantity = $data['quantity'];
        $cart_id = $data['cart_id'];
        $A_Cart = explode("_", $cart_id);
        $cart_id = $A_Cart[1];
        CartItems::find($cart_id)->update(['quantity'=>$quantity]);
        return response()->json(array(true));
    }
    public function addToCart(Request $request) {
//        dd($request);
        $data = $request->all();
        
        //return response()->json($data);
        $model = CartItems::insert($request->all());
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

    public function userCartData(Request $request){
        $data = $request->all();
        //$response = CartItems::where('user_id', $data['user_id'])->with('productsTable')->get();
        
        return response()->json($data);
    }
}
