<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return 'silence is the gold';
    }

    public function updateUserInfo(Request $request) {
        $data = $request->params;
//        return Response()->json($data);
//        dd($data);
        $rules = array(
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400); // 400 being the HTTP code for an invalid request.
        } else {
            $return = User::find($data['user_id'])->update($data);
            if($return){
                $return = User::find($data['user_id'])->first();
            return Response()->json(array(
                        'success' => true,
                        'message' => $return
                            ), 200); // 400 being the HTTP code for an invalid request.            
            } else {
            return Response()->json(array(
                        'success' => false,
                        'message' => 0
                            ), 400); // 400 being the HTTP code for an invalid request.            
                
            }
            
        }
    }

    public function updateUserLoc(Request $request) {
        $rules = array(
            'u_address' => 'required',
            'u_city' => 'required',
            'u_zip' => 'required',
            'u_state' => 'required'
        );
        $data = $request->params;
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400); // 400 being the HTTP code for an invalid request.
        } else {
            $return = User::find($data['user_id'])->update($data);
            if($return){
                $return = User::find($data['user_id'])->first();
            return Response()->json(array(
                        'success' => true,
                        'message' => $return
                            ), 200); // 400 being the HTTP code for an invalid request.            
            } else {
            return Response()->json(array(
                        'success' => false,
                        'message' => 0
                            ), 400); // 400 being the HTTP code for an invalid request.            
                
            }
            
        }
    }

    public function updateUserPass(Request $request) {
        $rules = array(
            'password' => 'required',
        );
        $data = $request->params;
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400); // 400 being the HTTP code for an invalid request.
        } else {
            $data['password'] = Hash::make(strtolower($data['password']));
            $return = User::find($data['user_id'])->update($data);
            if($return){
                $return = User::find($data['user_id'])->first();
            return Response()->json(array(
                        'success' => true,
                        'message' => $return
                            ), 200); // 400 being the HTTP code for an invalid request.            
            } else {
            return Response()->json(array(
                        'success' => false,
                        'message' => 0
                            ), 400); // 400 being the HTTP code for an invalid request.            
                
            }
            
        }

    }

    public function login(Request $request) {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400); // 400 being the HTTP code for an invalid request.
        }

        $data = $request->all();

        if (Auth::attempt($request->only('email', 'password'))) {
//            return Response()->json(array(
//                'success' => true,
//                'message'=>"Logged In successfully",
//                'userdetail' => Auth::user()
//            ), 200);
            //dd(Auth::user());
            return Response()->json(array(
                        'success' => true,
                        'message' => "Logged In successfully",
                        'userdetail' => User::where('id', Auth::user()->id)->with('cartitems')->first()
                            ), 200);
        } else {
            return Response()->json(array(
                        'success' => false,
                        'message' => "Login Failed"
                            ), 200);
        }
        throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorect.']
        ]);
    }

    public function logout() {
        Auth::logout();
        return '0';
    }

    public function users($type = null, $perpage = 25, $order_by = 'id', $order = 'desc', $status = null, $search = 0) {
        $users = User::where('user_type', $type);

        if (!empty($status)) {
            $users = $users->where('status', $status);
        }

        if ($search != 0) {
            $users = $users->where('first', 'LIKE', $status);
        }

        if (strlen($search) > 1) {
            $users = $users->where(function ($users) use ($search) {
                $users->where('users.first_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('users.last_name', 'LIKE', '%' . $search . '%');
            });
        }

        $users = $users->orderBy($order_by, $order)
                ->paginate($perpage);

        return $users;
    }

    public function createUser(Request $request) {
        $data = $request->all();
        $rules = array(
            'email' => 'required|email|unique:users|max:255',
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'phone' => 'required|max:17'
        );

        if (isset($data['user']) && $data['user'] == "user") {
            $rules2 = array(
                'gender' => 'required',
                'u_address' => 'required',
                'u_city' => 'required',
                'u_state' => 'required',
                'u_zip' => 'required',
                'password' => 'required|confirmed|max:10'
            );
        }
        // Setup the validator

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400); // 400 being the HTTP code for an invalid request.
        }
        $data = $request->all();

        unset($data['_token']);
        unset($data['password_confirmation']);
        if (isset($data['password'])) {
            $data['password'] = Hash::make(strtolower($data['password']));
        }
        if (!empty($request->input('id'))) {
            User::where('id', $request->input('id'))
                    ->update($data);
        } else {
            User::create($data);
        }
        return Response()->json(array(
                    'success' => true,
                    'message' => 'User created successfully.'
                        ), 200);
    }

    public function vendor(Request $request) {
        // Setup the validator
        $rules = array(
            'email' => 'required|email|unique:users|max:255',
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required|max:17',
            'company' => 'required',
            'subscription_fee' => 'required',
            'password' => 'required|confirmed|max:6'
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400); // 400 being the HTTP code for an invalid request.
        }

        $user = array(
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'user_type' => 'vendor',
            'status' => 'pending',
            'password' => Hash::make($request->input('password')),
        );

        if (!empty($request->input('id'))) {
            User::where('id', $request->input('id'))
                    ->update($user);
        } else {
            $user = User::create($user);

            if ((int) $user->id > 0) {
                $company = array(
                    'name' => $request->input('company'),
                    'user_id' => $user->id,
                    'subscription_fee' => $request->input('subscription_fee'),
                    'address' => $request->input('address'),
                    'city' => $request->input('city'),
                    'state' => $request->input('state'),
                    'country' => 'United States'
                );

                $company = Companies::create($company);
            }
        }

        return response()->json(['success' => 'true', 'created' => $user->id, 'company' => $company->id]);
    }

    public function toggleActivation($user_id) {
        $status = User::where('id', $user_id)->pluck('status');

        if ($status[0] == 'pending') {
            $status = 'approved';
        } else {
            $status = 'pending';
        }

        User::where('id', $user_id)
                ->update(['status' => $status]);

        return response()->json(['message' => 'user status was updated successfully.']);
    }

    public function changeUserStatus($user_id, $status) {
        User::where('id', $user_id)
                ->update(['status' => $status]);

        return response()->json(['message' => 'user status was updated successfully.']);
    }

    public function userCompany($user) {
        return response()->json(User::select('users.*', 'companies.*', 'users.phone as user_phone')
                                ->where('users.id', $user)
                                ->join('companies', 'companies.user_id', '=', 'users.id')
                                ->first());
    }

    public function userProfile($user_id) {
        return response()->json(User::find($user_id));
    }

}
