<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Location;
use App\Models\Permit;
use App\Models\Purpose;
use App\Models\Badge;
use DB;

class PermitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function permitImage(Request $req)
    {
        $res = DB::select("Select uploadPermit From Permit where id=?",[$req->id]);
        return response()->json( $res[0]->uploadPermit);
    }
    
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
         $totalRecords = Permit::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Permit::select('count(*) as allcount')->where('nameVendor', 'like', '%' .$searchValue . '%')->count();
        

        // Fetch records
        $records = Permit::join('vendor', 'vendor.nameVendor', '=', 'permit.nameVendor')
        ->where('permit.namaVisitor', 'like', '%' .$searchValue . '%')
        ->orWhere('permit.nameVendor', 'like', '%' .$searchValue . '%')
        ->orWhere('permit.purpose', 'like', '%' .$searchValue . '%')
        ->orWhere('permit.name', 'like', '%' .$searchValue . '%')
        /* ->orWhere('permit.noBadge', 'like', '%' .$searchValue . '%') */
         ->orderby("subDate","asc")
        ->skip($start)
        ->take($rowperpage)
        ->get();
        $vendor=Vendor::all();
        $purpose=Purpose::all();
        $location=Location::all();
       
        $badge=Badge::all();

        return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records ]);
    }

       public function store(Request $req){
      
          if ($req->id =='') { 
           Permit::create([
           'subDate' => date('Y-m-d H:i:s'),
           'nameVendor' => $req->nameVendor,
           'namaVisitor' => $req->namaVisitor,
           'nik' => $req->nik,
           'noBadge' => $req->noBadge,
           'purpose' => $req->purpose,
           'startDate' => $req->startDate,
           'nameLocation' => $req->nameLocation,
           'postby' => auth()->user()->name,
                      
         ]);
        
         return response()->json(['success' => true,'result' => 'Insert Successfully']);
        }
        }
        public function show($id)
        {
            error_log('SHOOOOOOOOW');
            error_log($id);
            $data = Permit::find($id);
            return response()->json($data);
        }

        public function delete($id)
        {
            $data=Permit::find($id);
            $data->delete();
            return response()->json(['success' => true,'result' => 'Data Already Deleted']);
        }
        }
        
?>