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
        extract($data);

        $updateArray = array(
            "seller_id" => $seller_id,
            "link_home" => $link_home,
            "images_home" => "",
            "link_elec" => $link_elec,
            "images_elec" => "",
            "link_hot" => $link_hot,
            "images_hot" => "",
            "link_new" => $link_new,
            "images_new" => "",
            "link_cat" => $link_cat,
            "images_cat" => "");
        if ($request->file('home')) {
            $photo = rand(5000, 9999) . $request->file('home')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('home')->move($destination, $photo);
            unset($data['home']);
            $updateArray['images_home'] = $photo;
        } else {
            unset($updateArray['images_home']);
        }
        if ($request->file('elec')) {
            $photo = rand(5000, 9999) . $request->file('elec')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('elec')->move($destination, $photo);
            unset($data['elec']);
            $updateArray['images_elec'] = $photo;
        } else {
            unset($updateArray['images_elec']);
        }
        if ($request->file('hot')) {
            $photo = rand(5000, 9999) . $request->file('hot')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('hot')->move($destination, $photo);
            unset($data['hot']);
            $updateArray['images_hot'] = $photo;
        } else {
            unset($updateArray['images_hot']);
        }
        if ($request->file('new')) {
            $photo = rand(5000, 9999) . $request->file('new')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('new')->move($destination, $photo);
            unset($data['new']);
            $updateArray['images_new'] = $photo;
        } else {
            unset($updateArray['images_new']);
        }
        if ($request->file('cat')) {
            $photo = rand(5000, 9999) . $request->file('cat')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('cat')->move($destination, $photo);
            unset($data['cat']);
            $updateArray['images_cat'] = $photo;
        } else {
            unset($updateArray['images_cat']);
        }
//        dd($data);
        if (\App\SellerHomepage::where("seller_id", $seller_id)->count()) {
            $resp = \App\SellerHomepage::where("seller_id", $seller_id)->update($updateArray);
        } else {
            $resp = \App\SellerHomepage::create($updateArray);
        }
        if ($resp) {
            return Response()->json(array("success" => true));
        } else {
            return Response()->json(array("success" => true));
        }
    }

    public function getCatTitle($id) {
        $data = \App\Category::where("id", $id)->first();

        return Response()->json($data);
    }

    public function getSellerHomepage($id) {
        $CatImages = \App\CategoryImages::where("seller_id", $id)->first();
        $SlidersForBackend = \App\Sliders::where("seller_id", $id)->first();

        if ($SlidersForBackend) {
            $MyArray[0] = array("link" => $SlidersForBackend->link1, "image" => $SlidersForBackend->image1);
            $MyArray[1] = array("link" => $SlidersForBackend->link2, "image" => $SlidersForBackend->image2);
            $MyArray[2] = array("link" => $SlidersForBackend->link3, "image" => $SlidersForBackend->image3);
        }
        $SlidersForTemp = $MyArray;

        $Promotions = \App\Promotions::where("seller_id", $id)->first();
        return Response()->json(array("CatImages" => $CatImages, "Sliders" => $SlidersForTemp, "Slider" => $SlidersForBackend, "Promotions" => $Promotions));
    }

    public function createSliders(Request $request) {
        $data = $request->all();
        extract($data);

        $updateArray = array("seller_id" => $seller_id, "link1" => $link1, "image1" => "", "link2" => $link2, "image2" => "", "link3" => $link3, "image3" => "");
        if ($request->file('slider_images_1')) {
            $photo = rand(5000, 9999) . $request->file('slider_images_1')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('slider_images_1')->move($destination, $photo);
            $updateArray["image1"] = $photo;
            unset($data['slider_images_1']);
        } else {
            unset($updateArray["image1"]);
        }
        if ($request->file('slider_images_2')) {
            $photo = rand(5000, 9999) . $request->file('slider_images_2')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('slider_images_2')->move($destination, $photo);
            $updateArray["image2"] = $photo;
            unset($data['slider_images_2']);
        } else {
            unset($updateArray["image2"]);
        }
        if ($request->file('slider_images_3')) {
            $photo = rand(5000, 9999) . $request->file('slider_images_3')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('slider_images_3')->move($destination, $photo);
            $updateArray["image3"] = $photo;
            unset($data['slider_images_3']);
        } else {
            unset($updateArray["image3"]);
        }
        $existingdata = \App\Sliders::where("seller_id", $seller_id)->first();
        if ($existingdata) {
            $data = \App\Sliders::where("seller_id", $seller_id)->update($updateArray);
        } else {
            $data = \App\Sliders::create($updateArray);
        }
        if ($data) {
            return Response()->json(array("success" => true));
        } else {
            return Response()->json(array("success" => false));
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

    public function createPromotions(Request $request) {
        $data = $request->all();
        extract($data);
        $updateArray = array("seller_id" => $seller_id, "link1" => $link1, "image1" => "", "link2" => $link2, "image2" => "", "link3" => $link3, "image3" => "", "link4" => $link4, "image4" => "");
        if ($request->file('pro_images_top1')) {
            $photo = rand(5000, 9999) . $request->file('pro_images_top1')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('pro_images_top1')->move($destination, $photo);

            $updateArray['image1'] = $photo;
            unset($data['pro_images_top1']);
        } else {
            unset($updateArray['image1']);
        }
        if ($request->file('pro_images_top2')) {
            $photo = rand(5000, 9999) . $request->file('pro_images_top2')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('pro_images_top2')->move($destination, $photo);
            $updateArray['image2'] = $photo;
            unset($data['pro_images_top2']);
        } else {
            unset($updateArray['image2']);
        }
        if ($request->file('pro_images_bot1')) {
            $photo = rand(5000, 9999) . $request->file('pro_images_bot1')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('pro_images_bot1')->move($destination, $photo);
            $updateArray['image3'] = $photo;
            unset($data['pro_images_bot1']);
        } else {
            unset($updateArray['image3']);
        }
        if ($request->file('pro_images_bot2')) {
            $photo = rand(5000, 9999) . $request->file('pro_images_bot2')->getClientOriginalName();
            $destination = base_path() . '/public/img/product-images/' . $request->input('seller_id');
            $request->file('pro_images_bot2')->move($destination, $photo);
            $updateArray['image4'] = $photo;
            unset($data['pro_images_bot2']);
        } else {
            unset($updateArray['image4']);
        }
        if (\App\Promotions::where("seller_id", $seller_id)->count()) {
            $data = \App\Promotions::where("seller_id", $seller_id)->update($updateArray);
        } else {
            $data = \App\Promotions::create($updateArray);
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

    public function RemoveImage(Request $request) {
        $data = $request->all();
        $seller_id = $data['seller_id'];
        $type = $data['type'];
        $image = $data['image'];
        $arDel = array();
        if ($type == "slider") {
            switch ($image) {
                case 1:
                    $arDel['image1'] = null;
                    break;
                case 2:
                    $arDel['image2'] = null;
                    break;
                case 3:
                    $arDel['image3'] = null;
                    break;
            }
            $ret = \App\Sliders::where('seller_id', $seller_id)->update($arDel);
            
        } else if ($type == "promotion") {
            switch ($image) {
                case 1:
                    $arDel['image1'] = null;
                    break;
                case 2:
                    $arDel['image2'] = null;
                    break;
                case 3:
                    $arDel['image3'] = null;
                    break;
                case 4:
                    $arDel['image4'] = null;
                    break;
            }
            $ret = \App\Promotions::where('seller_id', $seller_id)->update($arDel);
            
        } else if ($type == "cat") {
            switch ($image) {
                case 1:
                    $arDel['images_new'] = null;
                    break;
                case 2:
                    $arDel['images_cat'] = null;
                    break;
                case 3:
                    $arDel['images_hot'] = null;
                    break;
                case 4:
                    $arDel['images_elec'] = null;
                    break;
                case 5:
                    $arDel['images_home'] = null;
                    break;
            }
            $ret = \App\CategoryImages::where('seller_id', $seller_id)->update($arDel);
            
        }
        if ($ret) {
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
//        $data = \App\SellerProduct::where('seller_id', $id)->with('products')->get();
//
//        if ($data) {
//            $myArray = array();
//            foreach ($data as $row) {
//                $myArray[$row['products'][0]['parent_category']] = $row['products'][0]['parent_category'];
//            }
//            foreach ($myArray as $row) {
//                $myArray2[] = $row;
//            }
//        }
//        dd($myArray);        


        $data = DB::table("product_categories as pc")
                ->join('products as p', 'p.sub_category', '=', 'pc.id')
                ->join('seller_products as sp', 'sp.product_id', '=', 'p.id')
                ->where("sp.seller_id", $id)
                ->select(DB::raw("p.id,p.featured_image, p.vendor_id, pc.*"))
                ->groupBy("p.sub_category")
                ->get();
//        dd($ReportData);
//        $data = \App\Category::where('parent_category_id','>','0')->get();
//        if ($data) {
//            $myArray2 = array();
//            foreach ($data as $row) {
//                $myArray2[] = $row['title'];
//            }
//        }
        return Response()->json($data);
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

    public function sellerUpdateProduct(Request $request){
        $count = SellerProduct::where('seller_id', $request->input('seller_id'))
                ->where('product_id', $request->input('product_id'))
                ->update(array('seller_price'=>$request->input('net_price')));  
        return response()->json(array('status' => 'updated'));
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
