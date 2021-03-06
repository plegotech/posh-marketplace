<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

use App\Companies;
use App\User;
use App\Exports\CompaniesExport;

class CompaniesController extends Controller
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

    public function companies($type, $perpage = 25, $order_by = 'id', $order = 'desc', $status = 0, $search = 0)
    {
        $companies = new Companies();
        $companies = $companies->getCompaniesByUserType($type, $perpage, $order_by, $order, $status, $search);

        return response()->json($companies);
    }

    public function updateCompany(Request $request)
    {
        // Setup the validator
        $rules = array(
//            'email'     => 'required|email|max:255|unique:users,email,'.$request->input('user_id'),
            'name'      => 'required',
            'phone'     => 'digits:10',
            'zip_code'  => 'required',
            'address'   => 'required',
            'city'      => 'required',
            'state'     => 'required',
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

        $company = array();
        $company['zip_code']            = $request->input('zip_code');
        $company['name']                = $request->input('name');
        $company['phone']               = $request->input('phone');
        $company['address']             = $request->input('address');
        $company['city']                = $request->input('city');
        $company['state']               = $request->input('state');

        Companies::where('id', $request->input('id'))
            ->update($company);

        return response()->json(['message' => 'company was updated successfully.']);
    }

    public function createCompany(Request $request)
    {
        if(!empty($request->input('id'))) {

            // Setup the validator
            $rules = array(
                'email'     => 'required|email|max:255|unique:users,email,'.$request->input('user_id'),
                'name'      => 'required',
                'phone'     => 'digits:10',
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

            $user = array();
            $user['first_name']     = $request->input('first_name');
            $user['last_name']      = $request->input('last_name');
            $user['phone']          = $request->input('phone');
            $user['email']          = $request->input('email');

            $company = array();
            $company['logo']                = $request->input('logo');
            $company['name']                = $request->input('name');
            $company['subscription_fee']    = $request->input('subscription_fee');
            $company['address']             = $request->input('address');
            $company['city']                = $request->input('city');
            $company['state']               = $request->input('state');
            $company['country']             = $request->input('country');

            User::where('id', $request->input('user_id'))
                ->update($user);

            Companies::where('id', $request->input('id'))
                ->update($company);
        } else {
            //This part is not functional
            Companies::create($request->all());
        }
        return response()->json(['success' => true, 'message' => 'company was updated successfully.']);
    }

    public function toggleActivation($company_id)
    {
        $status = Companies::where('id', $company_id)->pluck('status');

        if($status[0] == 'approved') {
            $status = 'pending';
        } else if($status[0] == 'pending') {
            $status = 'approved';
        }

        Companies::where('id', $company_id)
            ->update(['status' => $status]);

        return response()->json(['message' => 'company status was updated successfully.']);
    }

    public function exportCompanies($type)
    {
        return Excel::download(new CompaniesExport, $type. '-companies.xlsx');
    }

    public function getCompanyByUserId($id)
    {
        return response()->json(Companies::where('user_id', $id)
            ->first());
    }
}
