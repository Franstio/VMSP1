<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;
use DB;

class VisitorController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function visitorByNik(Request $req)
  {
    $records = DB::select("SELECT DISTINCT NIK FROM VISITOR WHERE NIK LIKE ? Order By NIK ASC OFFSET   0 ROWS FETCH NEXT 10 ROWS ONLY",[$req->nik."%"]);
    return response()->json($records);     
  }
  public function getVisitorByNik(Request $req)
  {
    $record = DB::select("SELECT * FROM VISITOR WHERE NIK=? ORDER BY NIK OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY",[$req->nik]);
    return response()->json($record);
  }

  public function index(Request $req)
  {

    ## Read value
    $draw = $req->draw;
    $start = $req->start;
    $rowperpage = $req->length; // Rows display per page

    $columnIndex_arr = $req->order;
    $columnName_arr = $req->columns;
    $columnName_arr2 = json_decode($columnName_arr, true);
    $search_arr = $req->search;

    $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
    $searchValue = $search_arr['value']; // Search value

    // Total records
    $totalRecords = Visitor::select('count(*) as allcount')->count();
    $totalRecordswithFilter = Visitor::select('count(*) as allcount')->where('namaVisitor', 'like', '%' . $searchValue . '%')->count();


    // Fetch records
    $records = Visitor::join('vendor', 'vendor.nameVendor', '=', 'visitor.nameVendor') //::orderBy($columnName,$columnSortOrder)
      ->where('visitor.namaVisitor', 'like', '%' . $searchValue . '%')
      ->orWhere('visitor.nik', 'like', '%' . $searchValue . '%')
      ->orWhere('visitor.nameVendor', 'like', '%' . $searchValue . '%')
      ->orWhere('visitor.jabatan', 'like', '%' . $searchValue . '%')
      ->orWhere('visitor.typeVisitor', 'like', '%' . $searchValue . '%')
      ->orderBy("visitor.".$columnName_arr2[$columnOrderIndex]["data"], $columnIndex_arr[0]["dir"])
      //  ->select('employees.*')
      ->skip($start)
      ->take($rowperpage)
      ->get();
    $vendor = Vendor::all();
    $col = $columnName_arr2[$columnOrderIndex]["data"];
    $s = $columnIndex_arr[0]["dir"];
    return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $records]);
  }

  public function store(Request $req)
  {

    $data = ['nik' => 'NIK is exist'];

    /*       $visitor = $req->validate([
        'namaVisitor' => 'required',
        'nik' => 'required|unique:visitor',
         ]);
        return response()->json(['failed' => true,'result' => 'Nama Visitor has already been taken']); */

    if ($req->id == '') {
      Visitor::create([
        'date' => date('Y-m-d H:i:s'),
        'nameVendor' => $req->nameVendor,
        'asalVendor' => $req->asalVendor,
        'email' => $req->email,
        'namaVisitor' => $req->namaVisitor,
        'nik' => $req->nik,
        'gender' => $req->gender,
        'jabatan' => $req->jabatan,
        'typeVisitor' => $req->typeVisitor,
        'photo' => "user.jpg",
        'postby' => auth()->user()->name,
        'postdate' => date('Y-m-d H:i:s'),
        'q1' => 'TIDAK',
        'q2' => 'TIDAK',
        'q3' => 'TIDAK',
        'q4' => 'TIDAK',
        'q5' => 'TIDAK',
        'q6' => 'TIDAK',
      ]);
      return response()->json(['success' => true, 'result' => 'Insert Successfully']);
    } else {
      $data = visitor::find($req->id);
      $data->nameVendor = $req->nameVendor;
      $data->asalVendor = $req->asalVendor;
      $data->email = $req->email;
      $data->namaVisitor = $req->namaVisitor;
      $data->nik = $req->nik;
      $data->gender = $req->gender;
      $data->jabatan = $req->jabatan;
      $data->typeVisitor = $req->typeVisitor;
      $data->postby = auth()->user()->name;
      $data->postdate = date('Y-m-d H:i:s');
      $data->save();
      return response()->json(['success' => true, 'result' => 'Update Successfully']);
    }
    //  return redirect('visitor');
    // }


    // error_log($req);
    // return response()->json(['status' => "success"]);
  }

  public function show($id)
  {
    error_log($id);
    $data = Visitor::find($id);
    return response()->json($data);
  }

  public function delete($id)
  {
    $data = visitor::find($id);
    $data->delete();
    return response()->json(['success' => true, 'result' => 'Data Already Deleted']);
  }

  public function storeImage(Request $req)
  {
    // $file = $req->hasFile('photo');
    $base64_str = substr($req->photo, strpos($req->photo, ",") + 1);
    $file = base64_decode($base64_str); //$req['photo']);
    if ($file) {

      $safeName = $req->nik . '.png';
      file_put_contents(public_path() . '/storage/' . $safeName, $file);
      error_log(public_path() . '/storage/' . $safeName);

      $data = visitor::find($req->id);
      $data->photo = $req->nik . '.png';
      $data->postby = auth()->user()->name;
      $data->postdate = date('Y-m-d H:i:s');
      $data->save();
      return response()->json(['success' => true, 'result' => 'Update Successfully']);
    } else {
      return response()->json(['success' => false, 'result' => 'Something Wrong !']);
    }
  }
}
