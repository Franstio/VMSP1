<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Location;
use App\Models\Permitvip;
use App\Models\Purpose;
use App\Models\Badge;
use App\Models\Transaksi;
use Carbon\Carbon;
use DB;
use Auth;
use Illuminate\Support\Facades\App;

class PermitVIPController extends Controller
{
    public function index(Request $req)
    {

        ## Read value
        $status = $req->status ??"";
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

        // Total records
        if (App::isProduction()) {
            $totalRecords = DB::select("SELECT COUNT(*) as count FROM vw_permitVip_today where isnull(status,'') like ? ", [$status])[0]->count;

            $totalRecordswithFilter = DB::select("SELECT COUNT(*) as count FROM vw_permitVip_today where isnull(status,'') like ? ", [$status])[0]->count;

            $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
            $records = DB::select(
                "select * from vw_permitVip_today where isnull(status,'') like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
                ["%".$status."%"]
            );
        }
        else
        {
            $primaryTable = "SELECT id_permit, subDate, nameVendor, namaVisitor,idType, nik, noBadge, purpose, name, startDate, endDate, nameLocation, postby, status, photo FROM permitvip v WHERE (getDate() BETWEEN startDate AND endDate)";
            $totalRecords = DB::select("SELECT COUNT(*) as count FROM ($primaryTable) tbl where isnull(status,'') like ? and (?='' or Not Exists (Select * From Transaksi t where t.PermitID=tbl.id_permit and t.kondisi='checkout' and FORMAT(t.timeCheckin,'dd-MM-yy') = FORMAT(getdate(),'dd-MM-yy') )) ", ["%".$status."%",$status])[0]->count;
            $totalRecordswithFilter = DB::select("SELECT COUNT(*) as count FROM ($primaryTable) tbl where isnull(status,'') like ? and (?='' or Not Exists (Select * From Transaksi t where t.PermitID=tbl.id_permit and t.kondisi='checkout' and FORMAT(t.timeCheckin,'dd-MM-yy') = FORMAT(getdate(),'dd-MM-yy') )) and (nameLocation like ? or nameVendor like ? or namaVisitor like ? or purpose like ?)  ", ["%".$status."%",$status,"%".$searchValue."%","%".$searchValue."%","%".$searchValue."%","%".$searchValue."%"])[0]->count;

            $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'] ?? "subDate";
            $records = DB::select(
                "select * from ($primaryTable) tbl where isnull(status,'') like ? and (?='' or Not Exists (Select * From Transaksi t where t.PermitID=tbl.id_permit and t.kondisi='checkout' and FORMAT(t.timeCheckin,'dd-MM-yy') = FORMAT(getdate(),'dd-MM-yy') )) and (nameLocation like ? or nameVendor like ? or namaVisitor like ? or purpose like ?) order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
                ["%".$status."%",$status,"%".$searchValue."%","%".$searchValue."%","%".$searchValue."%","%".$searchValue."%"]
            );

        }

        // $vendor=Vendor::all();
        // $purpose=Purpose::all();
        // $location=Location::all();

        // $badge=Badge::all();

        //     // Today Visitor
        //    $todayDate=new Carbon(date("Y-m-d"));
        //    $todayVisitor = Permitvip::select('count(*) as allcount')
        //    ->whereBetween('startDate',[$todayDate->toDateTimeString(),($todayDate->addDay())->toDateTimeString()] )
        //    ->count();

        //  return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records,'todayVisitor' =>$todayVisitor ]);
        return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $records]);
    }

    // public function index(Request $req)
    // {
    //     error_log("MASUK");
    // }
    public function store(Request $req)
    {

        if ($req->id_permit == '') {
            Permitvip::create([
                'subDate' => date('Y-m-d H:i:s'),
                'nameVendor' => $req->nameVendor,
                'namaVisitor' => $req->namaVisitor,
                'nik' => $req->nik,
                'noBadge' => $req->noBadge,
                'purpose' => $req->purpose,
                'name' => auth()->user()->name,
                    'startDate' => $req->startDate,
                'endDate' => $req->endDate,
                'nameLocation' => $req->nameLocation,
                'postby' => auth()->user()->name,
                'status' => "WaitingCheckin",
                'photo' => "user.jpg"
            ]);

            return response()->json(['success' => true, 'result' => 'Insert Successfully']);
        } else {
            $data = Permitvip::find($req->id_permit);
            $data->nameVendor = $req->nameVendor;
            $data->namaVisitor = $req->namaVisitor;
            $data->nik = $req->nik;
            $data->noBadge = $req->noBadge;
            $data->purpose = $req->purpose;
            $data->name = $req->name;
            $data->startDate = $req->startDate;
            $data->endDate = $req->endDate;
            $data->postby = auth()->user()->name;
            $data->save();
            return response()->json(['success' => true, 'result' => 'Update Successfully']);
        }
    }

    public function show($id_permit)
    {
        error_log($id_permit);
        $data = Permitvip::find($id_permit);
        return response()->json($data);
    }


    public function delete($id_permit)
    {
        $data = Permitvip::find($id_permit);
        $data->delete();
        return response()->json(['success' => true, 'result' => 'Data Already Deleted']);
    }

    public function updateStatusById(Request $req)
    {
        error_log($req->permit_id);
        $data = Permitvip::find($req->permit_id);
        $data->status = $req->status;
        // $data->postdate=date('Y-m-d H:i:s');
        $data->save();
        return response()->json(['success' => true, 'result' => 'Update Successfully']);
    }

    public function getListPermit(Request $req)
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
           "SELECT COUNT(*) as count FROM permitvip p left join transaksi t on (t.permitID=p.id_permit and (( t.timeCheckIn is null or t.timeCheckout is null ) or (t.timeCheckIn between cast(format(getDate(),'yyyy-MM-dd 00:00:00') as datetime) and cast(format(getDate(),'yyyy-MM-dd 23:59:59') as datetime)  )) ) where getdate() between p.startDate  and DATEADD(day,1,p.endDate) and (kondisi is null or kondisi='checkin'); ",

        )[0]->count;
  
  
        $totalRecordswithFilter = DB::select(
            "SELECT COUNT(*) as count FROM permitvip p left join transaksi t on (t.permitID=p.id_permit and (( t.timeCheckIn is null or t.timeCheckout is null ) or (t.timeCheckIn between cast(format(getDate(),'yyyy-MM-dd 00:00:00') as datetime) and cast(format(getDate(),'yyyy-MM-dd 23:59:59') as datetime)  )) ) where    getdate() between p.startDate and DATEADD(day,1,p.endDate) and (kondisi is null or kondisi='checkin') and  (p.namaVisitor like ? or p.name like ?)",
           ['%' . $searchValue . '%','%'.$searchValue.'%']
        )[0]->count;
  
        $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
        $records = DB::select(
           "select p.nameVendor,p.namaVisitor,p.Nik,p.purpose,p.nameLocation,p.name,id_permit,t.kondisi,t.id from permitvip p left join transaksi t on (t.permitID=p.id_permit and (( t.timeCheckIn is null or t.timeCheckout is null ) or (t.timeCheckIn between cast(format(getDate(),'yyyy-MM-dd 00:00:00') as datetime) and cast(format(getDate(),'yyyy-MM-dd 23:59:59') as datetime))  ) ) where  getdate() between p.startDate and DATEADD(day,1,p.endDate) and (kondisi is null or kondisi='checkin')  and ( p.name like ? or p.namaVisitor like ?)  order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
           ['%' . $searchValue . '%','%'.$searchValue.'%']
        );
  
  
        // Update records expired
//         $recordUpdate =DB::table('permit')->where('status', 'waitinghost') ->where('endDate','<',getdate())  ->update(['status' => 'expired']);
        return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $records]);
    }
    public function CheckIN(Request $req)
    {
        DB::insert("Insert into transaksi(namaVisitor,NIK,purpose,nameVendor,name,temp,timeCheckin,timeCheckout,statusPermit,noVest,zone,nameLocation,kondisi,photo,permitID,barangBawaan,postby,reason) select p.namaVisitor,p.Nik,p.purpose,p.nameVendor,concat(hst.name,':',hst.empID),null,getdate(),null,p.status,123,'',p.nameLocation,'checkin',null,p.id_permit,'',hst.id,''  From PermitVip p inner join [user] hst on p.name=hst.name where p.id_permit=? order by p.id_permit offset 0 rows fetch next 1 rows only",[$req->id_permit]);
        return response()->json(["msg"=>"ok"]);
    }
    public function CheckOUT(Request $data)
    {
        DB::update("Update transaksi set  kondisi='checkout',timeCheckout=getdate() where permitId=? and id=?",[$data->id_permit,$data->id]);
        return response()->json(["msg"=>"ok"]);
    }
}
