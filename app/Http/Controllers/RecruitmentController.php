<?php

namespace App\Http\Controllers;

use App\Models\Permit;
use Illuminate\Support\Facades\Auth;
use App\Models\RecruitmentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitmentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('recruitment');
    }
    public function getPagination(Request $req)
    {
        $user = Auth::user();
        $empID = $user->empID;
       
        ## Read value
        $draw = $req->draw;
        $start = $req->start;
        $rowperpage = $req->length; // Rows display per page
  
        $columnIndex_arr = $req->order;
        $columnName_arr = $req->columns;
        $columnName_arr2 = json_decode($columnName_arr, true);
        $search_arr = $req->search;
  
        $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
        $columnOrder = $columnIndex_arr[0]['dir']; // Column index
  
        $searchValue = $search_arr['value']; // Search value
  
  
        $totalRecords = DB::select(
           "SELECT COUNT(*) as count FROM recruitment_detail r inner join permit p on r.permitId=p.Id where getdate() between p.startDate and DATEADD(day,1,p.endDate) ",

        )[0]->count;
  
  
        $totalRecordswithFilter = DB::select(
            "SELECT COUNT(*) as count FROM recruitment_detail r inner join permit p on r.permitId=p.Id where getdate() between p.startDate and DATEADD(day,1,p.endDate)  and r.name like ?",
           ['%' . $searchValue . '%']
        )[0]->count;
  
        $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
        $records = DB::select(
           "select row_number() over (partition by permitId order by visitDate desc) as No,r.Name,r.Gender,r.VisitDate,r.permitId FROM recruitment_detail r inner join permit p on r.permitId=p.Id where getdate() between p.startDate and DATEADD(day,1,p.endDate)  and r.name like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
           ['%' . $searchValue . '%']
        );
  
  
        // Update records expired
//         $recordUpdate =DB::table('permit')->where('status', 'waitinghost') ->where('endDate','<',getdate())  ->update(['status' => 'expired']);
        return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $records]);
    }
    public function Create(Request $request)
    {
        $recId = uniqid();
        $usr = Auth::user();
        $host = $usr->username;
        $permit = [
            'subDate' => $request->visitDate,
            'supplyBarang' => '',
            'nameVendor' => '',
            'startDate' => $request->visitDate,
            'endDate' => $request->visitDate,
            'purpose' => 'Recruitment', 
            'nameLocation' => '',
            'permitNo' => str($recId),
            'desk' => '',
            'anggota' => '[{"Nama":"'.$request->name.'","Jabatan":"Recruitment","NIK":""}]',
            'email' => '',
            'name' => $request->name, 
            'bawaBarang' => '',
            'barangBawaan' => '',
            'sign' => '',
            'status' => '',
            'uploadPermit' => '',
            'permit_id' => '',
            'host' => $host,
        ];
        Permit::create($permit);
        $permitRes = Permit::where('permitNo','=',$recId)->first(); 
        
        $data = [
            'permitId'=>$permitRes->id,
            'name' => $request->name,
            'gender'=> $request->gender,
            'visitDate'=> $request->visitDate,
            'photo'=> ''
        ];
        
        DB::table('permit')->where('id', $permitRes->id)->update(['permitNo' => '']);
        RecruitmentDetail::create($data);
        return redirect('/recruitment');
    }
    public function getRecruitment(Request $req)
    {
        
        $user = Auth::user();
        $empID = $user->empID;
       
        ## Read value
        $draw = $req->draw;
        $start = $req->start;
        $rowperpage = $req->length; // Rows display per page
  
        $columnIndex_arr = $req->order;
        $columnName_arr = $req->columns;
        $columnName_arr2 = json_decode($columnName_arr, true);
        $search_arr = $req->search;
  
        $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
        $columnOrder = $columnIndex_arr[0]['dir']; // Column index
  
        $searchValue = $search_arr['value']; // Search value
  
  
        $totalRecords = DB::select(
           "SELECT COUNT(*) as count FROM recruitment_detail r inner join permit p on r.permitId=p.Id left join transaksi t on t.permitID=p.id where getdate() between p.startDate and DATEADD(day,1,p.endDate) ",

        )[0]->count;
  
  
        $totalRecordswithFilter = DB::select(
            "SELECT COUNT(*) as count FROM recruitment_detail r inner join permit p on r.permitId=p.Id left join transaksi t on t.permitId=p.id where    getdate() between p.startDate and DATEADD(day,1,p.endDate)  and r.name like ?",
           ['%' . $searchValue . '%']
        )[0]->count;
  
        $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
        $records = DB::select(
           "select row_number() over (partition by r.permitId order by visitDate desc) as No,r.Name,r.Gender,t.name as Host,r.VisitDate,r.permitId,t.id,t.kondisi FROM recruitment_detail r inner join permit p on r.permitId=p.Id left join transaksi t on t.permitId=p.id where  getdate() between p.startDate and DATEADD(day,1,p.endDate)  and r.name like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
           ['%' . $searchValue . '%']
        );
  
  
        // Update records expired
//         $recordUpdate =DB::table('permit')->where('status', 'waitinghost') ->where('endDate','<',getdate())  ->update(['status' => 'expired']);
        return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $records]);
    }
    public function DeleteRecruitment(Request $req)
    {
        $Id = $req->id;
        DB::table("permit")->where("id",$Id)->delete();

        return response()->json(["msg"=>"data deleted"]);
    }
}