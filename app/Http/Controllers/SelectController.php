<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Type;
use App\Models\Depart;

use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use App\Models\Purpose;
use App\Models\Role;
use App\Models\User;
use App\Models\Badge;
use App\Models\Vest;
use DB;
class SelectController extends Controller
{
   

    public function vendor()
    {
        // Fetch Employees by Departmentid
        $vendor = Vendor::orderby("postdate","asc")
        			->select('id_vendor','nameVendor')
        			->get();
        //$vendor=Vendor::all();
        return response()->json(['success' => true,'data' => $vendor]);
    }

    public function type()
    {
        $type = Type::orderby("postdate","asc")
        			->select('id_type','nameType')
        			->get();
        
        return response()->json(['success' => true,'data' => $type]);
    }

    public function depart()
    {
        $depart = Depart::orderby("postdate","asc")
        			->select('id_depart','nameDepart')
        			->get();
        
        return response()->json(['success' => true,'data' => $depart]);
    }

    public function role()
    {
        $role = Role::orderby("postdate","asc")
        			->select('id_role','nameRole')
        			->get();
        
        return response()->json(['success' => true,'data' => $role]);
    }

    public function purpose()
    {
        $purpose = Purpose::orderby("postdate","asc")
        			->select('id_purpose','purpose')
        			->get();
        
        return response()->json(['success' => true,'data' => $purpose]);
    }

    public function user()
    {
        $user = User::orderby("name","asc")
        			->select('id','name','rfid')
        			->get();
        
        return response()->json(['success' => true,'data' => $user]);
    }
    public function userWithDept()
    {
/*        $user = User::orderby("name","asc")
        			->select('id','name','rfid')
        			->get();*/
        $user = DB::select("Select id,name,rfid From [User] Where nameDepart=(Select nameDepart From [user] where id=?) and id!=?",[Auth::id(),Auth::id()]);
        
        return response()->json(['success' => true,'data' => $user]);
    }

    public function location()
    {
        $location = Location::orderby("nameLocation","asc")
        			->select('id_location','nameLocation')
        			->get();
        
        return response()->json(['success' => true,'data' => $location]);
    }

    public function badge()
    {
        $badge = Badge::orderby("postby","asc")
        			->select('id_badge','noBadge')
        			->get();
        
        return response()->json(['success' => true,'data' => $badge]);
    }
    public function vest()
    {
        $vest = Vest::orderby("postdate","asc")
        			->select('id_vest','noVest')
        			->get();
        
        return response()->json(['success' => true,'data' => $vest]);
    }

  }







