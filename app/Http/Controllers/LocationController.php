<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use DB;

class LocationController extends Controller
{ 
   public function __construct()
   {
       $this->middleware('auth');
   }
   
   /*  public function location(){
        $data=location::all();
        return view('location', ['location'=>$data]);
       } 

       function Add_Location(Request $req){
        $location = new Location;
        $location->nameLocation=$req->nameLocation;
        $location->zone=$req->zone;
        $location->postby = auth()->user()->name;
        $location->postdate=date('Y-m-d H:i:s');
        $location->save();
        return redirect()->back()->with('message', 'Add Data Was Succesfully');
     }

     function delete($id){
        $data=location::find($id);
        $data->delete();
        return redirect('location');
       }
     
     function edit_location(Request $req){
        $data=location::find($req->id);
        $data->nameLocation=$req->nameLocation;
        $data->zone=$req->zone;
        $data->postby = auth()->user()->name;
        $data->postdate=date('Y-m-d H:i:s');
        $data->save();
        return redirect('location');
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
      $totalRecords = Location::select('count(*) as allcount')->count();
      $totalRecordsFilter = Location::select('count(*)as allcount')->where('nameLocation', 'like', '%' .$searchValue. '%')->count();

      $records =  Location::where('location.nameLocation', 'like', '%' .$searchValue. '%')
      ->skip($start)
      ->take($rowpage)
      ->get();

      return response()->json(['draw'=>$draw, 'recordsTotal'=> $totalRecords, 'recordsFiltered'=> $totalRecordsFilter, 'data' => $records]);

     }

     public function store(Request $req){
      if ($req->id_location == ''){
         Location::create([
            'nameLocation' => $req->nameLocation,
            'zone' => $req->zone,
            'postby' => auth()->user()->name,
            'postdate' => date('Y-m-d H:i:s')
         ]);
         return response()->json(['success' => true,'result' => 'Insert Successfully']);
      }
      else{
         $data=location::find($req->id_location);
         $data->nameLocation=$req->nameLocation;
         $data->zone=$req->zone;
         $data->postby = auth()->user()->name;
         $data->postdate=date('Y-m-d H:i:s');
         $data->save();
         return response()->json(['success' => true,'result' => 'Update Successfully']);
      }
   }

      public function show($id_location)
      {
         error_log($id_location);
         $data = Location::find($id_location);
         return response()->json($data);
      }

      public function delete($id_location)
      {
         $data=location::find($id_location);
         $data->delete();
         return response()->json(['success' => true,'result' => 'Data Already Deleted']);
      }
     }

