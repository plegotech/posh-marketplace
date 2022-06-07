<?php

namespace App\Http\Controllers;

use App\OrderItems;
use App\User;
use App\Product;
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
    public function getPaymentDetails() {
        $products = OrderItems::select('products.net_price','products.seller_price','orders.*', DB::raw('concat(seller.first_name," ",seller.last_name) as "seller_name", concat(vendor.first_name," ",vendor.last_name) as "vendor_name" '))
                ->join('products', 'products.id', '=', 'order_items.item_id')
                ->join('orders', 'orders.id', '=', 'order_items.order_id')
                ->join('users as seller', 'seller.id', '=', 'order_items.seller_id')
                ->join('users as vendor', 'vendor.id', '=', 'products.vendor_id')
                ->groupBy('order_items.item_id')->paginate(20);
        return response()->json($products);
        
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

    private function topSellers()
    {
        $orderItems = new OrderItems();

        $sellers = $orderItems->select('users.id', 'users.first_name', 'users.last_name',
            DB::raw('SUM((products.net_price * order_items.quantity)) as total_sold'))
            ->join('users', 'users.id', '=', 'order_items.seller_id')
            ->join('products', 'products.id', '=', 'order_items.item_id');

        $sellers_by_year = $sellers->where('order_items.created_at', 'LIKE', '%'. date('Y') .'%')
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->groupBy('users.id')
            ->get()->toArray();

        $sellers_by_month = $sellers->where('order_items.created_at', 'LIKE', '%'. date('Y-m') .'%')
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->groupBy('users.id')
            ->get()->toArray();

        $current_quarter = ceil(date('n') / 3);

        $sellers_by_quarter = $sellers->whereDate('order_items.created_at', '>=', date('Y-m-d 00:00:00', strtotime(date('Y') . '-' . (($current_quarter * 3) - 2) . '-1')))
            ->whereDate('order_items.created_at', '<=', date('Y-m-t 23:59:59', strtotime(date('Y') . '-' . (($current_quarter * 3)) . '-1')))
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->groupBy('users.id')
            ->get()->toArray();

        return array(
            'sellers_by_year'           => $sellers_by_year,
            'sellers_by_month'          => $sellers_by_month,
            'sellers_by_quarter'        => $sellers_by_quarter
        );
    }

    private function topProducts()
    {
        $orderItems = new OrderItems();
        return $orderItems->select(DB::raw('SUM((products.net_price * order_items.quantity)) as total_sold'),
            'products.id', 'products.name', 'companies.name as company', 'products.brand', 'products.featured_image',
            'companies.user_id')
            ->join('products', 'products.id', '=', 'order_items.item_id')
            ->join('companies', 'companies.user_id', '=', 'products.vendor_id')
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->groupBy('products.id')
            ->get()->toArray();
    }

    private function salesByCategory()
    {
        $orderItems = new OrderItems();

        $orders = $orderItems->select(DB::RAW('COUNT(*) AS order_quanities'), 'products.parent_category',
            'products.sub_category', DB::RAW('SUM((products.net_price * order_items.quantity)) as total_sold'),
            'order_items.created_at')
            ->join('products', 'products.id', '=', 'order_items.id');

        $orders_by_year = $orders->where('order_items.created_at', 'LIKE', '%'. date('Y') .'%')
            ->orderBy('order_quanities', 'desc')
            ->limit(10)
            ->groupBy('products.sub_category')
            ->get()->toArray();

        $orders_by_month = $orders->where('order_items.created_at', 'LIKE', '%'. date('Y-m') .'%')
            ->orderBy('order_quanities', 'desc')
            ->limit(10)
            ->groupBy('products.sub_category')
            ->get()->toArray();

        $current_quarter = ceil(date('n') / 3);

        $orders_by_quarter = $orders->whereDate('order_items.created_at', '>=', date('Y-m-d 00:00:00', strtotime(date('Y') . '-' . (($current_quarter * 3) - 2) . '-1')))
            ->whereDate('order_items.created_at', '<=', date('Y-m-t 23:59:59', strtotime(date('Y') . '-' . (($current_quarter * 3)) . '-1')))
            ->orderBy('order_quanities', 'desc')
            ->limit(10)
            ->groupBy('products.sub_category')
            ->get()->toArray();

        return array(
            'orders_by_year'        => $orders_by_year,
            'orders_by_month'       => $orders_by_month,
            'orders_by_quarter'     => $orders_by_quarter
        );
    }

    private function filterDates($time_period = 0, $first_date = '0', $last_date = '0')
    {
        //2022-02-16 01:12:51 : Format 16th Feb
        if($first_date == '0' AND $last_date == '0') {
            switch ($time_period) {
                case 'year':
                    $first_date = date('Y-01-01 00:00:00');
                    $last_date = date('Y-12-31 23:59:59');
                    break;
                case 'quarter':
                    $current_quarter = ceil(date('n') / 3);
                    $first_date = date('Y-m-d 00:00:00', strtotime(date('Y') . '-' . (($current_quarter * 3) - 2) . '-1'));
                    $last_date = date('Y-m-t 23:59:59', strtotime(date('Y') . '-' . (($current_quarter * 3)) . '-1'));
                    break;
                case 'month':
                    $first_date = date('Y-m-01 00:00:00');
                    $last_date = date('Y-m-31 23:59:59');
                    break;
                default:
                    $first_date     = NULL;
                    $last_date      = NULL;
                    break;
            }
        } else {
            if($first_date != '0') {
                $first_date = date('Y-m-d 00:00:00', strtotime(substr($first_date, 0, 24)));
            }
            if($last_date != '0') {
                $last_date = date('Y-m-d 23:59:59', strtotime(substr($last_date, 0, 24)));
            }
        }

        return array(
            'first_date'    => $first_date,
            'last_date'     => $last_date
        );
    }

    public function basicStatistics($time_period = 0, $first_date = '0', $last_date = '0')
    {
        $dates      = $this->filterDates($time_period, $first_date, $last_date);

        $first_date = $dates['first_date'];
        $last_date  = $dates['last_date'];

        //total gross sales remaining
        //total net sales remaining

        $sales = OrderItems::select(DB::raw('(SUM(`products`.`net_price` * `order_items`.`quantity`)) as gross_sales'))
            ->join('products', 'products.id', '=', 'order_items.item_id');

        $date_range = '';
        if(!empty($first_date) AND $first_date != 0) {
            $date_range .= ' AND created_at >= "'.$first_date.'"';
            $sales = $sales->whereDate('order_items.created_at', '>=', $first_date);
        }

        if(!empty($last_date) AND $last_date != 0) {
            $date_range .= ' AND created_at < "'.$last_date.'"';
            $sales = $sales->whereDate('order_items.created_at', '<=', $last_date);
        }

        $sales = $sales->pluck('gross_sales');

        $gross_sales = (int) $sales[0];

        $users = User::select(
            DB::raw('(select count(*) from order_items where status = "approved" '.$date_range.')
             as total_orders'),
            DB::raw('(select count(*) from users where user_type = "vendor" and status = "pending" '.$date_range.')
             as vendor_request'),
            DB::raw('(select count(*) from users where user_type = "seller" and status = "pending" '.$date_range.')
             as seller_request'),
            DB::raw('(select count(*) from users where user_type = "vendor" and status = "approved" '.$date_range.')
             as total_vendors'),
            DB::raw('(select count(*) from users where user_type = "seller" and status = "approved" '.$date_range.')
             as total_sellers'),
            DB::raw('(select count(*) from users where user_type = "user" '.$date_range.') as total_users')
        )->first()->toArray();

        $data = $users;
        $data['gross_sales'] = $gross_sales;

        $data = array_merge($data, $this->salesByCategory());
        $data = array_merge($data, $this->topSellers());
        $data = array_merge($data, array('top_products' => $this->topProducts()));

        return response()->json($data);
    }

    public function userStatistics($time_period = 0, $first_date = 0, $last_date = 0)
    {
        $dates      = $this->filterDates($time_period, $first_date, $last_date);

        $first_date = $dates['first_date'];
        $last_date  = $dates['last_date'];

        $date_range = '';
        if(!empty($first_date) AND $first_date != 0) {
            $date_range .= ' AND created_at >= "'.$first_date.'"';
        }

        if(!empty($last_date) AND $last_date != 0) {
            $date_range .= ' AND created_at < "'.$last_date.'"';
        }

        $statistics = Product::select(DB::raw('(select count(*) from products where status = "active" '.$date_range.') as active_products'),
            DB::raw('(select count(*) from products where status = "archived" '.$date_range.') as archive_products'),
            DB::raw('(select count(*) from order_items where progress = "delivered" AND status = "approved" '.$date_range.') as purchased_orders'),
            DB::raw('(select count(*) from order_items where status = "rejected" '.$date_range.') as cancelled_orders'),
            DB::raw('(SUM(`products`.`net_price` * `order_items`.`quantity`)) as gross_sales'))

            ->where('order_items.progress', 'delivered');

        if(!empty($first_date) AND $first_date != 0) {
            $statistics = $statistics->whereDate('order_items.created_at', '>=', $first_date);
        }

        if(!empty($last_date) AND $last_date != 0) {
            $statistics = $statistics->whereDate('order_items.created_at', '<=', $last_date);
        }

        return $statistics->join('order_items', 'products.id', '=', 'order_items.item_id')
            ->first()->toArray();
    }

}
