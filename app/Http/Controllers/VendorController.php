<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use DB;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /* public function vendor(){
        $data=vendor::all();
        return view('vendor', ['vendor'=>$data]);
       } 

       function Add_Vendor(Request $req){
        $vendor = new Vendor;
        $vendor->nameVendor=$req->nameVendor;
        $vendor->postby = auth()->user()->name;
        $vendor->postdate=date('Y-m-d H:i:s');
        $vendor->save();
        return redirect()->back()->with('message', 'Add Data Was Succesfully');
     }

     function delete_vendor($id_vendor){
        $data=vendor::find($id_vendor);
        $data->delete();
        return redirect('vendor');
       }
    
    function showDataVendor($id_vendor){
        $data=vendor::find($id_vendor);
        return view('vendorEdit', ['vendor'=>$data]);
     }
  
     function edit_vendor(Request $req){
        $data=vendor::find($req->id_vendor);
        $data->nameVendor=$req->nameVendor;
        $data->postby=$req->postby;
        $data->postdate=date('Y-m-d H:i:s');
        $data->save();
        return redirect('vendor');
     } */

     public function index(Request $req)
   {
    $draw = $req->draw;
    $start = $req->start;
    $rowpage = $req->length;

    $columnIndex_arr = $req->order;
    $columnName_arr = $req->columns;
    $columnName_arr2 = json_decode($columnName_arr,true);
    $search_arr = $req->search;

    $columnOrderIndex = $columnIndex_arr[0]['column']; // Column index
    $searchValue = $search_arr['value'];

    // TOTAL RECORD
    $totalRecords = Vendor::select('count(*) as allcount')->count();
    $totalRecordsFilter = Vendor::select('count(*)as allcount')->where('nameVendor', 'like', '%' .$searchValue. '%')->count();

    $records =  Vendor::where('vendor.nameVendor', 'like', '%' .$searchValue. '%')
    ->skip($start)
    ->take($rowpage)
    ->get();

    return response()->json(['draw'=>$draw, 'recordsTotal'=> $totalRecords, 'recordsFiltered'=> $totalRecordsFilter, 'data' => $records]);

   }

   public function store(Request $req){
    if ($req->id_vendor == ''){
       Vendor::create([
          'nameVendor' => $req->nameVendor,
          'postby' => auth()->user()->name,
          'postdate' => date('Y-m-d H:i:s')
       ]);
       return response()->json(['success' => true,'message' => 'Insert Successfully']);
       
    }
    else{
       $data=vendor::find($req->id_vendor);
       $data->nameVendor=$req->nameVendor;
       $data->postby = auth()->user()->name;
       $data->postdate=date('Y-m-d H:i:s');
       $data->save();
       return response()->json(['success' => true,'result' => 'Update Successfully']);
    }
 }

    public function show($id_vendor)
    {
       error_log($id_vendor);
       $data = Vendor::find($id_vendor);
       return response()->json($data);
    }

    public function delete($id_vendor)
    {
       $data=vendor::find($id_vendor);
       $data->delete();
       return response()->json(['success' => true,'result' => 'Data Already Deleted']);
    }
}

