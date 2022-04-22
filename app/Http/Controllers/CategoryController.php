<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function create(Request $request){
        $data = $request->all();
        $result = \App\Category::create($data);
        if($result){
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
    //
    public function fetch(Request $request) {
        $dataReq = $request->all();
        $p_cat = isset($dataReq['id']) ? $dataReq['id'] : 0;
        $data = \App\Category::where([['parent_category_id',$p_cat],['status',1]])->with('children')->get();
        if($data){
            $myAr = array();
            foreach($data as $row){
                $new_title = strtolower(preg_replace('/\s+/', '', $row['title']));
                $new_title = str_replace("&", "-", $new_title);
                $row['newtitle']=$new_title;
                $myAr[]=$row;
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
    public function fetchBrands(Request $request){
        $data = $request->all();
        $products = \App\Product::where("sub_category", $data['sub_category'])->get();
        $myAr = array();
        if($products){
            
            foreach($products as $row){
                if($row['brand']==null){
                    $row['brand'] = "No Brand";
                }
                $myAr[$row['brand']]=$row['brand'];
            }
        }
            return Response()->json(array(
                'success' => true,
                'data' => $myAr

            )); // 400 being the HTTP code for an invalid request.
    }
    

}
