<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Depart;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DB;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getHosts()
    {
        $records = DB::select("Select empid,name From [User] where nameRole='Host';");
        return response()->json($records);
    }
 /*    function user()
    {
             
        $data = User::join('depart', 'depart.id_depart', '=', 'user.nameDepart')
        ->join('role', 'role.id', '=', 'user.nameRole')
        ->orderBy("created_at", "desc")
        ->get();
        
        $datadb = Depart::all();
        foreach($datadb as $value){
            $depart[$value['id_depart']] = $value;
        }

        $datadb = Role::all();
        foreach($datadb as $value){
            $role[$value['id']] = $value;
        }

        return view('staff', compact('data','depart','role'));
    }
    
      public function add_user(Request $req){
        
            $messages = ['empID' => 'Employee ID is exist'];
        

            $user = $req->validate([
                'name' => 'required',
                'username' => 'required|unique:user',
                'empID' => 'required|unique:user',
                'Rfid' => 'required',
                'nameDepart' => 'required',
                'nameRole' => 'required',
                'email' => 'required|unique:user',
                'photo' => 'required',

            ],$messages);
             
           
            $file = $req->hasFile('photo');
            if($file){
             $newFile = $req->file('photo');
             $file_path = $newFile->store('images');
             Storage::delete($req->photo);
             User::create([
                'name' => $req->name,
                'username' => $req->username,
                'password' => Hash::make('abcd1234'),
                'empID' => $req->empID,
                'Rfid' => $req->Rfid,
                'nameDepart' => $req->nameDepart,
                'nameRole' => $req->nameRole,
                'email' => $req->email,
                'photo' => $file_path,
                'postby' => auth()->user()->name,
                'created_at' => date('Y-m-d H:i:s')
                               
             ]);
                return redirect('staff');
            }
    }
        
       function delete_user($id){
        $data=user::find($id);
        $data->delete();
        return redirect('staff');
    }

        function showDataUser($id){          
        $data=user::find($id);
        return view('staffEdit', ['user'=>$data]);
    }
  
        function edit_user(Request $req){
        $data=user::find($req->id);
        $data->name=$req->name;
        $data->username=$req->username;
        $data->password=$req->password;
        $data->empID=$req->empID;
        $data->Rfid=$req->Rfid;
        $data->nameDepart=$req->nameDepart;
        $data->nameRole=$req->nameRole;
        $data->email=$req->email;
        $data->photo=$req->photo;
        $data->postby=$req->postby;
        $data->updated_at=date('Y-m-d H:i:s');
        $data->save();
        return redirect('staff');
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
          $totalRecords = User::select('count(*) as allcount')->count();
         $totalRecordswithFilter = User::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
         
 
         // Fetch records
         $records = User::join('depart', 'depart.nameDepart', '=', 'user.nameDepart')
        // ->join('role', 'role.nameRole', '=', 'user.nameRole')
        ->orderBy("user.".$columnName_arr2[$columnOrderIndex]["data"],$columnIndex_arr[0]["dir"])
         //->orderby("created_at  ","desc")
         ->where('user.name', 'like', '%' .$searchValue . '%')
         ->orWhere('user.username', 'like', '%' .$searchValue . '%')
         ->orWhere('user.empID', 'like', '%' .$searchValue . '%')
         ->orWhere('user.nameDepart', 'like', '%' .$searchValue . '%')
         ->orWhere('user.nameRole', 'like', '%' .$searchValue . '%')
             
         ->skip($start)
         ->take($rowperpage)
         ->get();
  
        $depart=Depart::all();
        $role=Role::all();
 
         return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records ]);
     }
 
     public function store(Request $req)
     {
         /* $messages = ['empID' => 'Employee ID is exist']; 
        

         $user = $req->validate([
            'name' => 'required',
            'username' => 'required|unique:user',
            'empID' => 'required|unique:user',
            'Rfid' => 'required',
            'nameDepart' => 'required',
            'nameRole' => 'required',
            'email' => 'required|unique:user',
        ],$messages);   */


         if ($req->id =='') {
          User::create([
             'name' => $req->name,
             'username' => $req->username,
             'password' => Hash::make('abcd1234'),
             'empID' => $req->empID,
             'Rfid' => $req->Rfid,
             'nameDepart' => $req->nameDepart,
             'nameRole' => $req->nameRole,
             'email' => $req->email,
             'photo' => "user.jpg",
             'postby' => auth()->user()->name,
             'created_at' => date('Y-m-d H:i:s')
          ]);
          return response()->json(['success' => true,'result' => 'Insert Successfully']);
         } else {
                 $data=user::find($req->id);
                 $data->name=$req->name;
                 $data->username=$req->username;
                 $data->empID=$req->empID;
                 $data->Rfid=$req->Rfid;
                 $data->nameDepart=$req->nameDepart;
                 $data->nameRole=$req->nameRole;
                 $data->email=$req->email;
                 $data->postby=auth()->user()->name;
                 $data->created_at=date('Y-m-d H:i:s');
                 $data->save();
                 return response()->json(['success' => true,'result' => 'Update Successfully']);
         }
      
     }
 
      public function show($id)
      {
         error_log($id);
          $data = User::find($id);
          return response()->json($data);
      }
 
      public function delete($id)
      {
          $data=user::find($id);
          $data->delete();
          return response()->json(['success' => true,'result' => 'Data Already Deleted']);
      }
 
      public function storeImage(Request $req){
       // $file = $req->hasFile('photo');
        $base64_str = substr($req->photo, strpos($req->photo, ",")+1);
        $file = base64_decode($base64_str);//$req['photo']);
       if($file){
 
         $safeName = $req->empID.'.png';
         file_put_contents(public_path().'/storage/'.$safeName, $file);
         error_log(public_path().'/storage/'.$safeName);
 
         $data=user::find($req->id);
             $data->photo=$req->empID.'.png';
             $data->postby = auth()->user()->name;
             $data->created_at=date('Y-m-d H:i:s');
             $data->save();
             return response()->json(['success' => true,'result' => 'Update Successfully']);
 
       } else {
         return response()->json(['success' => false,'result' => 'Something Wrong !']);
       }
 
    }
 

    public function password()
    {
       $data['title'] = 'Change password';
       $data["handover"] = DB::select("Select t.Name From [user] u inner join [user] t on u.takeover=t.rfid where u.id=?",[Auth::id()]);
       return view('usersetting', $data);
    }
    public function handover(Request $req)
    {
        DB::update("Update [user] set takeover=? where id=?",[$req->rfid,Auth::id()]);
        return redirect("/usersetting");
    }
    public function handoverReset(Request $req)
    {
        DB::update("Update [user] set takeover=NULL where id=?",[Auth::id()]);
        return redirect("/usersetting");
    }
    public function usersetting(Request $request)
    {
       $request->validate([
          /*  'old_password' => 'required|current_password', */
           'new_password' => 'required|confirmed'
       ]);
       $user = User::find(Auth::id());
       $user->password = Hash::make($request->new_password);
       $user->save();
       $request->session()->regenerate();
       return redirect('usersetting')->with('success', 'Password Change!');
    }
}
