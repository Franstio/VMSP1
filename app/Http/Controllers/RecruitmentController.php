<?php

namespace App\Http\Controllers;

use App\Imports\BatchRecruitment;
use App\Models\Permit;
use Illuminate\Support\Facades\Auth;
use App\Models\RecruitmentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Shared\Date;

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
           "SELECT COUNT(*) as count FROM recruitment_detail r inner join permit p on r.permitId=p.Id inner join [user] host on p.host=host.username where getdate() between p.startDate and DATEADD(day,1,p.endDate) ",

        )[0]->count;
  
  
        $totalRecordswithFilter = DB::select(
            "SELECT COUNT(*) as count FROM recruitment_detail r inner join permit p on r.permitId=p.Id inner join [user] host on p.host=host.username where getdate() between p.startDate and DATEADD(day,1,p.endDate)  and r.name like ?",
           ['%' . $searchValue . '%']
        )[0]->count;
  
        $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
        $records = DB::select(
           "select row_number() over (partition by permitId order by visitDate desc) as No,r.Name,r.Gender,r.VisitDate,r.permitId,host.name as Host FROM recruitment_detail r inner join permit p on r.permitId=p.Id inner join [user] host on p.host=host.username where getdate() between p.startDate and DATEADD(day,1,p.endDate)  and r.name like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
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
        
        return redirect('/recruitment');
    }
    public function CreateBatch(Request $req)
    {
     
        $req->validate([
            'batchUpload' => 'required|mimes:xlsx,xls',
        ]);
        $batchUpload = $req->file('batchUpload');
        $col = Excel::toCollection(new BatchRecruitment, $batchUpload);
        $d = $col->get(0)->toArray();
        if ($d==null)
            return response('',403,[]);
        array_splice($d,0,1);
        $recId = uniqid();
        $usr = Auth::user();
        $host = $usr->username;

        
        foreach ($d as $k)
        {
            if ($k==null || $k[0] == null)
                continue;
            $permit = [
                'subDate' => now()->format("Y-m-d"),
                'supplyBarang' => '',
                'nameVendor' => '',
                'startDate' => Date::excelToDateTimeObject($k[2])->format('Y-m-d 00:00:00'),
                'endDate' => Date::excelToDateTimeObject($k[2])->format('Y-m-d 23:59:59'),
                'purpose' => 'Recruitment', 
                'nameLocation' => '',
                'permitNo' => str($recId),
                'desk' => '',
                'anggota' => "[".'{"Nama":"'.$k[0].'","Jabatan":"Recruitment","NIK":""}'."]",
                'email' => '',
                'name' => $d[0][0], 
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
                'name' => $k[0],
                'gender'=> $k[1],
                'visitDate'=> Date::excelToDateTimeObject($k[2])->format("Y-m-d"),
                'photo'=> ''
            ];
            RecruitmentDetail::create($data);
            DB::table('permit')->where('id', $permitRes->id)->update(['permitNo' => '']);
        }
        return response()->redirectTo("/recruitment");
    }
    public function DownloadSample(Request $req)
    {
        return Storage::download('Template_Recruitment.xlsx');
    }
    public function CheckIN(Request $req)
    {
        DB::insert("Insert into transaksi(namaVisitor,NIK,purpose,nameVendor,name,temp,timeCheckin,timeCheckout,statusPermit,noVest,zone,nameLocation,kondisi,photo,permitID,barangBawaan,postby,reason) select rd.name,'',p.purpose,p.nameVendor,concat(hst.name,':',hst.empID),'37',getdate(),null,p.status,123,'',p.nameLocation,'checkin',null,p.id,p.barangBawaan,p.postby,p.reason  From Permit p  inner join recruitment_detail rd on p.id=rd.permitId inner join [user] hst on p.host=hst.username  where p.id=? order by p.id offset 0 rows fetch next 1 rows only",[$req->permitId]);
        return response()->json(["msg"=>"ok"]);
    }
    public function CheckOUT(Request $data)
    {
        DB::update("Update transaksi set  kondisi='checkout',timeCheckout=getdate() where permitId=? and id=?",[$data->permitId,$data->id]);
        return response()->json(["msg"=>"ok"]);
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
           "SELECT COUNT(*) as count FROM recruitment_detail r inner join permit p on r.permitId=p.Id left join transaksi t on t.permitID=p.id where getdate() between p.startDate  and DATEADD(day,1,p.endDate) and  (kondisi is null or kondisi='checkin'); ",

        )[0]->count;
  
  
        $totalRecordswithFilter = DB::select(
            "SELECT COUNT(*) as count FROM recruitment_detail r inner join permit p on r.permitId=p.Id left join transaksi t on t.permitId=p.id  where    getdate() between p.startDate and DATEADD(day,1,p.endDate) and (kondisi is null or kondisi='checkin')  and r.name like ?",
           ['%' . $searchValue . '%']
        )[0]->count;
  
        $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
        $records = DB::select(
           "select row_number() over (partition by r.permitId order by visitDate desc) as No,r.Name,r.Gender,host.name as Host,r.VisitDate,r.permitId,t.id,t.kondisi FROM recruitment_detail r inner join permit p on r.permitId=p.Id left join transaksi t on t.permitId=p.id left join [user] host on p.host=host.username where  getdate() between p.startDate and DATEADD(day,1,p.endDate) and (kondisi is null or kondisi='checkin')  and r.name like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
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
