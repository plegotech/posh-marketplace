<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Companies extends Model
{
    protected   $table          = 'companies';
    protected   $primaryKey     = 'id';
    public      $timestamps     = true;

    protected $fillable = [
        'logo', 'name', 'user_id', 'subscription_fee', 'address', 'city', 'state', 'country'
    ];

    public function getCompaniesByUserType($type, $perpage = null, $order_by = null, $order = null, $status = 0, $search = 0)
    {   // Oct 01, 2021 09:58 PM
        $companies = $this::select('companies.*', 'users.first_name', 'users.last_name', 'users.phone'
            , 'users.email',
            DB::raw("DATE_FORMAT(users.last_login, '%b %d, %Y %h:%i %p') AS 'login_time'")
        )
        ->where('users.user_type', $type);

        if(strlen($search) > 1) {
            $companies = $companies->where(function ($companies) use($search) {
            $companies->where('users.first_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('users.last_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('companies.name', 'LIKE', '%'.$search.'%');
            });
        }

        if(strlen($status) > 1) {
            $companies = $companies->where('users.status', $status);
        } else {
            $companies = $companies->where('users.status', 'approved');
        }

        $companies = $companies->join('users', 'users.id', '=', 'companies.user_id');

        if(!empty($perpage)) {
            $companies = $companies->orderBy($order_by, $order)
                ->paginate($perpage);
        } else {
            $companies = $companies->orderBy('id', 'desc')
                ->take(25000)
                ->get();
        }
        return $companies;
    }
}
