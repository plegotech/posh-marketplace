<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class ProductController extends Controller
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

    public function fetch($user = 0, $order_by = 'id', $order = 'desc', $search = 0)
    {
        $products = new Product();

        if($user > 0) {
            $userClass = new User();
            $user_type = $userClass->getUserType($user);

            if($user_type == 'vendor') {
                $products = $products->where('vendor_id', $user);
            } else {
                $products = $products->join('seller_products', 'seller_products.product_id', '=', 'products.id')
                 ->where('seller_id', $user);
            }

        }

        $products = $products->where('status', 'active');

        if(strlen($search) > 0) {
            $products = $products->where('name', 'LIKE', '%'.$search.'%');
        }

        $products = $products->orderBy($order_by, $order)
//        ->toSql();
        ->paginate(18);

        return response()->json($products);
    }

    public function remove($product)
    {
        return Product::where('id', $product)
            ->update(['status' => 'deleted']);
    }
}
