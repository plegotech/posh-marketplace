<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller {

    //
    public function fetch(Request $request) {
        $data = \App\Category::where([['parent_category_id',0],['status',1]])->with('children')->get();
        return response()->json($data);
    }

}
