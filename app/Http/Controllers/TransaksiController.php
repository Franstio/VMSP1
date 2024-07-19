<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Location;
use App\Models\Badge;
use App\Models\Vest;
use App\Models\User;
use App\Models\Purpose;
use App\Models\Transaksi;
use App\Models\Permit;
use App\Models\Visitor;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


         public function index(Request $req)
         {
            DB::enableQueryLog();
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

              $searchValue = $search_arr['value'] ?? ""; // Search value



             // Filter columns

             $dateFromDate=new Carbon(date("Y-m-d"));
             $filterDate = array_column($columnName_arr2, 'search');
             if ($filterDate[5]['value'] <> '') {
                $dateFromDate=new Carbon(date($filterDate[5]['value']));
             }

              $filterCondition='%';

            //  $filterString = array_column($columnName_arr2, 'search');
            //  if ($filterDate[0]['value'] <> '') {
            //     $filterCondition=$filterString[0]['value'];
            //  }

            $filterCondition=$req->status ?? "check";
            // Total records
             $totalRecords = Transaksi::select('count(*) as allcount')->count();
             $totalRecordswithFilter = Transaksi::select('count(*) as allcount')
             ->orderby("timeCheckin","desc")
             ->where('namaVisitor', 'like', '%' .$searchValue . '%')
             ->where('purpose', 'like', '%' .$searchValue . '%')
             ->where('name', 'like', '%' .$searchValue . '%')
             ->where('nameVendor', 'like', '%' .$searchValue . '%')
             ->where('kondisi', 'like', '%' .$filterCondition . '%')
             ->where('kondisi','like','%checkout%')
             ->whereBetween('timeCheckin',[$dateFromDate->toDateTimeString(),($dateFromDate->copy()->addDay())->toDateTimeString()] )
             ->count();
            error_log('Sort '.$columnName_arr2[$columnOrderIndex]['data'].' '.$columnOrder);
               

            $sortFieldby=$columnName_arr2[$columnOrderIndex]['data'];
            $records =DB::select("SELECT *,'Visit History' as visitHistory FROM Transaksi WHERE ( purpose like ? or namaVisitor like ? or noBadge like ? or nameVendor like ? or name like ? ) and kondisi like ? and timeCheckin between ? and ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
            ['%'.$searchValue.'%','%' .$searchValue . '%','%' .$searchValue . '%','%' .$searchValue . '%','%' .$searchValue . '%', '%' .$filterCondition . '%',$dateFromDate->toDateTimeString(), ($dateFromDate->copy()->addDay())->toDateTimeString()]);


             // Today Visitor
             $todayDate=new Carbon(date("Y-m-d"));
             $todayVisitor = Transaksi::select('count(*) as allcount')
             ->whereBetween('timeCheckin',[$todayDate->toDateTimeString(),($todayDate->copy()->addDay())->toDateTimeString()] )
             ->count();

             return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records,'todayVisitor' =>$todayVisitor ]);
         }

         public function store(Request $req){

            $barangBawaan = [
               'jenisMedia' => $req->jenisMedia,
               'SN' => $req->sn
             ];
             if ($req->id =='') {
              Transaksi::create([
                'nik' => $req->nik,
                'namaVisitor' => $req->namaVisitor,
                'purpose' => $req->purpose,
                'nameVendor' => $req->nameVendor,
                'name' => $req->name,
                'temp' => $req->temp,
                'timeCheckin' => date('Y-m-d H:i:s'),
                'nameLocation' => $req->nameLocation,
                'noBadge' => $req->noBadge,
                'noVest' => $req->noVest,
                'kondisi' => "checkin",
                'photo' => "user.jpg",
                'barangBawaan' => $req->bawaBarang=="TIDAK" ? "" :  json_encode($barangBawaan),
                
                'postby' => auth()->user()->id
              ]);
              return response()->json(['success' => true,'result' => 'Insert Successfully']);
             }
         }
         public function storeBadge(Request $req)
         {
            if ($req->id == '') {
               Transaksi::create([
                  'noBadge' => $req->noBadge,
                  'noVest' => $req->noVest,
                  
               ]);
               return response()->json(['success' => true, 'message' => 'Insert Successfully']);
            } else {
               $data = Transaksi::find($req->id);
               $data->noBadge = $req->noBadge;
               $data->noVest = $req->noVest;
               $data->save();
               return response()->json(['success' => true, 'result' => 'Update Successfully']);
            }
         }
      
         public function show(Request  $req)
         {
            error_log('show');
            error_log($req->id);
            $data = Transaksi::find($req->id);
            
            // $data->nameLocation=$req->nameLocation;
            return response()->json($data);
         }

         public function updateReject(Request  $req)
         {
            error_log('updateReject');
            error_log($req->id);
               $data = Transaksi::find($req->id);
               $data->reason = $req->reason;
               $data->kondisi= "reject";
               $data->save();
              return response()->json(['success' => true, 'result' => 'Update Successfully']);
           
           
            }
         
            public function checkPermitByRfid (Request $req) {
               error_log($req->id);
               $records =DB::select("SELECT a.id,a.purpose,a.rfid,b.typeVisitor,a.namaVisitor,b.photo as photoVisitor,b.nik as nikVisitor,b.nameVendor,c.name as hostName,c.empID as hostId,c.nameDepart as hostDept,c.photo as hostPhoto,a.noBadge,a.name,c.rfid as rfidhost,c.takeover as rfidtakeover FROM Transaksi a left outer join visitor b on a.nik=b.nik left outer join [user] c on a.name=concat(c.name,':',c.EmpId) WHERE a.kondisi like ? and a.rfid like ? ",    
               ['waitinglist',$req->id]);
               
                return $records == null ? response('No Host Detected',404) : response()->json( $records[0]);
            }
            public function getHostByRfid(Request $req)
            {
                $records = DB::select("Select name as hostName,empId as hostId,nameDepart as hostDept, photo as hostPhoto from [user] where rfid=?",
                [$req->rfid]);
                return $records == null ? response('No Host Detected',404) : response()->json( $records[0]);
            }
            public function updateTransaksiToCheckin(Request  $req)
            {
               error_log('updateTransaksiToCheckin');
               error_log($req->id);
                  $data = Transaksi::find($req->id);
                  $data->kondisi = "checkin";
                  $data->save();
                 return response()->json(['success' => true, 'result' => 'Update Successfully']);
              
              
               }
        public function UpdateTransaksiBadge(Request $Request)
        {
            $id = $Request->id;
            $badgeID = $Request->badgeId;
            $badgeNo = $Request->noBadge;
            $badgeRfid = $Request->rfid;
            DB::update('Update Transaksi set noBadge=?,Rfid=? Where id=?', [$badgeNo,$badgeRfid,$id]);
            DB::update("Update Badge set status='used' where id_badge=?",[$badgeID]);
            return response('ok',200);
        }
         public function dashboard(Request $req)
         {

             // Today Visitor
             $todayDate=new Carbon(date("Y-m-d"));
             $todayCheckin = Transaksi::select('count(*) as allcount')
             ->where('kondisi', 'like', 'checkin')
             ->whereBetween('timeCheckin',[$todayDate->toDateTimeString(),($todayDate->addDay())->toDateTimeString()] )
             ->count();

             $todayDate=new Carbon(date("Y-m-d"));
             $todayCheckout = Transaksi::select('count(*) as allcount')
             ->where('kondisi', 'like', 'checkout')
             ->whereBetween('timeCheckout',[$todayDate->toDateTimeString(),($todayDate->addDay())->toDateTimeString()] )
             ->count();

             $todayDate=new Carbon(date("Y-m-d"));
             $todayVisitor = Transaksi::select('count(*) as allcount')
             ->whereBetween('timeCheckin',[$todayDate->toDateTimeString(),($todayDate->addDay())->toDateTimeString()] )
             ->count();

             $thisMonth = date('m', strtotime($todayDate));
             $thisYear = date('Y', strtotime($todayDate));
             error_log('MONTH '.$thisYear);
             $thisMonthVisitor = Transaksi::select('count(*) as allcount')
             //->whereBetween('timeCheckin',[$todayDate->toDateTimeString(),($todayDate->addDay())->toDateTimeString()] )
             ->whereMonth('timeCheckin', '=', $thisMonth)
             ->whereYear('timeCheckin', '=', $thisYear)
             ->count();


             $todayDate->modify('last month');
             $lastYear = date('Y', strtotime($todayDate));
             $lastMonth = date('m', strtotime($todayDate));

             $lastMonthVisitor = Transaksi::select('count(*) as allcount')
             //->whereBetween('timeCheckin',[$todayDate->toDateTimeString(),($todayDate->addDay())->toDateTimeString()] )
             ->whereMonth('timeCheckin', '=', $lastMonth)
             ->whereYear('timeCheckin', '=', $lastYear)
             ->count();

             return response()->json(['checkin'=>$todayCheckin,'checkout'=> $todayCheckout,'todayvisitor'=> $todayVisitor,'thismonthvisitor' => $thisMonthVisitor,'lastmonthvisitor' =>$lastMonthVisitor ]);
         }

         public function getWaitingList(request $req)
         {
            $todayDate=new Carbon(now());

            $todayWaiting = DB::table('transaksi')
             ->where('kondisi', 'like', 'waitinglist')
             ->whereRaw("CAST(timeCheckin as date)= '$todayDate'")
             ->get();
            return response()->json(['waitinglist'=>$todayWaiting]);
  
         }

         public function rejectlist(request $req)
         {  
            $todayDate=new Carbon(now());

            $todayReject = DB::table('transaksi')
             ->where('kondisi', 'like', 'reject')
             ->whereRaw("CAST(timeCheckin as date)= '$todayDate'")
             ->get();
            return response()->json(['reject'=>$todayReject]);
         
         }

         public function editReject(Request  $req)
         {
            error_log('editReject');
            error_log($req->id);
               $data = Transaksi::find($req->id);
               $data->reason = $req->reason;
               $data->save();
              return response()->json(['success' => true, 'result' => 'Update Successfully']);
           
           
            }

            public function getVisitor(Request $request)
            {
               $data = $request->json()->all();
               $nik = $data['nik'];
               
               $visitor = Visitor::where('nik', $nik)->first();
               
               if (!$visitor) {
                     return response()->json(['error' => 'Visitor not found'], 404);
               }

               $responseData = [
                     'id' => $visitor->id,
                     'nik' => $visitor->nik,
                     'nama' => $visitor->nama,
                     'company' => $visitor->namaVendor,
                     'photo' => $visitor->photo,
               ];
               
               return response()->json($responseData);
            }

            public function getcheckindata(Request $request)
            {
                $data = $request->json()->all();
                $dataQ = [];
        
                if (strpos($data['qr'], ':') !== false) {
                    list($permitId, $nik) = explode(':', $data['qr']);
        
                    $transaksi = Transaksi::where('nik', $nik)->orderBy('id', 'desc')->first();
                    $permit = Permit::find($permitId);
        
                    if (strpos($permit->anggota, $nik) !== false && $permit->status == 'approved') {
                        $visitor = Visitor::where('nik', $nik)->first();
                        $host = explode(':', $permit->host)[1];
                        $user = User::where('empID', $host)->first();
        
                        if ($transaksi) {
                            if ($transaksi->status == 'checkout') {
                                $badge = Badge::where('status', 'free')->orderBy('id', 'asc')->first();
        
                                $dataQ['nama'] = $visitor->nama;
                                $dataQ['nik'] = $visitor->nik;
                                $dataQ['purpose'] = $permit->purpose;
                                $dataQ['company'] = $permit->namaVendor;
                                $dataQ['host'] = $user->empID;
                                $dataQ['statusPermit'] = $permit->status;
                                $dataQ['badge'] = $badge ? $badge->no : '0';
                                $dataQ['photo'] = $visitor->photo;
                                $dataQ['qr'] = $data['qr'];
        
                                return response()->json($dataQ);
                            } else {
                                $dataT['status'] = $transaksi->status;
                                $dataT['nik'] = $nik;
        
                                return response()->json($dataT);
                            }
                        }
        
                        $badge = Badge::where('status', 'free')->orderBy('id', 'asc')->first();
        
                        $dataQ['nama'] = $visitor->nama;
                        $dataQ['nik'] = $visitor->nik;
                        $dataQ['purpose'] = $permit->purpose;
                        $dataQ['company'] = $permit->namaVendor;
                        $dataQ['host'] = $user->empID;
                        $dataQ['statusPermit'] = $permit->status;
                        $dataQ['badge'] = $badge ? $badge->no : '0';
                        $dataQ['photo'] = $visitor->photo;
                        $dataQ['qr'] = $data['qr'];
        
                        return response()->json($dataQ);
                    }
                }
        
                return response()->json($dataQ);
            }
                  
            public function savetotransaksicheckin(Request $request)
            {
                $data = json_decode($request->getContent(), true);
            
                $qr = explode(':', $data['qr']);
                $permitId = $qr[0];
                $nik = $qr[1];
            
                $visitor = Visitor::where('nik', $nik)->first();
                $badge = Badge::where('no', $data['badge'])->first();
                $badge->status = 'used';
                $badge->save();
            
                $permit = Permit::find($permitId);
            
                $dataTransaksi = [
                    'namaVisitor' => $visitor->nama,
                    'nik' => $nik,
                    'purpose' => $permit->purpose,
                    'vendor' => $permit->namaVendor,
                    'host' => $permit->host,
                    'timeCheckin' => $data['time'],
                    'statusPermit' => $permit->status,
                    'badge' => $data['badge'],
                    'status' => 'waiting',
                    'location' => $permit->location,
                    'photo' => $visitor->photo,
                    'permitID' => $permitId,
                    'barangBawaan' => ""
                ];
            
                if ($permit->bawaBarang === "YA") {
                    $barangBawaan = json_decode($permit->barangBawaan, true);
            
                    $cekNik = array_column($barangBawaan, 'NIK');
                    $no = array_search($nik, $cekNik);
            
                    if ($no !== false) {
                        $BB = $barangBawaan[$no]['Jenis Media'];
                        $BB = substr_count($BB, 'Laptop');
                        if ($BB === 1) {
                            $dataTransaksi['barangBawaan'] = "Laptop";
                        }
                    }
                }
            
                $transaksi = new Transaksi($dataTransaksi);
                $transaksi->save();
            
                return response()->json([]);
            }
            public function breakIn(Request $req)
            {
                $query= "select t.id as transaksiId,t.kondisi,t.noBadge,v.photo as photoVisitor,v.namaVisitor,v.nameVendor,v.nik,h.rfid as hostRfid,h.name as nameHost,h.nameDepart as EE,h.empID as hostId,h.photo as hostPhoto,o.rfid as takeOverRfid,o.name as takeOverName,o.empID as takeOverId,o.nameDepart as takeOverDepart,o.photo as takeOverPhoto From transaksi t inner join visitor v on t.nik=v.nik  
                right join [user] h on concat(h.name,':',h.username)=t.name left join [user] o on h.takeover=o.rfid  where t.kondisi in ('checkin','break-in') and t.rfid=?";
                $records = DB::select($query, [$req->rfid]);
                if ( $records == null || count($records) < 1)
                    return response(404);
                return response()->json(["data"=>$records[0]]);
            }
            public function breakConfirm(Request $req)
            {                
                $query= "select t.id as transaksiId,t.kondisi,t.noBadge,v.photo as photoVisitor,v.namaVisitor,v.nameVendor,v.nik,h.rfid as hostRfid,h.name as nameHost,h.nameDepart as EE,h.empID as hostId,h.photo as hostPhoto,o.rfid as takeOverRfid,o.name as takeOverName,o.empID as takeOverId,o.nameDepart as takeOverDepart,o.photo as takeOverPhoto From transaksi t inner join visitor v on t.nik=v.nik  
                right join [user] h on concat(h.name,':',h.username)=t.name left join [user] o on h.takeover=o.rfid  where t.kondisi  in ('checkin','break-in') and t.id=? and (h.rfid=? or o.rfid=?)";
                $records = DB::select($query, [$req->id,$req->rfid,$req->rfid]);
                if ( $records == null || count($records)<1)
                    return response('',404);
                $status = $records[0]->kondisi;
                $toBreak = $status=='checkin';
                $status = $toBreak ? 'break-in' : 'checkin'; 
                $column = $toBreak ? 'timeBreakIn' : 'timeBreakOut';
                DB::update("Update Transaksi set kondisi=?,$column=getdate() where id=?",[$status,$req->id]);
                return response()->json(["kondisi"=>$toBreak  ? "Break" : "Checkin"]);
            }
}




