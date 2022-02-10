<?php

use App\User;
use App\Order;
use App\Product;
use App\OrderItems;
use App\User;

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends seeder
{
    public function run(): void
    {
        $item_ids = Product::get()->pluck('id');
        $order_ids = Order::get()->pluck('id');

        $seller_ids = User::where('user_type', 'seller')
            ->where('email', 'like', '%@yopmail.com%')
            ->where('status', 'approved')
            ->get()->pluck('id');

        for($u = 0; $u < 500; $u++) {
            $item_id = $item_ids->random();
            $order_id = $order_ids->random();
            $seller_id = $seller_ids->random();

            $insert = [
                'seller_id'         => $seller_id,
                'order_id'          => $order_id,
                'item_id'           => $item_id,
                'quantity'          => rand(1, 5)
            ];

            OrderItems::insert($insert);
        }
    }
}
