<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
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

    public function users(Request $request, $type = null, $perpage = 25, $order_by = 'id', $order = 'desc')
    {
        return User::where('user_type', $type)
            ->orderBy($order_by, $order)
            ->paginate($perpage);
    }

    public function createUser(Request $request)
    {
        if(!empty($request->input('id'))) {
            User::where('id', $request->input('id'))
                ->update($request->all());
        } else {
            User::create($request->all());
        }
        return response()->json(['message' => 'user was updated successfully.']);
    }

    public function toggleActivation($user_id)
    {
        $status = User::where('id', $user_id)->pluck('verified');

        if($status[0] == 'yes') {
            $status = 'no';
        } else {
            $status = 'yes';
        }

        User::where('id', $user_id)
            ->update(['verified' => $status]);

        return response()->json(['message' => 'user status was updated successfully.']);
    }
}
