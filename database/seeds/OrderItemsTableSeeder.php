<?php

use App\Order;
use App\Product;
use App\OrderItems;

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends seeder
{
    public function run(): void
    {
        $item_ids = Product::get()->pluck('id');
        $order_ids = Order::get()->pluck('id');

        for($u = 0; $u < 500; $u++) {
            $item_id = $item_ids->random();
            $order_id = $order_ids->random();

            $insert = [
                'order_id'          => $order_id,
                'item_id'           => $item_id,
                'quantity'          => rand(1, 5)
            ];

            OrderItems::insert($insert);
        }
    }
}
