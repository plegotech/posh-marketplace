<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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

    public function adminData()
    {
        $pending_sellers = User::select(DB::raw('COUNT(id) as pending_sellers'))
            ->where('user_type', 'seller')
            ->where('status', 'pending')
            ->pluck('pending_sellers');

        $pending_vendors = User::select(DB::raw('COUNT(id) as pending_vendors'))
            ->where('user_type', 'vendor')
            ->where('status', 'pending')
            ->pluck('pending_vendors');

        $return = array(
            'pending_sellers' => $pending_sellers[0],
            'pending_vendors' => $pending_vendors[0]
        );

        return response()->json($return);
    }

    public function basiStatistics()
    {
        //total gross sales
        //total net sales

        $users = User::select(
            DB::raw('(select count(*) from order_items where status = "approved") as total_orders'),
            DB::raw('(select count(*) from users where user_type = "vendor" and status = "pending") as vendor_request'),
            DB::raw('(select count(*) from users where user_type = "seller" and status = "pending") as seller_request'),
            DB::raw('(select count(*) from users where user_type = "vendor" and status = "approved") as total_vendors'),
            DB::raw('(select count(*) from users where user_type = "seller" and status = "approved") as total_sellers'),
            DB::raw('(select count(*) from users where user_type = "user") as total_users')
        )->first()->toArray();

        dd($users);

    }

}
