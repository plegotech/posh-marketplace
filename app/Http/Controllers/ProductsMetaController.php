<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsMetaController extends Controller
{
    //
    
    public function fetch(Request $request) {
        $data = $request->all();
        if(isset($data->category_id)){
            $catId= $data->category_id;
        } else {
            $catId= 10;
        }
        $data = \App\ProductsMeta::where('category_id',$catId)->get();
        if($data){
            
            $aData = array();
            foreach($data as $row){
                $aData[$row->field][]=$row;
            }
            
            return Response()->json(array(
                'success' => true,
                'data' => $aData

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
