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
}
