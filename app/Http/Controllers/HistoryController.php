<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function approvedApproval(Request $req){
        $user = Auth::user();
        $empID=$user->empID;
  
        $draw = $req->draw;
        $start = $req->start;
        $rowperpage = $req->length; // Rows display per page
  
        $columnIndex_arr = $req->order;
        $columnName_arr = $req->columns;
        $columnName_arr2 = json_decode($columnName_arr,true);
        $search_arr = $req->search;
  
        $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
        $columnOrder = $columnIndex_arr[0]['dir']; // Column index
  
        $searchValue = $search_arr['value']; // Search value

         // Total records
         $totalRecords = Permit::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Permit::select('count(*) as allcount')->where('nameLocation', 'like', '%' .$searchValue . '%')->count();
        

       // Fetch records
/*       $records =  Permit::select('*')->where('permit.nameLocation', 'like', '%' .$searchValue . '%')
       ->orWhere('permit.nameVendor', 'like', '%' .$searchValue . '%')
       ->orWhere('permit.purpose', 'like', '%' .$searchValue . '%')
       ->orWhere('permit.email', 'like', '%' .$searchValue . '%')
       ->orWhere('permit.status', 'like', '%' .$searchValue . '%')
       ->skip($start)
       ->take($rowperpage)
       ->get();*/
       $records = DB::select("Select jsoN_value(anggota,'$[0].NIK') as NIK,jsoN_value(anggota,'$[0].Nama') as Nama,* From Permit where nameLocation like ? or nameVendor like ? or purpose like ? or email like ? or status like ? order by Id OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY"
      ,[$searchValue,$searchValue,$searchValue,$searchValue,$searchValue]);
  
        
          // Total records
       // $totalRecords = DB::select('count(*) as allcount from permit where isnull(status,'') like ? and getdate() between startDate and endDate and purpose not like ?')->count();
       $totalRecords = DB::select("SELECT COUNT(*) as count FROM permit where (isnull(status,'') like ? or isnull(status,'') like ? or isnull(status,'') like 'reject' )   and host like ?",
       ['approved','expired',$empID])[0]->count;
  
  
       $totalRecordswithFilter = DB::select("SELECT COUNT(*) as count FROM permit where (isnull(status,'') like ? or isnull(status,'') like ? or isnull(status,'') like 'reject') and host like ? and purpose not like ? and nameLocation like ? and nameVendor like ?",
       ['approved','expired',$empID,'Supply','%' .$searchValue . '%','%' .$searchValue . '%'])[0]->count;
       // $totalRecordswithFilter = DB::select('count(*) as allcount')->where('namaVisitor', 'like', '%' .$searchValue . '%')->count();
      // $totalRecordswithFilter=10;
  
        $sortFieldby=$columnName_arr2[$columnOrderIndex]['data'];
        $records =DB::select("select jsoN_value(anggota,'$[0].NIK') as NIK,jsoN_value(anggota,'$[0].Nama') as Nama,* from permit where (isnull(status,'') like ? or isnull(status,'') like ? or isnull(status,'') like 'reject' ) and host like ? and purpose not like ?  and nameLocation like ? and nameVendor like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
        ['approved','expired',$empID,'Supply','%' .$searchValue . '%','%' .$searchValue . '%']);
      
        $recordUpdate =DB::table('permit')->where('status', 'waitinghost') ->where('endDate','<',getdate())  ->update(['status' => 'expired']);
        return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records, 'recordupdate', $recordUpdate ]);
      }

      public function permitArchiveByUser(Request $req)
      {
          $user = Auth::user();
         ## Read value
          $draw = $req->draw;
          $start = $req->start;
          $rowperpage = $req->length; // Rows display per page
  
          $columnIndex_arr = $req->order;
          $columnName_arr = $req->columns;
          $columnName_arr2 = json_decode($columnName_arr,true);
          $search_arr = $req->search;
  
          $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
          $columnOrder = $columnIndex_arr[0]['dir']; // Column index
  
          $searchValue = $search_arr['value']; // Search value
  
          // Total records
         $totalRecords = DB::select("SELECT COUNT(*) as count FROM permit where isnull(status,'') like ? or isnull(status,'') like ? ) and endDate > getdate() and purpose not like ? and host like ?",
         ['approved','Expired','Supply',$user->empID])[0]->count;
  
         $totalRecordswithFilter = DB::select("SELECT COUNT(*) as count FROM permit where isnull(status,'') like ? or isnull(status,'') like ? ) and endDate > getdate() and host like ? and purpose not like ? and nameLocation like ? and nameVendor like ?",
         ['approved','Expired','Supply',$user->empID,'%' .$searchValue . '%','%' .$searchValue . '%'])[0]->count;
  
          $sortFieldby=$columnName_arr2[$columnOrderIndex]['data'];
         $records =DB::select("select * from permit where isnull(status,'') like ? or isnull(status,'') like ? ) and endDate > getdate() and host like ? and purpose not like ? and nameLocation like ? and nameVendor like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
         ['approved','Expired','Supply',$user->empID,'%' .$searchValue . '%','%' .$searchValue . '%']);
         
         $permit = Permit::orderby("subDdate","desc")
         ->get();

       /*  $records =DB::table('permit')
        ->where('status', 'waitinghost')
        ->update(['status' => 'approved']); */
  
          return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records, 'data' => $permit ]);
      }
  
  
      public function permitById(Request $req)
      {
         $id = $req->id;
         $records =DB::select("select * from permit where id = ?",[$id])[0];
         return response()->json($records);
      }
  
      public function permitMemberById(Request $req)
      {
         $id = $req->id;
         $records =DB::select("select a.nik,b.namaVisitor,b.jabatan,case when b.id is null then 'NO' else 'YES' end as regis,'YES' as covid  from permitMember a left outer join visitor b on a.nik=b.nik where a.permit_id = ?",[$id]);
         return response()->json($records);
      }

      public function permitToolById(Request $req)
      {
         $id = $req->id;
         $records = DB::select("select * from permittool where permit_id = ?", [$id]);
         
         return response()->json($records);
      }

      public function updateStatusById(Request $req)
      {
         error_log($req-> id);
         $data=Permit::find($req-> id);
         $data->status = $req-> status;
         // $data->postdate=date('Y-m-d H:i:s');
         $data->save();
         return response()->json(['success' => true,'result' => 'Update Successfully']);
      } 

      public function store(Request $req){
         $data=Permit::find($req->id);
         $data->nameVendor = $req->nameVendor;
         $data->startDate = $req->startDate;
         $data->endDate = $req->endDate;
         $data->purpose = $req->purpose;
         $data->desk = $req->desk;
         $data->permitNo = $req->permitNo;
         $data->save();
         return response()->json(['success' => true,'result' => 'Update Successfully']);
      } 
      
      
      }
   
   