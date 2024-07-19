<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Badge;
use App\Models\Type;
use DB;

class BadgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    /* function badge()
    {
        $data = Badge::join('type', 'type.id', '=', 'badge.nameType')
		->get();
        
        $type=Type::all();
    
        return view('badge', compact('data','type'));
       }
    
       function Add_Badge(Request $req){
        
        $badge = new Badge;
        $badge->noBadge=$req->noBadge;
        $badge->Rfid=$req->Rfid;
        $badge->nameType=$req->nameType;
        $badge->status=$req->status;
        $badge->reason=$req->reason;
        $badge->postby = auth()->user()->name;
        $badge->postdate=date('Y-m-d H:i:s');
        $badge->save();
        return redirect()->back()->with('message', 'Add Data Was Succesfully');
       }
        
       function delete_badge($id_badge){
        $data=badge::find($id_badge);
        $data->delete();
        return redirect('badge');
       }

       function showDataBadge($id_badge){
        $data=badge::find($id_badge);

        $datadb = Type::all();
        foreach($datadb as $value){
            $type[$value['id']] = $value;
        }

        return view('badgeEdit', compact('data','type'));
     }
  
        function edit_badge(Request $req){
        $data=badge::find($req->id_badge);
        $data->noBadge=$req->noBadge;
        $data->Rfid=$req->Rfid;
        $data->nameType=$req->nameType;
        $data->status=$req->status;
        $data->reason=$req->reason;
        $data->postby=$req->postby;
        $data->postdate=date('Y-m-d H:i:s');
        $data->save();
        
        return redirect('badge');
      
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
         $totalRecords = Badge::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Badge::select('count(*) as allcount')->where('Rfid', 'like', '%' .$searchValue . '%')->count();
        

        // Fetch records
        /*$records = Badge:://join('type', 'type.nameType', '=', 'badge.nameType')
        where('badge.noBadge', 'like', '%' .$searchValue . '%')
        ->orWhere('badge.nameType', 'like', '%' .$searchValue . '%')
        ->orWhere('badge.Rfid', 'like', '%' .$searchValue . '%')
        ->orWhere('badge.status', 'like', '%' .$searchValue . '%')
        ->orWhere('badge.reason', 'like', '%' .$searchValue . '%')
        ->orWhere('badge.postby', 'like', '%' .$searchValue . '%')
        ->skip($start)
        ->take($rowperpage)
        ->get();*/
        $colOrder = $columnName_arr2[$columnOrderIndex]["data"]=="noBadge" ? "TRY_CAST(b.noBadge as int)" : $columnName_arr2[$columnOrderIndex]["data"];
        $records = DB::select("
        select t.namaVisitor as UsedBy,b.* From badge b left join transaksi t on (b.noBadge=t.noBadge and t.kondisi='checkin') where b.nameType like ? or b.Rfid like ? or b.noBadge like ? or b.status like ? or b.reason like ? or b.postby like ? order by ".$colOrder." ".$columnIndex_arr[0]["dir"] ."  Offset $start rows fetch next $rowperpage rows only
        ",['%'.$searchValue.'%','%'.$searchValue.'%','%'.$searchValue.'%','%'.$searchValue.'%','%'.$searchValue.'%','%'.$searchValue.'%']);


        return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records ]);
    }

    public function store(Request $req){
        if ($req->id_badge ==''){
            Badge::create([
                'Rfid' => $req->Rfid,
                'status' => $req->status,
                'noBadge' => $req->noBadge,
                'nameType' => $req->nameType,
                'reason' => $req->reason,
                'postby' => auth()->user()->name,
                'postdate' => date('Y-m-d H:i:s')
            ]);
            return response()->json(['success' => true,'result' => 'Insert Successfully']);
        } else {
            $data=badge::find($req->id_badge);
            $data->Rfid=$req->Rfid;
            $data->status=$req->status;
            $data->noBadge=$req->noBadge;
            $data->nameType=$req->nameType;
            $data->reason=$req->reason;
            $data->postby = auth()->user()->name;
            $data->postdate=date('Y-m-d H:i:s');
            $data->save();
            return response()->json(['success' => true,'result' => 'Update Successfully']);
        }
    }
    public function show($badge)
    {
       $data = Badge::whereIdBadge($badge)->orWhere('noBadge','=',$badge)->orWhere('rfid','=',$badge)->first();
        return response()->json($data,$data==null  ? 404 : 200);
    }

    public function delete($id_badge)
    {
        $data=badge::find($id_badge);
        $data->delete();
        return response()->json(['success' => true,'result' => 'Data Already Deleted']);
    }
}

