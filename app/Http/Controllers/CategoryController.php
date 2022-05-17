<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function fetchById($id) {
        return Response()->json(array(
                    'success' => true,
                    'data' => \App\Category::where('id', $id)->first()
        ));
    }

    public function create(Request $request) {
        $data = $request->all();
        $filters = $data['filters'];
        $filterslab = $data['filterslab'];
        $brands = $data['brands'];
        $brandslab = $data['brandslab'];


        $myAr = \App\ProductFilters::where('subcategory_id', $data['cat_id'])->select('filters')->get();
        $filters_bk = array();
        if ($myAr) {
            foreach ($myAr as $p_row) {
                $key = $p_row['filters'];
                if (!in_array($key, $filters_bk))
                    $filters_bk[] = $key;
            }
        }


        if ($request->file('img')) {
            //echo "Exists";
            $photo = rand(5000, 9999) . $request->file('img')->getClientOriginalName();
            $destination = base_path() . '/public/img/menu-template';
            $request->file('img')->move($destination, $photo);
            $data['img'] = $photo;
        } else {
            //echo "Not Exists";
            unset($data['img']);
        }
        //return response()->json($data);
        
        unset($data['filters']);
        unset($data['filterslab']);
        unset($data['brands']);
        unset($data['brandslab']);

        if (isset($data['cat_id']) && $data['cat_id'] != 0) {
            $result = \App\Category::find($data['cat_id'])->update($data);
        } else {
            $result = $data['cat_id'] = \App\Category::create($data)->id;
        }

        if ($result) {
            if(isset($data[''])){
                
            }
            
            if ($filterslab) {
                $filterslab = json_decode($filterslab);
                foreach ($filterslab as $key => $val) {
                    $updatearray = array(
                        'subcategory_id' => $data['cat_id'],
                        'category_id' => $data['parent_category_id'],
                        'filters' => $val,
                    );
                    $pre_val = $filters_bk[$key];
                    if ($val)
                        \App\ProductFilters::where(['subcategory_id' => $data['cat_id'], 'filters' => $pre_val])->update($updatearray);
                }
            }
            if ($filters) {
                $filters = json_decode($filters);
                foreach ($filters as $val) {
                    $updatearray = array(
                        'subcategory_id' => $data['cat_id'],
                        'category_id' => $data['parent_category_id'],
                        'filters' => $val,
                    );
                    if ($val)
                        \App\ProductFilters::create($updatearray);
                }
            }
            
            if($brands){
                $brands = json_decode($brands);
                foreach($brands as $val){
                    $updatearray = array(
                        'subcategory_id' => $data['cat_id'],
                        'category_id' => $data['parent_category_id'],
                        'brands' => $val,
                    );
                    if ($val)
                        \App\ProductBrands::create($updatearray);                    
                }
            }

            return Response()->json(array(
                        'success' => true,
                        'data' => $result
            ));
        } else {
            return Response()->json(array(
                        'success' => false,
                        'data' => "No Data"
            )); // 400 being the HTTP code for an invalid request.
        }
    }

    public function update($id, Request $request) {
        \App\Category::find($id)->update($request->all());
    }

    public function delete($id) {
        \App\Category::find($id)->delete();
    }

    public function fetchCatFiltersBK($CategoryId) {
        $data = \App\ProductFilters::where('subcategory_id', $CategoryId)->select('filters')->get();
        if ($data) {
            $myAr = array();
            foreach ($data as $p_row) {
                $key = $p_row['field'];
                $val = $p_row['value'];
                $myAr[$key] = [];
            }
            $data = $myAr;
        }
        return Response()->json(array("success" => true, "data" => $data));
    }

    public function fetchCatFilters($CategoryId) {
        $data = \App\ProductFilters::where('subcategory_id', $CategoryId)->select('filters')->get();
        if ($data) {
            $myAr = array();
            foreach ($data as $p_row) {
                $key = $p_row['filters'];
                $myAr[$key] = [];
            }
            $data = $myAr;
        }
        return Response()->json(array("success" => true, "data" => $data));
    }

    public function fetchFiltersByProduct($productId) {
        $filters = \App\ProductsMeta::where('product_id', $productId)->get();
        if ($filters) {
            $myAr = array();
            $subcategory_id = isset($filters[0]) ? $filters[0]['subcategory_id'] : 0;
            
            foreach ($filters as $row) {
                $key = $row['field'];
                $val = $row['value'];
                if($key && $val)
                $myAr[$key] = $val;
            }
            if($subcategory_id){
            $filters_data = \App\ProductFilters::where('subcategory_id', $subcategory_id)->get();
            if($filters_data){
                foreach($filters_data as $row){
                    if(!array_key_exists($row['filters'], $myAr) && $row['filters']){
                        $myAr[$row['filters']]="";
                    }
                }
            }
            }
        }
        return response()->json(array("data"=> $myAr));
    }

    public function fetchFilters($CategoryId) {
        $data = \App\ProductFilters::where('subcategory_id', $CategoryId)->get();
        $databrands = \App\ProductBrands::where('subcategory_id', $CategoryId)->get();
        $p_data = \App\ProductsMeta::where('subcategory_id', $CategoryId)->select('field', 'value')->get();
        $product_brand = \App\Product::where('sub_category', $CategoryId)->select('brand')->get();
        $filters_array = array();
        $myAr = array();
        $myAr2 = array();
        $myArBr = array();
        $myArBr2 = array();
        if ($data) {
            foreach ($data as $p_row) {
                $key = $p_row['filters'];
                if (!in_array($key, $myAr) && $key){
                    $myAr[] = $key;
                    $myAr2[$key] = [];
                }
            }
        }
        if ($databrands) {
            foreach ($databrands as $row) {
                $myArBr[$row['brands']] = [];
                if (!in_array($row['brands'], $myArBr2))
                    $myArBr2[$row['id']] = $row['brands'];
            }
        }
        $product_brand_ar=array();
        $product_brand_ar2=array();
        if($product_brand){
            foreach($product_brand as $row){
                $product_brand_ar[$row['brand']]=[];
                if(!in_array($row['brand'], $product_brand_ar2) && $row['brand'])
                $product_brand_ar2[]=$row['brand'];
            }
        }
        if ($p_data) {
            $myArLab = array();
            foreach ($p_data as $p_row) {
                $key = $p_row['field'];
                $val = $p_row['value'];
                if (isset($filters_array[$key])) {
                    if (!in_array($val, $filters_array[$key])) {
                        $filters_array[$key][] = $val;
                    }
                } else {
                    $filters_array[$key][] = $val;
                }
                $myArLab[$key] = [];
            }
            $myArLab2 = array();
            foreach ($myArLab as $key => $val) {
                if (!in_array($key, $myArLab2))
                    $myArLab2[] = $key;
            }
        }
//        dd($filters_array);
        //data is used in Template>Allproducts.vue file 
        //labels is used in Template>Allproducts.vue file 
        //data_f is used in EditSubCategories.vue file 
        return Response()->json(array("success" => true, "data" => $filters_array, "brandlist"=>$product_brand_ar2, "product_brand"=>$product_brand_ar, "data_up"=>$myAr2, "data_f" => $myAr, "labels" => $myArLab, "filterlab" => $myArLab2, "brands"=>$myArBr, "brandslab"=>$myArBr2));
        /*
         * Marker
         * Pencils
         * Pouch
         * Sandal
         * 
         */
        if ($data) {
            $myAr = array();
            $myArLab = array();
            foreach ($data as $row) {
                $myAr[$row['filters']][] = $row['value'];
                $myArLab[$row['filters']] = [];
            }
            $data = $myAr;
        }
        return Response()->json(array("success" => true, "data" => $data, "labels" => $myArLab));
    }

    //
    public function fetch(Request $request) {
        $dataReq = $request->all();
        $p_cat = isset($dataReq['id']) ? $dataReq['id'] : 0;
        $data = \App\Category::where([['parent_category_id', $p_cat], ['status', 1]])->with('children')->get();
        if ($data) {
            $myAr = array();
            foreach ($data as $row) {
                $new_title = strtolower(preg_replace('/\s+/', '', $row['title']));
                $new_title = str_replace("&", "-", $new_title);
                $row['newtitle'] = $new_title;
                $myAr[] = $row;
            }
            $data = $myAr;
            return Response()->json(array(
                        'success' => true,
                        'data' => $data
            )); // 400 being the HTTP code for an invalid request.
        } else {
            return Response()->json(array(
                        'success' => false,
                        'data' => "No Data"
            )); // 400 being the HTTP code for an invalid request.
        }
        //return response()->json($data);
    }

    public function fetchSub() {
        $data = \App\Category::where([['parent_category_id', ">", 0], ['status', 1]])->with('parent')->get();
        if ($data)
            return Response()->json(array(
                        'success' => true,
                        'data' => $data));
        else
            return Response()->json(array(
                        'success' => false,
                        'data' => "No Data"
            )); // 400 being the HTTP code for an invalid request.
    }

    public function fetchWithLimit(Request $request) {
        $dataReq = $request->all();
        $p_cat = isset($dataReq['id']) ? $dataReq['id'] : 0;
        $data = \App\Category::where([['parent_category_id', $p_cat], ['status', 1]])->with('children')->limit(10)->get();
        if ($data) {
            $myAr = array();
            foreach ($data as $row) {
                $new_title = strtolower(preg_replace('/\s+/', '', $row['title']));
                $new_title = str_replace("&", "-", $new_title);
                $row['newtitle'] = $new_title;
                $myAr[] = $row;
            }
            $data = $myAr;
            return Response()->json(array(
                        'success' => true,
                        'data' => $data
            )); // 400 being the HTTP code for an invalid request.
        } else {
            return Response()->json(array(
                        'success' => false,
                        'data' => "No Data"
            )); // 400 being the HTTP code for an invalid request.
        }
        //return response()->json($data);
    }

    public function fetchAll() {
        $data = \App\Category::with('children')->get();
        if ($data) {
            return Response()->json(array(
                        'success' => true,
                        'data' => $data
            )); // 400 being the HTTP code for an invalid request.
        } else {
            return Response()->json(array(
                        'success' => false,
                        'data' => "No Data"
            )); // 400 being the HTTP code for an invalid request.
        }
    }

    public function fetchBrands(Request $request) {
        $data = $request->all();
        $products = \App\Product::where("sub_category", $data['sub_category'])->get();
        $myAr = array();
        if ($products) {

            foreach ($products as $row) {
                if ($row['brand'] == null) {
                    $row['brand'] = "No Brand";
                }
                $myAr[$row['brand']] = $row['brand'];
            }
        }
        return Response()->json(array(
                    'success' => true,
                    'data' => $myAr
        )); // 400 being the HTTP code for an invalid request.
    }

}
