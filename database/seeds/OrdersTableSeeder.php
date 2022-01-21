<?php

use App\Order;
use App\User;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends seeder
{
    public function run(): void
    {
        $user_ids = User::where('user_type', 'user')
            ->where('email', 'like', '%@yopmail.com%')
            ->get()->pluck('id');

        for($u = 0; $u < 500; $u++) {
            $user_id = $user_ids->random();

            $insert = [
                'status'                => 'pending',
                'shipping_address'      => 'Downtown DxB, UAE EA675',
                'shipping_method'       => 'DHL',
                'payment_method'        => 'COD',
                'notes'                 => '<h3>some description</h3><p>about the order is here.</p>',
                'user_id'               => $user_id
            ];

            Order::insert($insert);
        }
    }
}
