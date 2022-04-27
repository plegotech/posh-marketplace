<?php

namespace App\Http\Controllers;

use App\Companies;
use App\OrderItems;
use App\Product;
use Illuminate\Http\Request;
use App\User;
use App\SellerWebsite;
use App\SellerProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return 'silence is the gold';
    }

    public function createCategoryImages(Request $request) {

        $data = $request->all();

        $data2['seller_id'] = $data["seller_id"];
        if ($request->file('home')) {
            $photo = rand(5000, 9999) . $request->file('home')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('home')->move($destination, $photo);
            unset($data['home']);
            $data2['images_home'] = $photo;
        } else {
            
        }
        if ($request->file('elec')) {
            $photo = rand(5000, 9999) . $request->file('elec')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('elec')->move($destination, $photo);
            unset($data['elec']);
            $data2['images_elec'] = $photo;
        }
        if ($request->file('hot')) {
            $photo = rand(5000, 9999) . $request->file('hot')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('hot')->move($destination, $photo);
            unset($data['hot']);
            $data2['images_hot'] = $photo;
        }
        if ($request->file('new')) {
            $photo = rand(5000, 9999) . $request->file('new')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('new')->move($destination, $photo);
            unset($data['new']);
            $data2['images_new'] = $photo;
        }
        if ($request->file('cat')) {
            $photo = rand(5000, 9999) . $request->file('cat')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('cat')->move($destination, $photo);
            unset($data['cat']);
            $data2['images_cat'] = $photo;
        }
//        dd($data);
        if (\App\SellerHomepage::where("seller_id", $data['seller_id'])->count()) {
            $resp = \App\SellerHomepage::where("seller_id", $data['seller_id'])->update($data2);
        } else {
            $resp = \App\SellerHomepage::create($data2);
        }
        if ($resp) {
            return Response()->json(array(true));
        } else {
            return Response()->json(array(false));
        }
    }

    public function getSellerHomepage($id) {
        $CatImages = \App\SellerHomepage::where("seller_id", $id)->first();
        $SlidersPromotions = SellerWebsite::where("seller_id", $id)->select('sliders', 'promotion')->first();
        if ($SlidersPromotions) {
            $SlidersPromotions->sliders = json_decode($SlidersPromotions->sliders);
            $SlidersPromotions->promotion = json_decode($SlidersPromotions->promotion);
        }
        return Response()->json(array("CatImages" => $CatImages, "Sliders" => $SlidersPromotions));
    }

    public function createSliders(Request $request) {
        $data = $request->all();
        extract($data);
        if ($data['sliders'] > 0) {

            $i = 0;
            while ($i < $data['sliders']) {
                if ($request->file('slider_images_' . $i)) {
                    $photo = rand(5000, 9999) . $request->file('slider_images_' . $i)->getClientOriginalName();
                    $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
                    $request->file('slider_images_' . $i)->move($destination, $photo);
                    $dataM['slider_images'][] = $photo;
                    unset($data['slider_images_' . $i]);
                }
                $i++;
            }
            $data['sliders'] = json_encode($dataM['slider_images']);

            $createArray = array(
                'seller_id' => $seller_id,
                'sliders' => $data['sliders']
            );
            if (SellerWebsite::where("seller_id", $seller_id)->count()) {
                $data = SellerWebsite::where("seller_id", $seller_id)->update($createArray);
            } else {
                $data = SellerWebsite::create($createArray);
            }
            if ($data) {
                return Response()->json(array(
                            'success' => true
                ));
            } else {
                return Response()->json(array(
                            'success' => false,
                            'errors' => $validator->getMessageBag()->toArray()
                ));
            }
        }
    }
    public function createAboutUs(Request $request) {
        $data = $request->all();
        extract($data);

        $createArray = array(
            'seller_id' => $seller_id,
            'about_us' => $about_us,
        );
        if (SellerWebsite::where("seller_id", $seller_id)->count()) {
            $data = SellerWebsite::where("seller_id", $seller_id)->update($createArray);
        } else {
            $data = SellerWebsite::create($createArray);
        }
        if ($data) {
            return Response()->json(array(
                        'success' => true
            ));
        } else {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }
    }
    public function createPromotions(Request $request){
        $data = $request->all();
        extract($data);
        if ($data['promotion'] > 0) {

            $i = 0;
            while ($i < $data['promotion']) {
                if ($request->file('pro_images_' . $i)) {
                    $photo = rand(5000, 9999) . $request->file('pro_images_' . $i)->getClientOriginalName();
                    $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
                    $request->file('pro_images_' . $i)->move($destination, $photo);
                    $dataM['pro_images'][] = $photo;
                    unset($data['pro_images_' . $i]);
                }
                $i++;
            }
            $data['promotion'] = json_encode($dataM['pro_images']);
            
            
            $createArray = array(
                'seller_id' => $seller_id,
                'promotion' => $data['promotion']
            );
            if (SellerWebsite::where("seller_id", $seller_id)->count()) {
                $data = SellerWebsite::where("seller_id", $seller_id)->update($createArray);
            } else {
                $data = SellerWebsite::create($createArray);
            }
            if ($data) {
                return Response()->json(array(
                            'success' => true
                ));
            } else {
                return Response()->json(array(
                            'success' => false,
                            'errors' => $validator->getMessageBag()->toArray()
                ));
            }
            
        } else {
                return Response()->json(array(
                'success' => false
                ));

        }
        
    }

    public function createHeaderFooter(Request $request) {
        $data = $request->all();
        extract($data);

//        echo Auth::user()->id;
//        $user = auth()->use/r()->id;
//dd($user);
//        $id = Auth::user()->getId();
//        echo $id;
//        die;


        if ($request->file('logo')) {
            $photo = rand(5000, 9999) . $request->file('logo')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('logo')->move($destination, $photo);
            $data['logo'] = $photo;
        }

        $createArray = array(
            'seller_id' => $seller_id,
            'logo' => $data['logo'],
            'h_shop_name' => $h_shop_name,
            'h_shop_address' => $h_shop_address,
            'f_main_menu_title' => json_encode(array($f_main_menu_link1, $f_main_menu_link2, $f_main_menu_link3, $f_main_menu_link4)),
            'f_main_menu_links' => json_encode(array($f_main_menu_link1_url, $f_main_menu_link2_url, $f_main_menu_link3_url, $f_main_menu_link4_url)),
            'f_company_title' => json_encode(array($f_company_link1, $f_company_link2, $f_company_link3)),
            'f_company_links' => json_encode(array($f_company_link1_url, $f_company_link2_url, $f_company_link3_url)),
            'f_discover_title' => json_encode(array($f_discover_link1, $f_discover_link2, $f_discover_link3)),
            'f_discover_links' => json_encode(array($f_discover_link1_url, $f_discover_link2_url, $f_discover_link3_url)),
            'f_findus_links' => json_encode(array($f_findus_link1, $f_findus_link2, $f_findus_link3))
        );
        if (SellerWebsite::where("seller_id", $seller_id)->count()) {
            $data = SellerWebsite::where("seller_id", $seller_id)->update($createArray);
        } else {
            $data = SellerWebsite::create($createArray);
        }
        if ($data) {
            return Response()->json(array(
                        'success' => true
            ));
        } else {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }
    }

    public function fetchHeaderFooter($id) {
        $data = SellerWebsite::where('seller_id', $id)->first();
        if ($data) {
            $data['f_main_menu_title'] = json_decode($data['f_main_menu_title']);
            $data['f_main_menu_links'] = json_decode($data['f_main_menu_links']);
            $data['f_company_title'] = json_decode($data['f_company_title']);
            $data['f_company_links'] = json_decode($data['f_company_links']);
            $data['f_discover_title'] = json_decode($data['f_discover_title']);
            $data['f_discover_links'] = json_decode($data['f_discover_links']);
            $data['f_findus_links'] = json_decode($data['f_findus_links']);
        }
        return Response()->json($data);
    }

    public function getBestSellerCategories($id) {
        $data = \App\SellerProduct::where('seller_id', $id)->with('products')->get();
        if ($data) {
            $myArray = array();
            foreach ($data as $row) {
                $myArray[$row['products'][0]['parent_category']] = $row['products'][0]['parent_category'];
            }
            foreach($myArray as $row){
                $myArray2[] = $row;
            }
        }
//        dd($myArray);        
        return Response()->json($myArray2);
    }

    public function businessLicenses(Request $request) {
        // Setup the validator
        $rules = array(
            'company_id' => 'required',
            'business_licenses' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails()) {
            return Response()->json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
            )); // 400 being the HTTP code for an invalid request.
        }

        if ($request->hasfile('license')) {
            $data = array();
            foreach ($request->file('license') as $file) {
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/files/licenses/', $name);
                $data[] = $name;
            }

            Companies::where('id', $request->input('company_id'))
                    ->update(['license' => \GuzzleHttp\json_encode($data)]);
        }

        return response()->json(['success' => 'true']);
    }

    private function runSignupStepTwo($request) {
        SellerWebsite::where('seller_id', $request->input('seller_id'))
                ->update(['tier' => $request->input('tier')]);
    }

    private function runSignupStepOne($request) {
        $user = array(
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'user_type' => 'seller',
            'status' => 'pending',
            'gender' => $request->input('gender'),
            'password' => Hash::make($request->input('password')),
        );

        $seller_id = $request->input('id');

        if (empty($seller_id)) {
            $seller_id = $request->input('seller_id');
        }

        if (!empty($seller_id)) {
            User::where('id', $seller_id)
                    ->update($user);
        } else {
            $user = User::create($user);

            if ((int) $user->id > 0) {
                $company = array(
                    'name' => $request->input('company'),
                    'user_id' => $user->id,
                    'subscription_fee' => 0,
                    'license' => 0,
                    'ein_number' => $request->input('ein_number'),
                    'address' => $request->input('address'),
                    'city' => $request->input('city'),
                    'state' => $request->input('state'),
                    'country' => 'United States'
                );

                $company = Companies::create($company);
                $response = ['company' => $company->id];
            }
            $seller_id = $user->id;
        }

        $response['success'] = 'true';
        $response['user_id'] = $seller_id;

        return response()->json($response);
    }

    public function seller(Request $request, $step) {
        if ($step == '0') {
            // Setup the validator
            $rules = array(
                'first_name' => 'required|min:2|max:50',
                'last_name' => 'required|min:2|max:50',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'gender' => 'required',
                'phone' => 'required|digits:10',
                'company' => 'required',
                'ein_number' => 'required',
                'password' => 'required|confirmed'
            );

            $validator = Validator::make($request->all(), $rules);
            $error_bag = $validator->getMessageBag()->toArray();

            if (array_key_exists('seller_id', $error_bag)) {
                $rules['email'] = 'required|email|max:255';
            } else {
                $rules['email'] = 'required|email|unique:users|max:255';
            }

            // Validate the input and return correct response
            if ($validator->fails()) {

                //If email has any partially registered account
                if (count($error_bag) == 1 && isset($error_bag['email']) && !array_key_exists('seller_id', $error_bag)) {
                    $step = $this->checkPartialStatusOfSellerRegistration($request->input('email'));

                    if ($step) {

                        $seller = User::select('id')
                                ->where('email', $request->input('email'))
                                ->where('user_type', 'seller')
                                ->first();

                        return Response()->json(array(
                                    'user_id' => $seller->id,
                                    'success' => 'in-progress',
                                    'step' => $step
                                        ), 200);
                    }
                } else {
                    unset($error_bag['email']);
                }

                return Response()->json(array(
                            'success' => false,
                            'errors' => $error_bag
                                ), 400); // 400 being the HTTP code for an invalid request.
            }
            return $this->runSignupStepOne($request);
        }

        if ($step == 'tier') {
            // Setup the validator
            $rules = array(
                'tier' => 'required',
                'seller_id' => 'required'
            );

            $validator = Validator::make($request->all(), $rules);

            // Validate the input and return correct response
            if ($validator->fails()) {

                return Response()->json(array(
                            'success' => false,
                            'errors' => $validator->getMessageBag()->toArray()
                                ), 400); // 400 being the HTTP code for an invalid request.
            }

            SellerWebsite::updateOrCreate(array('seller_id' => $request->input('seller_id')),
                    array('tier' => $request->input('tier')));

            return Response()->json(array(
                        'user_id' => $request->input('seller_id'),
                        'success' => 'true',
                        'message' => 'Move to domain selection'
                            ), 200);
        }

        if ($step == 'domain') {
            // Setup the validator
            $rules = array(
                'domain' => 'required',
                'seller_id' => 'required'
            );

            $validator = Validator::make($request->all(), $rules);

            // Validate the input and return correct response
            if ($validator->fails()) {

                return Response()->json(array(
                            'success' => false,
                            'errors' => $validator->getMessageBag()->toArray()
                                ), 400); // 400 being the HTTP code for an invalid request.
            }

            SellerWebsite::where('seller_id', $request->input('seller_id'))
                    ->update(['domain' => $request->input('domain')]);

            return Response()->json(array(
                        'user_id' => $request->input('seller_id'),
                        'success' => 'true',
                        'message' => 'Move to template selection'
                            ), 200);
        }

        if ($step == 'site_template') {
            // Setup the validator
            $rules = array(
                'site_template' => 'required',
                'seller_id' => 'required'
            );

            $validator = Validator::make($request->all(), $rules);

            // Validate the input and return correct response
            if ($validator->fails()) {

                return Response()->json(array(
                            'success' => false,
                            'errors' => $validator->getMessageBag()->toArray()
                                ), 400); // 400 being the HTTP code for an invalid request.
            }

            SellerWebsite::where('seller_id', $request->input('seller_id'))
                    ->update(['site_template' => $request->input('site_template')]);

            return Response()->json(array(
                        'user_id' => $request->input('seller_id'),
                        'success' => 'true',
                        'message' => 'Move to login'
                            ), 200);
        }
    }

    public function checkPartialStatusOfSellerRegistration($email) {
        $seller_record = SellerWebsite::select('seller_website.seller_id', 'seller_website.site_template', 'seller_website.domain')
                ->where('users.email', $email)
                ->join('users', 'users.id', '=', 'seller_website.seller_id')
                ->first();

        if ($seller_record) {
            $steps = $seller_record->toArray();
            if (strlen($steps['site_template']) > 0) {
                return 'login';
            }
            if (strlen($steps['domain']) > 1) {
                return 'seller-final';
            }
            return 'seller-signup-domain';
        }

        $seller = User::where('users.email', $email)
                ->where('users.user_type', 'seller')
                ->first();

        if ($seller) {
            return 'seller-signup-tier';
        }

        return false;
    }

    public function website($seller) {
        return SellerWebsite::where('seller_id', $seller)
                        ->first();
    }

    public function soldStatistics($seller_id, $order_by = 'id', $order = 'desc',
            $month = 0, $year = 0, $per_page = 5) {
        $products = OrderItems::select('products.id', 'order_items.item_id', 'products.name', 'products.parent_category',
                        'products.sub_category', 'products.net_price',
                        DB::raw('SUM(`order_items`.`quantity`) as sold'))
                ->where('order_items.seller_id', $seller_id)
                ->where('order_items.progress', 'delivered')
                ->join('products', 'products.id', '=', 'order_items.item_id')
                ->orderBy($order_by, $order)
                ->groupBy('order_items.item_id')
                ->paginate($per_page);

        $statistics = array();

        return response()->json(array(
                    'products' => $products,
                    'statistic' => $statistics
        ));
    }

    public function sellerProduct(Request $request) {
        $count = SellerProduct::where('seller_id', $request->input('seller_id'))
                ->where('product_id', $request->input('product_id'))
                ->count();

        if ($count) {
            SellerProduct::where('seller_id', $request->input('seller_id'))
                    ->where('product_id', $request->input('product_id'))
                    ->delete();

            return response()->json(array('status' => 'deleted'));
        } else {
            SellerProduct::create(array(
                'seller_id' => $request->input('seller_id'),
                'product_id' => $request->input('product_id')
            ));

            return response()->json(array('status' => 'created'));
        }
    }

    public function dashboard($id) {
        $sql = "SELECT COUNT(*) FROM order_items inner join products on products.id = order_items.item_id";
        $sql .= " where order_items.seller_id = '$id' AND ";
        $stats = OrderItems::select(DB::raw('(' . $sql . ' order_items.status = "approved" AND order_items.progress != "delivered") as total_orders'),
                                DB::raw('(' . $sql . ' order_items.status = "pending") as pending_orders'),
                                DB::raw('(' . $sql . ' order_items.status = "rejected") as cancelled_orders'),
                                DB::raw('(' . $sql . ' order_items.progress = "delivered") as successful_orders')
                        )
                        ->first()->toArray();

        $orders = OrderItems::select('order_items.id', 'products.name', DB::raw("DATE_FORMAT(orders.created_at, '%b %d, %Y %h:%i %p') AS 'ordered_at'"),
                        'order_items.quantity', 'products.net_price', 'order_items.progress', 'orders.shipping_address'
                        , 'orders.shipping_method', 'orders.payment_method', DB::raw('SUM((products.net_price * order_items.quantity)) as total_sold'))
                ->where('order_items.seller_id', $id)
                ->join('products', 'products.id', '=', 'order_items.item_id')
                ->join('orders', 'orders.id', '=', 'order_items.order_id')
                ->orderBy('order_items.id', 'desc')
                ->limit(10)
                ->get()
                ->toArray();

        $stats['orders'] = $orders;

        return response()->json($stats);
    }

}
