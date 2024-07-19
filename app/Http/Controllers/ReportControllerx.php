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
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

class ReportController extends Controller
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

            $searchValue = $search_arr['value']; // Search value

             // Filter columns
             $dateFromDate=new Carbon(date("Y-m-d"));
             $dateEndDate=new Carbon(date("Y-m-d"));
             $filterDate = array_column($columnName_arr2, 'search');

             if ($filterDate[4]['value'] <> '') {
              //  $dateFromDate=new Carbon(date($filterDate[5]['value']));
              $arrDate = explode(' and ', $filterDate[4]['value']);
             // error_log($arrDate[0]);
              $dateFromDate=new Carbon(date($arrDate[0]));
              $dateEndDate=new Carbon(date($arrDate[1]));
             }

            error_log('STR'.$filterDate[0]['value']);
         
            // Total records
            $totalRecords = Transaksi::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Transaksi::select('count(*) as allcount')
            ->where('namaVisitor', 'like', '%' .$searchValue . '%')
            ->where('purpose', 'like', '%' .$searchValue . '%')
            ->where('name', 'like', '%' .$searchValue . '%')
            ->where('nameVendor', 'like', '%' .$searchValue . '%')
            ->where('nameLocation', 'like', '%' .$searchValue . '%')
            ->where('nik', 'like', '%' .$searchValue . '%')
           
         //   ->whereBetween('timeCheckin',[$dateFromDate->toDateTimeString(),($dateFromDate->addDay())->toDateTimeString()] )
            ->count();
           error_log('Sort '.$columnName_arr2[$columnOrderIndex]['data'].' '.$columnOrder); 

           $sortFieldby=$columnName_arr2[$columnOrderIndex]['data'];
           $records =DB::select("SELECT * FROM Transaksi WHERE (namaVisitor like ? and purpose like ? and nameVendor like ? and name like ? and nik like ? and nameLocation like ?) and timeCheckin between ? and ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY",
           ['%' .$searchValue . '%','%' .$searchValue . '%','%' .$searchValue . '%','%' .$searchValue . '%', '%' ,$dateFromDate->toDateTimeString(), ($dateFromDate->addDay())->toDateTimeString(), $dateEndDate->toDateTimeString(), ($dateEndDate->addDay())->toDateTimeString() ]);

               // Today Visitor
               $todayDate=new Carbon(date("Y-m-d"));
               $todayVisitor = Transaksi::select('count(*) as allcount')
               ->whereBetween('timeCheckin',[$todayDate->toDateTimeString(),($todayDate->addDay())->toDateTimeString()] )
               ->count();

               return response()->json(['draw'=>$draw,'recordsTotal'=> $totalRecords,'recordsFiltered'=> $totalRecordswithFilter,'data' => $records,'todayVisitor' =>$todayVisitor ]);
         }

         public function store(Request $req){

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
                'kondisi' => 'checkin',
                'photo' => "user.jpg",
                'bawaBarang' => $req->bawaBarang,
                'barangBawaan' => $req->barangBawaan,
                'postby' => auth()->user()->name
              ]);
              return response()->json(['success' => true,'result' => 'Insert Successfully']);
             }
         }



}
