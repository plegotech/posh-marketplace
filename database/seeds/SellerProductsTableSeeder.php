<?php

use App\Product;
use App\SellerProduct;
use App\User;

use Illuminate\Database\Seeder;

class SellerProductsTableSeeder extends seeder
{
    public function run(): void
    {
        $seller_ids = User::where('user_type', 'seller')
            ->where('email', 'like', '%@yopmail.com%')
            ->get()->pluck('id');

        $product_ids = Product::get()->pluck('id');

        for($u = 0; $u < 500; $u++) {

            $insert = [
                'seller_id'     => $seller_ids->random(),
                'product_id'    => $product_ids->random()
            ];

            SellerProduct::insert($insert);
        }
    }
}
