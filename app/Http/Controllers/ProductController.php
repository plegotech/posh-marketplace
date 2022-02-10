<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class ProductController extends Controller
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

    public function fetch($user = 0, $order_by = 'id', $order = 'desc', $search = 0, $status = 0
    ,$category = 0, $sub_category = 0)
    {
        $products = new Product();

        if($user > 0) {
            $userClass = new User();
            $user_type = $userClass->getUserType($user);

            if($user_type == 'vendor') {
                $products = $products->where('vendor_id', $user);
            } else {
                $products = $products->join('seller_products', 'seller_products.product_id', '=', 'products.id')
                 ->where('seller_id', $user);
            }

        }

        if($search != "0") {
            $products = $products->where('name', 'LIKE', '%'.$search.'%');
        }

        if($category != "0") {
            $products = $products->where('parent_category', 'LIKE', '%'.$category.'%');
        }

        if($sub_category != "0") {
            $products = $products->where('sub_category', 'LIKE', '%'.$sub_category.'%');
        }

        if($status != "0") {
            $products = $products->where('products.status', $status);
        }

        $products = $products->orderBy($order_by, $order)
        ->paginate(18);

        return response()->json($products);
    }

    public function remove($product)
    {
        return Product::where('id', $product)
            ->update(['status' => 'deleted']);
    }

    public function get($product)
    {
        return response()->json(Product::where('id', $product)
            ->first());
    }

    public function create(Request $request)
    {
        // Setup the validator
        $rules = array(
            'name'              => 'required|max:255',
            'net_price'         => 'numeric|min:0.01|required',
            'featured_image'    => 'max:2048',
            'parent_category'   => 'required',
            'brand'             => 'required',
            'description'       => 'required',
            'vendor_id'         => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            )); // 400 being the HTTP code for an invalid request.
        }

        $data = $request->all();
        unset($data['id']);
        unset($data['featured_image']);

        if($request->file('featured_image')) {
            $photo = rand(5000, 9999) . $request->file('featured_image')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/'. $request->input('vendor_id');
            $request->file('featured_image')->move($destination, $photo);
            $data['featured_image'] = $photo;
        }

        if(empty($request->input('id'))) {
            $product = Product::create($data);
            $id = $product->id;
        } else {
            Product::where('id', $request->input('id'))
                ->update($data);
            $id = $request->input('id');
        }

        return response()->json(['success' => 'true', 'created' => $id]);
    }

    private function csvToArray($filename = '', $delimiter = ',', $vendor)
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 2500, $delimiter)) !== false)
            {
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

    public function uploadCsv(Request $request)
    {
        // Setup the validator
        $rules = array(
            'csv_file'  => 'required|mimes:csv,txt|max:2048',
            'vendor_id' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            )); // 400 being the HTTP code for an invalid request.
        }

        $csv = rand(5000, 9999) . $request->file('csv_file')->getClientOriginalName();
        $destination = base_path() . '/public/files/'. $request->input('vendor_id');
        $request->file('csv_file')->move($destination, $csv);

        $file = public_path('files/'. $request->input('vendor_id') .'/'.$csv);

        $product_array = $this->csvToArray($file, ',', $request->input('vendor_id'));

        for ($i = 0; $i < count($product_array); $i ++) {
            Product::firstOrCreate($product_array[$i]);
        }

        return response()->json(['success' => 'true']);
    }
}
