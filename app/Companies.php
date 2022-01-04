<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';
    protected   $primaryKey   = 'id';
    public      $timestamps   = false;

    public function getCompaniesByUserType($type, $perpage = null, $order_by = null, $order = null)
    {
        $companies = $this::select('companies.*', 'users.first_name', 'users.last_name', 'users.phone', 'users.email')
        ->where('users.user_type', $type)
        ->where('users.verified', 'yes')
        ->join('users', 'users.id', '=', 'companies.user_id');

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
