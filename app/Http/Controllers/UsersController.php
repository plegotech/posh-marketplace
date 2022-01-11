<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only('email', 'password'))){
            return response()->json(Auth::user(), 200);
        }
        throw ValidationException::withMessages([
            'email' =>['The provided credentials are incorect.']
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return '0';
    }

    public function users($type = null, $perpage = 25, $order_by = 'id', $order = 'desc', $status = null)
    {
        $users = User::where('user_type', $type);

        if (!empty($status)) {
            $users = $users->where('status', $status);
        }

        $users = $users->orderBy($order_by, $order)
            ->paginate($perpage);

        return $users;
    }

    public function createUser(Request $request)
    {
        // Setup the validator
        $rules = array(
            'email'         => 'required|email|unique:users|max:255',
            'first_name'    => 'required',
            'last_name'     => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }

        if(!empty($request->input('id'))) {
            User::where('id', $request->input('id'))
                ->update($request->all());
        } else {
            User::create($request->all());
        }
        return response()->json(['message' => 'user was updated successfully.']);
    }

    public function vendor(Request $request)
    {
        // Setup the validator
        $rules = array(
            'email'             => 'required|email|unique:users|max:255',
            'first_name'        => 'required|min:3|max:50',
            'last_name'         => 'required|min:3|max:50',
            'address'           => 'required',
            'city'              => 'required',
            'state'             => 'required',
            'phone'             => 'required|max:17',
            'company'           => 'required',
            'subscription_fee'  => 'required',
            'password'          => 'required|confirmed|max:6'
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }

        $user = array(
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email'),
            'phone'         => $request->input('phone'),
            'user_type'     => 'vendor',
            'status'        => 'pending',
            'password'      => Hash::make($request->input('password')),
        );

        if(!empty($request->input('id'))) {
            User::where('id', $request->input('id'))
                ->update($user);
        } else {
            $user = User::create($user);

            if((int) $user->id > 0) {
                $company = array(
                    'name'                  => $request->input('company'),
                    'user_id'               => $user->id,
                    'subscription_fee'      => $request->input('subscription_fee'),
                    'address'               => $request->input('address'),
                    'city'                  => $request->input('city'),
                    'state'                 => $request->input('state'),
                    'country'               => 'United States'
                );

                $company = Companies::create($company);
            }
        }

        return response()->json(['success' => 'true', 'created' => $user->id, 'company' => $company->id]);
    }

    public function toggleActivation($user_id)
    {
        $status = User::where('id', $user_id)->pluck('status');

        if($status[0] == 'pending') {
            $status = 'approved';
        } else {
            $status = 'pending';
        }

        User::where('id', $user_id)
            ->update(['status' => $status]);

        return response()->json(['message' => 'user status was updated successfully.']);
    }

    public function changeUserStatus($user_id, $status)
    {
        User::where('id', $user_id)
            ->update(['status' => $status]);

        return response()->json(['message' => 'user status was updated successfully.']);
    }
}
