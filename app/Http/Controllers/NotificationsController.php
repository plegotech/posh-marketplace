<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    //
    public function get($id){
        //$data = \App\Notifications::where('recieved_by', $id)->get();
        $data = \App\Notifications::limit(4)->get();
        if($data){
            $raja=array();
            foreach($data as $row){
                $desc = json_decode($row->desc);
                $row->desc = $desc;
                $raja[]=$row;
            }
            $data=$raja;
        }
        return response()->json(['success'=>true, 'data'=>$data]);
    }
}
