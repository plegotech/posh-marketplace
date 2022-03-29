<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItems;
use App\User;

class CartItemsController extends Controller {

    //
    public function addToCart(Request $request) {
//        dd($request);
        $data = $request->all();
        $model = CartItems::insert($request->all());
        if ($model) {
            return Response()->json(array(
                        'success' => true,
                        //'message' => $data
                        'message' => User::where('id',$data->user_id)->with('cartitems')->first()
            )); // 400 being the HTTP code for an invalid request.
        } else {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
            )); // 400 being the HTTP code for an invalid request.
        }
        //return response()->json($model);
    }

}
