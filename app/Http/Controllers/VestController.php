<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vest;
use DB;

class VestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

/*     public function vest(){
        $data=vest::all();
        return view('vest', ['vest'=>$data]);
       }

       function Add_Vest(Request $req){
        $vest = new Vest;
        $vest->noVest=$req->noVest;
        $vest->status=$req->status;
        $vest->reason=$req->reason;
        $vest->postby = auth()->user()->name;
        $vest->postdate=date('Y-m-d H:i:s');
        $vest->save();
        return redirect()->back()->with('message', 'Add Data Was Succesfully');
     }

     function delete_vest($id){
        $data=vest::find($id);
        $data->delete();
        return redirect('vest');
       }
    
     function showDataVest($id){
        $data=vest::find($id);
        return view('vestEdit', ['vest'=>$data]);
     }
  
     function edit_vest(Request $req){
        $data=vest::find($req->id);
        $data->noVest=$req->noVest;
        $data->status=$req->status;
        $data->reason=$req->reason;
        $data->postby = auth()->user()->name;
        $data->postdate=date('Y-m-d H:i:s');
        $data->save();
        return redirect('vest');
     } */

     public function index(Request $req)
     {
 
        ## Read value
         $draw = $req->draw;
         $start = $req->start;
         $rowperpage = $req->length; // Rows display per page
 
         $columnIndex_arr = $req->order;
         $columnName_arr = $req->columns;
         $columnName_arr2 = json_decode($columnName_arr,true);
         $search_arr = $req->search;
 
          $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
          $searchValue = $search_arr['value']; // Search value
 
         // Total records
          $totalRecords = Vest::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Vest::select('count(*) as allcount')->where('noVest', 'like', '%' .$searchValue . '%')->count();
         
 
         // Fetch records
         $records =  Vest::where('vest.noVest', 'like', '%' .$searchValue . '%')
         ->orWhere('vest.status', 'like', '%' .$searchValue . '%')
         ->orWhere('vest.reason', 'like', '%' .$searchValue . '%')
         ->orWhere('vest.postby', 'like', '%' .$searchValue . '%')
         ->skip($start)
         ->take($rowperpage)
         ->get();
 
 
         return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records ]);
     }
 
     public function store(Request $req){
         if ($req->id_vest ==''){
             Vest::create([
                 'noVest' => $req->noVest,
                 'status' => $req->status,
                 'reason' => $req->reason,
                 'postby' => auth()->user()->name,
                 'postdate' => date('Y-m-d H:i:s')
             ]);
             return response()->json(['success' => true,'result' => 'Insert Successfully']);
         } 
         else {
             $data=vest::find($req->id_vest);
             $data->noVest=$req->noVest;
             $data->status=$req->status;
             $data->reason=$req->reason;
             $data->postby = auth()->user()->name;
             $data->postdate=date('Y-m-d H:i:s');
             $data->save();
             return response()->json(['success' => true,'result' => 'Update Successfully']);
         }
     }
     public function show($id_vest)
     {
        error_log($id_vest);
         $data = Vest::find($id_vest);
         return response()->json($data);
     }
 
     public function delete($id_vest)
     {
         $data=vest::find($id_vest);
         $data->delete();
         return response()->json(['success' => true,'result' => 'Data Already Deleted']);
     }
}

