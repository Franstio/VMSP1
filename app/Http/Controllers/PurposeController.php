<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purpose;
use DB;

class PurposeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

   public function index(Request $req)
   {
    $draw = $req->draw;
    $start = $req->start;
    $rowpage = $req->length;

    $columnIndex_arr = $req->order;
    $columnName_arr = $req->columns;
    $columnName_arr2 = json_decode($columnName_arr,true);
    $search_arr = $req->search;

    $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
    $searchValue = $search_arr['value'];

    // TOTAL RECORD
    $totalRecords = Purpose::select('count(*) as allcount')->count();
    $totalRecordsFilter = Purpose::select('count(*)as allcount')->where('purpose', 'like', '%' .$searchValue. '%')->count();

    $records =  Purpose::where('purpose.purpose', 'like', '%' .$searchValue. '%')
    ->skip($start)
    ->take($rowpage)
    ->get();

    return response()->json(['draw'=>$draw, 'recordsTotal'=> $totalRecords, 'recordsFiltered'=> $totalRecordsFilter, 'data' => $records]);

   }

   public function store(Request $req){
    if ($req->id_purpose == ''){
       Purpose::create([
          'purpose' => $req->purpose,
          'postby' => auth()->user()->name,
          'postdate' => date('Y-m-d H:i:s')
       ]);
       return response()->json(['success' => true,'result' => 'Insert Successfully']);
    }
    else{
       $data=purpose::find($req->id_purpose);
       $data->purpose=$req->purpose;
       $data->postby = auth()->user()->name;
       $data->postdate=date('Y-m-d H:i:s');
       $data->save();
       return response()->json(['success' => true,'result' => 'Update Successfully']);
    }
 }

    public function show($id_purpose)
    {
       error_log($id_purpose);
       $data = Purpose::find($id_purpose);
       return response()->json($data);
    }

    public function delete($id_purpose)
    {
       $data=purpose::find($id_purpose);
       $data->delete();
       return response()->json(['success' => true,'result' => 'Data Already Deleted']);
    }
}

