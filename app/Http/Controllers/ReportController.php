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
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $columnName_arr2 = json_decode($columnName_arr, true);
        $search_arr = $req->search;

        $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
        $columnOrder = $columnIndex_arr[0]['dir']; // Column index

        $searchValue = $search_arr['value']; // Search value

        // Filter columns
        $filterValue = array_column($columnName_arr2, 'search');

        $dateFromDate = new Carbon(date("Y-m-d"));
        $dateEndDate = new Carbon(date("Y-m-d"));
        $filterDate = array_column($columnName_arr2, 'search');

        if ($filterDate[4]['value'] <> '') {
            //  $dateFromDate=new Carbon(date($filterDate[5]['value']));
            $arrDate = explode(' and ', $filterDate[4]['value']);
            // error_log($arrDate[0]);
            $dateFromDate = new Carbon(date($arrDate[0]));
            $dateEndDate = new Carbon(date($arrDate[1]));
        }

        $visitorName = $filterValue[0]['value'] === 'null' ? '': $filterValue[0]['value'];
        $nik = $filterValue[1]['value'] === 'null' ? '' : $filterValue[1]['value'] ;
        $purpose = $filterValue[2]['value'] === 'null' ? '' :$filterValue[2]['value'] ;
        $host = $filterValue[3]['value'] === 'null' ? '':$filterValue[3]['value'];
        $companyName = $filterValue[6]['value'] ==='null'? '': $filterValue[6]['value'];
        $location = $filterValue[9]['value'] === 'null' ?'': $filterValue[9]['value'];

        error_log('visitor ' . $visitorName);
        error_log('nik ' . $nik);
        error_log('purpose' . $purpose);
        error_log('host ' . $host);
        error_log('companyName ' . $companyName);
        error_log('location ' . $location);
        error_log('from date '.$dateFromDate->toDateTimeString());
        error_log('end date '.$dateEndDate->toDateTimeString());
        // Total records
        $totalRecords = Transaksi::select('count(*) as allcount')->count();
        // $totalRecordswithFilter = Transaksi::select('count(*) as allcount')
        //     ->where('namaVisitor', 'like', '%' . $searchValue . '%')
        //     ->where('purpose', 'like', '%' . $searchValue . '%')
        //     ->where('name', 'like', '%' . $searchValue . '%') 
        //     ->where('nameLocation', 'like', '%' . $searchValue . '%')
        //     ->where('nik', 'like', '%' . $searchValue . '%')

            //   ->whereBetween('timeCheckin',[$dateFromDate->toDateTimeString(),($dateFromDate->addDay())->toDateTimeString()] )
           // ->count();
        $c = DB::select(
            "SELECT Count(*) as c FROM Transaksi 
            WHERE namaVisitor like ? and purpose like ? and nameVendor like ? and [name] like ? and nik like ? and nameLocation like ? 
            and (timeCheckin between ? and ?)",
            ['%' . $visitorName . '%', '%' . $purpose . '%', '%' . $companyName . '%', '%' . $host . '%', '%' . $nik . '%', '%' . $location . '%', $dateFromDate->toDateTimeString(), $dateEndDate->toDateTimeString()]
        ); 
        $totalRecordswithFilter= $c[0]->c;//DB::select("select count(*) as allcount from Transaksi")->count();

        //error_log('Sort ' . $columnName_arr2[$columnOrderIndex]['data'] . ' ' . $columnOrder);

        $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
        
        $records = DB::select(
            "SELECT * FROM Transaksi 
            WHERE namaVisitor like ? and purpose like ? and nameVendor like ? and [name] like ? and nik like ? and nameLocation like ? 
            and (timeCheckin between ? and ?) order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY",
            ['%' . $visitorName . '%', '%' . $purpose . '%', '%' . $companyName . '%', '%' . $host . '%', '%' . $nik . '%', '%' . $location . '%', $dateFromDate->toDateTimeString(), $dateEndDate->toDateTimeString()]
        ); 


        // Today Visitor
        $todayDate = new Carbon(date("Y-m-d"));
        $todayVisitor = Transaksi::select('count(*) as allcount')
            ->whereBetween('timeCheckin', [$todayDate->toDateTimeString(), ($todayDate->addDay())->toDateTimeString()])
            ->count();

        return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $records, 'todayVisitor' => $todayVisitor]);
    }

    
}
