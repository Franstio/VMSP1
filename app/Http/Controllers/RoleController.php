<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use DB;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /* public function role(){
        $data=role::all();
        return view('role', ['role'=>$data]);
       } 

       function Add_Role(Request $req){
        $role = new Role;
        $role->nameRole=$req->nameRole;
        $role->postby = auth()->user()->name;
        $role->postdate=date('Y-m-d H:i:s');
        $role->save();
        return redirect()->back()->with('message', 'Add Data Was Succesfully');
     }

     function delete_role($id){
        $data=role::find($id);
        $data->delete();
        return redirect('role');
       }

    function showDataRole($id){
        $data=role::find($id);
        return view('roleEdit', ['role'=>$data]);
     }
  
     function edit_role(Request $req){
        $data=role::find($req->id);
        $data->nameRole=$req->nameRole;
        $data->postby=$req->postby;
        $data->postdate=date('Y-m-d H:i:s');
        $data->save();
        return redirect('role');
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
      $totalRecords = Role::select('count(*) as allcount')->count();
      $totalRecordsFilter = Role::select('count(*)as allcount')->where('nameRole', 'like', '%' .$searchValue. '%')->count();
  
      $records = Role::where('role.nameRole', 'like', '%' .$searchValue. '%')
      ->skip($start)
      ->take($rowpage)
      ->get();
  
      return response()->json(['draw'=>$draw, 'recordsTotal'=> $totalRecords, 'recordsFiltered'=> $totalRecordsFilter, 'data' => $records]);
  
     }
  
     public function store(Request $req){
      if ($req->id_role == ''){
         Role::create([
            'nameRole' => $req->nameRole,
            'postby' => auth()->user()->name,
            'postdate' => date('Y-m-d H:i:s')
         ]);
         return response()->json(['success' => true,'result' => 'Insert Successfully']);
      }
      else{
         $data=role::find($req->id_role);
         $data->nameRole=$req->nameRole;
         $data->postby = auth()->user()->name;
         $data->postdate=date('Y-m-d H:i:s');
         $data->save();
         return response()->json(['success' => true,'result' => 'Update Successfully']);
      }
   }
  
      public function show($id_role)
      {
         error_log($id_role);
         $data = Role::find($id_role);
         return response()->json($data);
      }
  
      public function delete($id_role)
      {
         $data=role::find($id_role);
         $data->delete();
         return response()->json(['success' => true,'result' => 'Data Already Deleted']);
      }
}
