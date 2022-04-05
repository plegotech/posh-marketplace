<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller {

    //
    public function fetch(Request $request) {
        $data = \App\Category::where([['parent_category_id',0],['status',1]])->with('children')->get();
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

}
