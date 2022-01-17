<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class VendorController extends Controller
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
            'password'          => 'required|confirmed|min:8|max:8'
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
}
