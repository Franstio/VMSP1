<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use DB;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   /*  public function type(){
        $data=type::all();
        return view('type', ['type'=>$data]);
       } 

       function Add_Type(Request $req){
        $type = new Type;
        $type->nameType=$req->nameType;
        $type->postby = auth()->user()->name;
        $type->postdate=date('Y-m-d H:i:s');
        $type->save();
        return redirect()->back()->with('message', 'Add Data Was Succesfully');
     }

    function delete_type($id){
        $data=type::find($id);
        $data->delete();
        return redirect('type');
       }

    function showDataType($id){
        $data=type::find($id);
        return view('typeEdit', ['type'=>$data]);
     }
  
     function edit_type(Request $req){
        $data=type::find($req->id);
        $data->nameType=$req->nameType;
        $data->postby=$req->postby;
        $data->postdate=date('Y-m-d H:i:s');
        $data->save();
        return redirect('type');
     } */

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
      $totalRecords = Type::select('count(*) as allcount')->count();
      $totalRecordsFilter = Type::select('count(*)as allcount')->where('nameType', 'like', '%' .$searchValue. '%')->count();

      $records =  Type::where('type.nameType', 'like', '%' .$searchValue. '%')
      ->skip($start)
      ->take($rowpage)
      ->get();

      return response()->json(['draw'=>$draw, 'recordsTotal'=> $totalRecords, 'recordsFiltered'=> $totalRecordsFilter, 'data' => $records]);

     }

     public function store(Request $req){
      if ($req->id_type == ''){
         Type::create([
            'nameType' => $req->nameType,
            'postby' => auth()->user()->name,
            'postdate' => date('Y-m-d H:i:s')
         ]);
         return response()->json(['success' => true,'result' => 'Insert Successfully']);
      }
      else{
         $data=type::find($req->id_type);
         $data->nameType=$req->nameType;
         $data->postby = auth()->user()->name;
         $data->postdate=date('Y-m-d H:i:s');
         $data->save();
         return response()->json(['success' => true,'result' => 'Update Successfully']);
      }
   }

      public function show($id_type)
      {
         error_log($id_type);
         $data = Type::find($id_type);
         return response()->json($data);
      }

      public function delete($id_type)
      {
         $data=type::find($id_type);
         $data->delete();
         return response()->json(['success' => true,'result' => 'Data Already Deleted']);
      }
}
