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
            ->where('user_type', 'seller')->pluck('pending_sellers');

        $pending_vendors = User::select(DB::raw('COUNT(id) as pending_vendors'))
            ->where('user_type', 'vendor')->pluck('pending_vendors');

        $return = array(
            'pending_sellers' => $pending_sellers[0],
            'pending_vendors' => $pending_vendors[0]
        );

        return response()->json($return);
    }
}
