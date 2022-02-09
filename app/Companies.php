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
        'logo', 'name', 'user_id', 'subscription_fee', 'address', 'city', 'state', 'country', 'phone'
    ];

    private function grossAmount($type)
    {
        $sql = "(select COALESCE(sum(net_price * quantity), 0) from order_items";
        $sql .= " inner join products on products.id = order_items.item_id ";
        if($type == 'seller') {
            $sql .= " where seller_id = users.id and progress = 'delivered' and order_items.status = ";
        } else {
            $sql .= " where vendor_id = users.id and progress = 'delivered' and order_items.status = ";
        }
        $sql .= " 'approved' group by seller_id) as gross_total";

        return $sql;
    }

    public function getCompaniesByUserType($type, $perpage = null, $order_by = null, $order = null, $status = 0, $search = 0)
    {   // Oct 01, 2021 09:58 PM

        $sql = $this->grossAmount($type);

        $companies = $this::select('companies.*', 'users.first_name', 'users.last_name', 'users.phone AS user_phone'
            , 'users.email',
            DB::raw("DATE_FORMAT(users.last_login, '%b %d, %Y %h:%i %p') AS 'login_time'"),
            DB::raw("$sql")
        )
        ->where('users.user_type', $type);

        if(strlen($search) > 1) {
            $companies = $companies->where(function ($companies) use($search) {

                $search_items = explode(' ', $search);

                $companies->where('users.first_name', 'LIKE', '%'.$search.'%')
                        ->orWhere('users.last_name', 'LIKE', '%'.$search.'%')
                        ->orWhere('companies.name', 'LIKE', '%'.$search.'%');

                if(count($search_items) > 1) {
                    for($x = 1; $x < count($search_items); $x++) {
                        $companies->orWhere('users.first_name', 'LIKE', '%'.$search_items[$x].'%')
                            ->orWhere('users.last_name', 'LIKE', '%'.$search_items[$x].'%')
                            ->orWhere('companies.name', 'LIKE', '%'.$search_items[$x].'%');
                    }
                }
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
