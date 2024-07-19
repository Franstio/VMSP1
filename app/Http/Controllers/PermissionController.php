<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use DB;

class PermissionController extends Controller
{     
   public function __construct()
   {
       $this->middleware('auth');
   } 
   
      public function permission(){
            $data=permission::all();
            return view('permission', ['permission'=>$data]);
           } 
    
       function Add_Permission(Request $req){
        /* return $req; */
        $permission = new Permission;
        $permission->menu=$req->menu;
        $permission->postby = auth()->user()->name;
        $permission->postdate=date('Y-m-d H:i:s');
        $permission->save();
        return redirect()->back()->with('message', 'Add Data Was Succesfully');
       }
        
       function delete_permission($id){
        $data=permission::find($id);
        $data->delete();
        return redirect('permission');
       }

       function showDataPermission($id){
        $data=permission::find($id);

        return view('permissionEdit');
     }
  
        function edit_permission(Request $req){
        $data=permission::find($req->id);
        $data->menu=$req->menu;
        $data->postby=$req->postby;
        $data->postdate=date('Y-m-d H:i:s');
        $data->save();
        
        return redirect('permission');
      
     }
}

