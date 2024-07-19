<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permit;
use App\Models\Permitmember;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class DataController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function UpdatePermitMember(Request $req,String $id)
   {
      $_member = DB::select("Select Anggota From Permit Where Id=?",[$id]);
      $member = [];
      if (count($_member) > 0)
         $member = $_member[0]->Anggota != "" ? json_decode($_member[0]->Anggota) : [];
      $find = DB::select("Select namaVisitor as Nama,Jabatan,NIK,'iya' as Register From Visitor where nik=?",[$req->nik]);
      $res = ["Nama"=>$req->nama,"Jabatan"=>$req->jabatan,"NIK"=>$req->nik,"Register"=>"tidak"];
      if (count($find) > 0)
         $res = ["Nama"=>$find[0]->Nama,"Jabatan"=>$find[0]->Jabatan,"NIK"=>$find[0]->NIK,"Register"=>$find[0]->Register];
      $req->no = intval($req->no)-1;
      $member[$req->no]->Nama= $res["Nama"];
      $member[$req->no]->Jabatan = $res["Jabatan"];
      $member[$req->no]->Register = $res["Register"];
      $member[$req->no]->NIK = $res["NIK"];
      $s = DB::update("Update Permit Set Anggota=? where Id=?",[json_encode($member),$id]);
      return response()->json($res);
   }

   public function waitingApproval(Request $req)
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
         "SELECT COUNT(*) as count FROM permit where (isnull(status,'') like ?  or isnull(status,'') like ?)and getdate() between startDate and endDate and host like ?",
         ['waitinghost','generate', $empID]
      )[0]->count;


      $totalRecordswithFilter = DB::select(
         "SELECT COUNT(*) as count FROM permit where (isnull(status,'') like ?  or isnull(status,'') like ?) and getdate() between startDate and endDate and host like ? and purpose not like ? and nameLocation like ? and nameVendor like ?",
         ['waitinghost','generate', $empID, 'Supply', '%' . $searchValue . '%', '%' . $searchValue . '%']
      )[0]->count;

      $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
      $records = DB::select(
         "select jsoN_value(anggota,'$[0].NIK') as NIK,jsoN_value(anggota,'$[0].Nama') as Nama,* from permit where (isnull(status,'') like ?  or isnull(status,'') like ?) and getdate() between startDate and endDate and host like ? and purpose not like ?  and nameLocation like ? and nameVendor like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
         ['waitinghost','generate', $empID, 'Supply', '%' . $searchValue . '%', '%' . $searchValue . '%']
      );

      error_log('session ' . $user->empID);

      // Update records expired
       $recordUpdate =DB::table('permit')->where('status', 'waitinghost') ->where('endDate','<',getdate())  ->update(['status' => 'expired']);
      return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $records, 'recordUpdate', $recordUpdate]);
   }

   public function permitArchiveByUser(Request $req)
   {
      $user = Auth::user();
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

      // Total records
      $totalRecords = DB::select(
         "SELECT COUNT(*) as count FROM permit where isnull(status,'') like ? and endDate > getdate() and purpose not like ? and host like ?",
         ['waitinghost', 'Supply', $user->empID]
      )[0]->count;

      $totalRecordswithFilter = DB::select(
         "SELECT COUNT(*) as count FROM permit where isnull(status,'') like ? and endDate > getdate() and host like ? and purpose not like ? and nameLocation like ? and nameVendor like ?",
         ['waitinghost', 'Supply', $user->empID, '%' . $searchValue . '%', '%' . $searchValue . '%']
      )[0]->count;

      $sortFieldby = $columnName_arr2[$columnOrderIndex]['data'];
      $records = DB::select(
         "select * from permit where isnull(status,'') like ? and endDate > getdate() and host like ? and purpose not like ? and nameLocation like ? and nameVendor like ? order by $sortFieldby $columnOrder OFFSET $start ROWS FETCH NEXT $rowperpage ROWS ONLY ",
         ['waitinghost', $user->empID, 'SUPPLY', '%' . $searchValue . '%', '%' . $searchValue . '%']
      );

      error_log('session ' . $user->empID);
      // $records =DB::table('permit')->where('status', 'waitinghost')->update(['status' => 'approved']);
      return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $records]);
   }

   public function permitById(Request $req)
   {
      $id = $req->id;
      $records = DB::select("select * from permit where id = ?", [$id])[0];
      return response()->json($records);
   }

   public function permitMemberById(Request $req)
   {
      $id = $req->id;
//      $records = DB::select("select a.id,a.permit_id,a.nik,b.namaVisitor,b.jabatan,case when b.id is null then 'NO' else 'YES' end as regis,'YES' as covid  from permitMember a left outer join visitor b on a.nik=b.nik where a.permit_id = ?", [$id]);
      $data = DB::select("Select anggota from permit where id=?",[$id]);
      $parsed = json_decode($data[0]->anggota);
      $records = [];
      $no = 1;
      foreach ($parsed as $_item)
      {
         $item = [
            "nik" => $_item->NIK,
            "regis" =>isset($_item->Register) ? $_item->Register : ""  ,
            "jabatan" => $_item->Jabatan,
            "namaVisitor" =>  $_item->Nama,
            "permit_id" => $id,
            "id"=>$no
         ];
         $no = $no + 1;
         array_push($records,$item);
      }    
      return response()->json($records);
   }

   public function permitToolById(Request $req)
   {
      $id = $req->id;
      $records = DB::select("select * from permittool where permit_id = ?", [$id]);
      
      return response()->json($records);
   }

   public function deleteAnggota(Request $req)
   {
     error_log($req);
/*       $data=permitmember::find($req->id);
       $data->delete();*/
       $json= DB::select("Select Anggota From Permit Where Id=?",[$req->id]);
       $members = json_decode($json[0]->Anggota);
       $no = intval($req->no)-1;
       array_splice($members,$no,1);
       $res = DB::update("Update Permit Set Anggota=? Where Id=?",[json_encode($members),$req->id]);
       return response()->json(['success' => true,'result' => 'Data Already Deleted']);
   }

   public function store(Request $req)
   {
      if ($req->id == '') {
         Permit::create([
            'nameLocation' => $req->nameLocation,
         ]);
         return response()->json(['success' => true, 'message' => 'Insert Successfully']);
      } else {
         $data = permit::find($req->id);
         $data->nameLocation = $req->nameLocation;
         $data->save();
         return response()->json(['success' => true, 'result' => 'Update Successfully']);
      }
   }

   public function show($id)
   {
      error_log($id);
      $data = Permit::find($id);
      // $data->nameLocation=$req->nameLocation;
      return response()->json($data);
   }

   public function storeImage(Request $req)
   {
      // $file = $req->hasFile('photo');
      $base64_str = substr($req->uploadPermit, strpos($req->uploadPermit, ",") + 1);
      $file = base64_decode($base64_str); //$req['photo']);
      if ($file) {

         $safeName = $req->id . '.png';
         file_put_contents(public_path() . '/storage/' . $safeName, $file);
         error_log(public_path() . '/storage/' . $safeName);

         if ($req->id == '') {
            Permit::create([
               'uploadPermit' => $req->id . '.png',
            ]);
            return response()->json(['success' => true, 'message' => 'Insert Successfully']);
         } else {
            $data = permit::find($req->id);
            $data->uploadPermit = $req->id . '.png';
            $data->status = "approved";
            $data->save();
            return response()->json(['success' => true, 'result' => 'Update Successfully']);
         }
      }
   }
}
