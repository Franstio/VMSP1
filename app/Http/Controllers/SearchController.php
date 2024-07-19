<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index(){
        $isExist = DB::table('visitor')->where('nik', '')->exists();
     
        if($isExist){
            return response()->json(['success' => true,'result' => 'Record Found']);
        } else{
            return response()->json(['success' => true,'result' => 'Record Not Found']);
        }
      }
}