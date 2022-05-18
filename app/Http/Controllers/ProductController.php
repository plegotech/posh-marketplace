<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class ProductController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return 'silence is the gold';
    }

    public function fetchall(Request $request) {
        extract($request->all());
        $filter = json_decode($filter);
        $filterdata = array();
        if ($filter) {
            foreach ($filter as $key => $val) {
                if ($val)
                    $filterdata[$key] = $val;
            }
        }
        //print_r($filterdata);
        $products = new Product();
        if (isset($filterdata) && $filterdata && $filterdata != 0) {
            $products = $products->leftJoin('products_meta', 'products_meta.product_id', '=', 'products.id');
            foreach ($filterdata as $field => $value) {
                $products = $products->where('products_meta.field', '=', $field, 'or');
                $products = $products->whereIn('products_meta.value', $value, 'and');
            }
            $products = $products->groupBy("products_meta.product_id");
        }

        if (isset($user) && $user > 0) {
            $userClass = new User();
            $user_type = $userClass->getUserType($user);

            if ($user_type == 'vendor') {
                $products = $products->where('vendor_id', $user);
            } else {
                $products = $products->join('seller_products', 'seller_products.product_id', '=', 'products.id')
                        ->where('seller_id', $user);
            }
        }
        if (!isset($order)) {
            $order = "desc";
        }
        if (!isset($order_by)) {
            $order_by = "products.id";
        }
        if (isset($brand) && $brand != "0") {
            $brand = explode(",", $brand);
            $products = $products->whereIn('brand', $brand);
        }
        if (isset($min_price) && $min_price != 0) {
            $products = $products->where('net_price', '>=', $min_price);
        }
        if (isset($max_price) && $max_price != 0) {
            $products = $products->where('net_price', '<=', $max_price);
        }

        if (isset($search) && $search != "0") {
            $products = $products->where('name', 'LIKE', '%' . $search . '%');
        }

        if (isset($category) && $category != "0") {
            $products->where('parent_category', 'LIKE', '%' . $category . '%');
        }

        if (isset($parent_category) && $parent_category != "0") {
            //$products->where('sub_category', 'LIKE', '%'.$sub_category.'%');
            $products = $products->where('parent_category', $parent_category);
        }
        if (isset($sub_category) && $sub_category != "0") {
            //$products->where('sub_category', 'LIKE', '%'.$sub_category.'%');
            $products = $products->where('sub_category', $sub_category);
        }
//        if (isset($colors) && $colors != "0") {
//            $colors = explode(",", $colors);
//            $products->whereIn('colors', $colors);
//        }
//        if (isset($processor) && $processor != "0") {
//            $processor = explode(",", $processor);
//            $products->whereIn('processor', $processor);
//        }
//        if (isset($ram) && $ram != "0") {
//            $ram = explode(",", $ram);
//            $products->whereIn('ram', $ram);
//        }
//        if (isset($warranty) && $warranty != "0") {
//            $warranty = explode(",", $warranty);
//            $products->whereIn('warranty', 'in', '(' . $warranty . ')');
//        }

        $products = $products->orderBy($order_by, $order)
                ->paginate(18);
        return response()->json($products);
    }

    public function fetch($user = 0, $order_by = 'id', $order = 'desc', $search = 0, $status = 0
            , $category = 0, $sub_category = 0, $brand = 0) {
        $products = new Product();
        if ($user > 0) {
            $userClass = new User();
            $user_type = $userClass->getUserType($user);

            if ($user_type == 'vendor') {
                $products = $products->where('vendor_id', $user);
            } else {
                $products = $products->join('seller_products', 'seller_products.product_id', '=', 'products.id')
                        ->where('seller_id', $user);
            }
        }
        if ($search != "0") {
            $products = $products->where('name', 'LIKE', '%' . $search . '%');
        }

        if ($category != "0") {
            $products = $products->where('parent_category', $category);
        }

        if ($sub_category != "0") {
            $products = $products->where('sub_category', $sub_category);
        }
        if ($brand != "0") {
            $products = $products->where('brand', 'LIKE', '%' . $brand . '%');
        }
        $products = $products->orderBy($order_by, $order)
                ->paginate(18);
        return response()->json($products);
    }

    public function fetch__xtk($user = 0, $order_by = 'id', $order = 'desc', $search = 0, $status = 0
            , $category = 0, $sub_category = 0, $min_price = 0, $max_price = 0, $brand = 0, $colors = 0, $warranty = 0, $ram = 0, $processor = 0) {

        $products = new Product();
        if ($user > 0) {
            $userClass = new User();
            $user_type = $userClass->getUserType($user);

            if ($user_type == 'vendor') {
                $products = $products->where('vendor_id', $user);
                array_push($Condition, ['vendor_id', $user]);
            } else {
                $products = $products->join('seller_products', 'seller_products.product_id', '=', 'products.id')
                        ->where('seller_id', $user);
            }
        }
        if ($max_price != 0) {
            dd("here it comes");
            $products = $products->where('net_price', '>=', $min_price);
            array_push($WhereCondition, ['net_price', '>=', $min_price]);
        }
        if ($min_price != "0") {
            $products = $products->where('net_price', '<=', $max_price);
            array_push($WhereCondition, ['net_price', '<=', $max_price]);
        }


        if ($search != "0") {
            $products = $products->where('name', 'LIKE', '%' . $search . '%');
            array_push($WhereCondition, ['name', 'LIKE', '%' . $search . '%']);
        }

        if ($category != "0") {
            $products = $products->where('parent_category', 'LIKE', '%' . $category . '%');
            array_push($WhereCondition, ['parent_category', 'LIKE', '%' . $category . '%']);
        }

        if ($sub_category != "0") {
            $products = $products->where('sub_category', 'LIKE', '%' . $sub_category . '%');
            array_push($WhereCondition, ['sub_category', 'LIKE', '%' . $sub_category . '%']);
        }
        $brand = "'dell','hp'";
        if ($brand != "0") {
            $brand = explode(",", $brand);
            //$products = $products->where('brand', 'in', '('.$brand.')');
            array_push($WhereInCondition, ['brand', $brand]);
        }
        if ($colors != "0") {
            $products = $products->where('colors', 'in', '(' . $colors . ')');
            array_push($WhereInCondition, ['colors', 'in', '(' . $colors . ')']);
        }
        if ($processor != "0") {
            $products = $products->where('processor', 'in', '(' . $processor . ')');
            array_push($WhereInCondition, ['processor', 'in', '(' . $processor . ')']);
        }
        if ($ram != "0") {
            $products = $products->where('ram', 'in', '(' . $ram . ')');
            array_push($WhereInCondition, ['ram', 'in', '(' . $ram . ')']);
        }
        if ($warranty != "0") {
            $products = $products->where('warranty', 'in', '(' . $warranty . ')');
            array_push($WhereInCondition, ['warranty', 'in', '(' . $warranty . ')']);
        }


        if ($status != "0") {
            //$products = $products->where('products.status', $status);
            array_push($WhereCondition, ['products.status', $status]);
        } else {
            array_push($WhereCondition, ['products.status', '!=', 'deleted']);
        }
        array_push($WhereCondition, ['products.status', '!=', 'deleted']);
        array_push($WhereInCondition, ['products.status', array('deleted')]);

        //print_r($Condition);
        //$products->whereIn('brand','dell');
        // $products = $products->orderBy($order_by, $order)
        // ->paginate(18);
        $products = $products->orderBy($order_by, $order)
                ->paginate(18);

        // $products = $products->orderBy($order_by, $order)
        // ->paginate(18);
        return response()->json($products);
    }

    public function remove($product) {
        return Product::where('id', $product)
                        ->update(['status' => 'deleted']);
    }

    public function get($product, Request $request) {

        return response()->json(Product::where('id', $product)
                                ->first());
    }

    public function getRecommended($product, Request $request) {
        $parent_category = Product::where('id', $product)->first()->parent_category;
        $data = Product::where('parent_category', $parent_category)->limit(4)->get();

        return response()->json($data);
    }

    public function getFeatured() {
        $data = Product::orderBy('id', 'desc')->limit(4)->get();
        return response()->json($data);
    }

    public function getJustForYou($user_id) {
        if ($user_id)
            $ReportData = DB::table("orders as o")
                            ->join('order_items as oi', 'oi.order_id', '=', 'o.id')
                            ->join('products as p', 'p.id', '=', 'oi.item_id')
                            ->where("o.user_id", $user_id)
                            ->select(DB::raw("p.*"))
                            ->groupBy("p.id")
                            ->orderBy('o.id', 'desc')->limit(4)->get();
        else
            $ReportData = DB::table("orders as o")
                            ->join('order_items as oi', 'oi.order_id', '=', 'o.id')
                            ->join('products as p', 'p.id', '=', 'oi.item_id')
                            ->select(DB::raw("p.*"))
                            ->groupBy("p.id")
                            ->orderBy('o.id', 'desc')->limit(4)->get();

        return response()->json($ReportData);
    }

    public function producthistory(Request $request) {
        $data = $request->all();
        $ret = \App\UserProductVisited::create($data);
        return response()->json(array($ret));
    }

    public function productvisited(Request $request) {
        $data = $request->all();
        $ret = \App\UserProductVisited::create($data);
        return response()->json(array($ret));
    }

    public function create(Request $request) {

//        dd($request->all());
        // Setup the validator
        $rules = array(
            'name' => 'required|max:255',
            'net_price' => 'numeric|min:0.01|required',
            'featured_image' => 'max:2048',
            'parent_category' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'status' => 'required',
            'vendor_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
            )); // 400 being the HTTP code for an invalid request.
        }

        $data = $request->all();
        $data['seller_price']=$data['net_price'];
        //print_r($data);
        $filters = \App\ProductFilters::where("subcategory_id", $data['sub_category'])->select('filters')->get();
        //echo '<pre>';
        //return response()->json($filters);
        if ($filters) {
            $myAr = array();
            foreach ($filters as $row) {
                if (isset($data[$row['filters']])) {

                    if ($row['filters'])
                        $myAr[$row['filters']] = $data[$row['filters']];

                    unset($data[$row['filters']]);
                }
            }
        }
        
        $data['filters'] = json_encode($myAr);
        //dd($myAr);
        unset($data['id']);
        unset($data['featured_image']);
        //return response()->json($data);
        if ($data['images'] > 0) {

            $i = 0;
            while ($i < $data['images']) {
                if ($request->file('imagesArray_' . $i)) {
                    $photo = rand(5000, 9999) . $request->file('imagesArray_' . $i)->getClientOriginalName();
                    $destination = base_path() . '/public/img/product-images/' . $request->input('vendor_id');
                    $request->file('imagesArray_' . $i)->move($destination, $photo);
                    $dataM['images'][] = $photo;
                    unset($data['imagesArray_' . $i]);
                }
                $i++;
            }
            $data['images'] = json_encode($dataM['images']);
        }
        if ($request->file('featured_image')) {
            $photo = rand(5000, 9999) . $request->file('featured_image')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('vendor_id');
            $request->file('featured_image')->move($destination, $photo);
            $data['featured_image'] = $photo;
        }

//        dd($data);
        if (empty($request->input('id'))) {
            $product = Product::create($data);
            $id = $product->id;
        } else {
            Product::where('id', $request->input('id'))
                    ->update($data);
            $id = $request->input('id');
        }
        if ($myAr) {
            foreach ($myAr as $key => $val) {
                if ($val) {
                    $update_array = array('product_id' => $id, 'field' => $key, "value" => $val, "category_id" => $data['parent_category'], "subcategory_id" => $data['sub_category']);
                    if (\App\ProductsMeta::where([['product_id', $id], ['field', $key]])->exists()) {
                        \App\ProductsMeta::where([['product_id', $id], ['field', $key]])->update($update_array);
                    } else {
                        \App\ProductsMeta::create($update_array);
                    }
                }
            }
        }

        return response()->json(['success' => 'true', 'created' => $id]);
    }

    private function csvToArray($filename = '', $delimiter = ',', $vendor) {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 2500, $delimiter)) !== false) {
                if (!$header) {
                    $header = $row;
                    $header[] = 'vendor_id';
                } else {
                    $row[] = $vendor;
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }

    public function uploadCsv(Request $request) {
        // Setup the validator
        $rules = array(
            'csv_file' => 'required|mimes:csv,txt|max:2048',
            'vendor_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
            )); // 400 being the HTTP code for an invalid request.
        }

        $csv = rand(5000, 9999) . $request->file('csv_file')->getClientOriginalName();
        $destination = base_path() . '/public/files/' . $request->input('vendor_id');
        $request->file('csv_file')->move($destination, $csv);

        $file = public_path('files/' . $request->input('vendor_id') . '/' . $csv);

        $product_array = $this->csvToArray($file, ',', $request->input('vendor_id'));

        for ($i = 0; $i < count($product_array); $i++) {
            Product::firstOrCreate($product_array[$i]);
        }

        return response()->json(['success' => 'true']);
    }

}
