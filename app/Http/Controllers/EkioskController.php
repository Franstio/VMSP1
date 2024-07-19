<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Permit;
use App\Models\Permitmember;
use App\Models\Temperature;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Storage;

class EkioskController extends Controller
{
  protected $client;
  protected $apiKey = "24020018";
  protected $apiSecret = "0iQIxRvSrg3KtVoZN2Ow";
  protected $host = 'https://10.89.3.85';
  public function __construct()
  {
  }
  private function getPayloadArtemis(array $header, string $method, string $url)
  {
    $msg = [$method, "*/*", "application/json"];
    foreach ($header as $head => $val) {
      array_push($msg, $head . ":" . $val);
    }
    array_push($msg, $url);
    return implode("\n", $msg);
  }
  public function ArtemisApply()
  {
    $dt = time(); //Carbon::time();
    $uuid = (string)Str::uuid();
    $linkUrl = "/artemis/api/visitor/v1/auth/reapplication";
    $url = $this->host.$linkUrl;
    $headers = [
      'x-ca-key' => $this->apiKey,
      'x-ca-nonce' => $uuid,
      'x-ca-timestamp' => $dt,
    ];
    $msg = $this->getPayloadArtemis($headers,"POST",$linkUrl);
    $sign = base64_encode(hash_hmac("sha256",$msg,$this->apiSecret,true));
    $headers = [...$headers, "Accept" => "*/*", 'Content-Type' => 'application/json',      'x-ca-signature' => $sign, 'x-ca-signature-headers' => 'x-ca-key,x-ca-nonce,x-ca-timestamp'];
    $this->client = new Client([
      'headers' => [
        ...$headers
      ],
      'verify' => false
    ]);
    $res = $this->client->post($url);
    return $res->getBody()->getContents();
  }
  public function ApplyArtemisUser()
  {
    return $this->ArtemisApply(); 
  }
  public function ArtemisDelete($personId)
  {
    $dt = time(); //Carbon::time();
    $uuid = (string)Str::uuid();
    $linkUrl = '/artemis/api/resource/v1/person/single/delete';
    $url = $this->host.$linkUrl;
    $headers = [
      'x-ca-key' => $this->apiKey,
      'x-ca-nonce' => $uuid,
      'x-ca-timestamp' => $dt,
    ];
    $msg = $this->getPayloadArtemis($headers,"POST",$linkUrl);
    $sign = base64_encode(hash_hmac("sha256",$msg,$this->apiSecret,true));
    $headers = [...$headers, "Accept" => "*/*", 'Content-Type' => 'application/json',      'x-ca-signature' => $sign, 'x-ca-signature-headers' => 'x-ca-key,x-ca-nonce,x-ca-timestamp'];
    $this->client = new Client([
      'headers' => [
        ...$headers
      ],
      'verify' => false
    ]);
    $res = $this->client->post($url,["json"=>["personId"=>$personId]]);
  }
  public function ResetArtemis()
  {
    $res = $this->ArtemisList();
    if ($res->getStatusCode() !=200)
      return response('err ' + $res->getBody()->getContents(),500);
    $data = json_decode($res->getBody()->getContents())->data;
    if ($data->total < 1)
      return response('no data deleted',200);
    $list = (array)$data->list; 
    $msg = [];
    foreach ($list as $item)
    {
      $this->ArtemisDelete($item->personId);
    }
    return response('data deleted',200);
  }
  public function ArtemisList()
  {
    $dt = time(); //Carbon::time();
    $uuid = (string)Str::uuid();
    // $msg = "POST
    // */*
    // application/json
    // x-ca-key:".$this->apiKey."
    // x-ca-nonce:$uuid
    // x-ca-timestamp:$dt
    // /artemis/api/resource/v1/person/personList";
    $linkUrl = "/artemis/api/resource/v1/person/personList";
    $headers = [
      'x-ca-key' => $this->apiKey,
      'x-ca-nonce' => $uuid,
      'x-ca-timestamp' => $dt,
    ];
    $msg = $this->getPayloadArtemis($headers, "POST", $linkUrl);
    $sign = base64_encode(hash_hmac('sha256', $msg, $this->apiSecret, true));
    $headers = [...$headers, "Accept" => "*/*", 'Content-Type' => 'application/json',      'x-ca-signature' => $sign, 'x-ca-signature-headers' => 'x-ca-key,x-ca-nonce,x-ca-timestamp'];
    $this->client = new Client([
      'headers' => [
        ...$headers
      ],
      'verify' => false
    ]);
    $url = $this->host . $linkUrl;
    $res = $this->client->post($url, ["json" => ["pageNo" => 1, "pageSize" => 6]]);
    return $res;
  }
  public function GetListUserArtemis()
  {
    $res = $this->ArtemisList();
    if ($res->getStatusCode() != 200)
      return response($res->getBody()->getContents(), 500);
      $data = json_decode($res->getBody()->getContents())->data;
    return response()->json($data);
  }
  public function ArtemisAdd($nik)
  {
    $dt = time();
    $now = Carbon::now();
    $uuid = (string)Str::uuid();
    $linkUrl = '/artemis/api/resource/v1/person/single/add';
    $headers = [
      'x-ca-key' => $this->apiKey,
      'x-ca-nonce' => $uuid,
      'x-ca-timestamp' => $dt,
    ];
    $msg = $this->getPayloadArtemis($headers, "POST", $linkUrl);
    $sign = base64_encode(hash_hmac('sha256', $msg, $this->apiSecret, true));
    $headers = [...$headers, "Accept" => "*/*", 'Content-Type' => 'application/json',      'x-ca-signature' => $sign, 'x-ca-signature-headers' => 'x-ca-key,x-ca-nonce,x-ca-timestamp'];
    $this->client = new Client([
      'headers' => [...$headers],
      'verify' => false
    ]);
    $url = $this->host . $linkUrl;
    $visitor = Visitor::whereNik($nik)->first();
    $img = Storage::disk('public')->get($visitor->photo);
    $data = [
      "personCode" => $visitor->nik,
      "personFamilyName" => "_",
      "personGivenName" => $visitor->namaVisitor,
      "gender" => $visitor->gender == "Laki-Laki" ? 1 : 0,
      "orgIndexCode" => "1",
      "remark" => "Grunge",
      "phoneNo" => "123456",
      "email" => $visitor->email,
      "faces" => [["faceData" => base64_encode($img)]],
      "beginTime" => $now->format("Y-m-d")."T15:00:00+08:00",
      "endTime" => $now->addYear(1)->format("Y-m-d")."T15:00:00+08:00",
    ];
    $res = $this->client->post($url,["json"=>$data]);
    if ($res->getStatusCode()!=200)
      return $res->getBody()->getContents();
    return response()->json($this->ArtemisApply());
  }
  public function AddArtemisUser($nik)
  {
    $data = $this->ArtemisAdd($nik);
    return response()->json($data);
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
    $columnOrder = $columnIndex_arr[0]['dir']; // Column index
    $searchValue = $search_arr['value']; // Search value


    $totalRecords = DB::select(
      "SELECT COUNT(*) as count FROM permit where isnull(status,'') like ? and getdate() between startDate and endDate ",
      ['waitingadmin']
    )[0]->count;


    $totalRecordswithFilter = DB::select(
      "SELECT COUNT(*) as count FROM permit where isnull(status,'') like ? and getdate() between startDate and endDate and nameVendor like ?",
      ['waitingadmin', '%' . $searchValue . '%']
    )[0]->count;

    $record = DB::select(
      "SELECT * FROM permit where isnull(status,'') like ? and getdate() between startDate and endDate and nameVendor like ?",
      ['waitingadmin', '%' . $searchValue . '%']
    );

    return response()->json(['draw' => $draw, 'recordsTotal' => $totalRecords, 'recordsFiltered' => $totalRecordswithFilter, 'data' => $record]);
  }


  public function store(Request $req)
  {
    $base64_str = substr($req->photo, strpos($req->photo, ",") + 1);
    $file = base64_decode($base64_str); //$req['photo']);

    if ($req->id == '') {
      $safeName = $req->nik . '.png';
      file_put_contents(public_path() . '/storage/' . $safeName, $file);
      error_log(public_path() . '/storage/' . $safeName);

      Visitor::create([
        'date' => date('Y-m-d H:i:s'),
        'nameVendor' => $req->nameVendor,
        'asalVendor' => $req->asalVendor,
        'email' => $req->email,
        'namaVisitor' => $req->namaVisitor,
        'nik' => $req->nik,
        'gender' => $req->gender,
        'jabatan' => $req->jabatan,
        'photo' => $req->nik . '.png',
        'typeVisitor' => "Non Residence",
        'postdate' => date('Y-m-d H:i:s'),
        'q1' => 'TIDAK',
        'q2' => 'TIDAK',
        'q3' => 'TIDAK',
        'q4' => 'TIDAK',
        'q5' => 'TIDAK',
        'q6' => 'TIDAK',
      ]);
      return response()->json(['success' => true, 'result' => 'Insert Successfully']);
    }
  }
  public function storePermittion(Request $req)
  {


    // $anggota = [
    //   'Nama' => $req->namaVisitor,
    //   'Jabatan' => $req->jabatan,
    //   'NIK' => $req->nik
    // ];

    /*     $barangBawaan = [
      'Nama Pemilik' => $req->namaVisitor,
      'nik' => $req->nik,
      'SN' => $req->SN,
      'jenisMedia' => $req->jenisMedia,
      'tujuan' => $req->tujuan
    ];  */

    error_log($req->purpose);

    if ($req->id == '') {
      Permit::create([
        'subDate' => date('Y-m-d H:i:s'),
        'nameVendor' => $req->nameVendor,
        'nameType' => $req->nameType,
        'startDate' =>  date('Y-m-d') . ' ' . $req->startTime,
        'endDate' => date('Y-m-d') . ' ' . $req->endTime,
        'purpose' => $req->purpose,
        'permitNo' => $req->permitNo,
        'desk' => $req->desk,
        'anggota' => json_encode($req->anggota),
        'bawaBarang' => $req->bawaBarang,
        'barangBawaan' => json_encode($req->barangBawaan),
        'supplyBarang' => json_encode($req->supplyBarang),
        'email' => $req->email,
        'name' => $req->name,
        'status' => "waitingadmin",
        'permit_id' => $req->id

      ]);

      return response()->json(['success' => true, 'result' => 'Insert Successfully']);
    }
  }

  public function delete(Request $req)
  {
    error_log($req);
    // $data=permitmember::find($req->id);
    // $data->delete();
    // return response()->json(['success' => true,'result' => 'Data Already Deleted']);
  }

  public function searchNIK(Request $req)
  {
    error_log($req->nik);
    $data = Visitor::where(['nik' => $req->nik])->first();

    $output = [];
    if ($data) {
      $output = [
        'success' => true
      ];
    } else {
      $output = [
        'success' => false
      ];
    }
    return response()->json($output);
  }

  public function getcheckindata(Request $req)
  {
    $qr = str_getcsv($req->qr, ':');

    $permitId = $qr[0];
    $nik = $qr[1];
    error_log($permitId);
    $records = DB::select(
      "SELECT * from permit a inner join permitmember b on a.id=b.permit_id  WHERE a.id like ? and b.nik like ? ",
      [$permitId, $nik]
    );
//    $this->ResetArtemis();
//    $this->AddArtemisUser($nik);
    return response()->json(['data' => $records]);
  }
  public function ConfirmArtemisData(Request $req)
  {
      $nik = $req->nik;
      $data = Temperature::whereNik($nik)->where('statusTemp','=','Confirm')->first();
      return response()->json($data,$data==null?404  :200 );
  }
  private function CheckContainedMember($permit_Id, $nik)
  {
    $query = "select count(x.nik) as c From Permit p cross apply OPENJSON(p.anggota) with (Nama varchar(128),Jabatan varchar(128),NIK varchar(128)) x where p.id=? and x.nik=?";
    $count = DB::select($query, [$permit_Id, $nik]);
    return $count[0]->c > 0;
  }
  private function CheckTransaksi($id, $nik)
  {
    $query = "select Count(*) as c From Transaksi Where permitId=? and nik=? and cast(timeCheckIn as date)=convert(date,getdate()) ;";
    $count = DB::select($query, [$id, $nik]);
    return $count[0]->c > 0;
  }
  public function ScanCheckIn(Request $req)
  {
    $permit_id = $req->id;
    $nik = $req->nik ?? "";
    $check_Temp = DB::select("Select Id_Permit From Temp_Transaksi Where Id_Permit=? and Nik=?", [$permit_id, $req->nik]);
    $check_Transaksi = $this->CheckTransaksi($permit_id, $nik);
    if ($check_Transaksi)
      return response()->json(["err" => "Permit and NIK Already Used"], 409);
    if (count($check_Temp) == 0) {
      $check = $this->CheckContainedMember($permit_id, $nik);
      if (!$check)
        return response()->json(["err" => "Data Not Found"], 404);
      /*$badge = DB::select("select id_badge,noBadge From badge where status='free' order by cast(nobadge  as int) asc");
      if (count($badge) < 1)
        return response()->json(["err" => "No Free Badge"], 422);*/
      //$badge = $badge[0];
      DB::insert("Insert Into Temp_Transaksi(Id_Permit,NIK) Values(?,?) ", [$permit_id, $nik]);
//      DB::update("Update Badge Set Status='reserved' where id_badge=?", [$badge->id_badge]);
    }
    $data = DB::select("select v.namaVisitor as nama,pm.nik,p.nameVendor,v.photo From Permit p  INner join permitmember pm on p.id=pm.permit_id inner join temp_transaksi tt on tt.id_permit=p.id left join Visitor v on pm.nik=v.nik where Pm.Nik=? and P.Id=?", [$nik, $permit_id]);
    $this->ResetArtemis();
    $this->AddArtemisUser($nik);
    $this->ArtemisApply();
    return count($data) > 0  ? response()->json(['data' => $data[0]]) : response()->json(["err" => "Data Not Found"], 404);
  }

  public function getDataForCheckout(Request $req)
  {
    $rfid = $req->rfid;
    $data = DB::select("select v.namaVisitor,v.nik,v.nameVendor,v.typeVisitor,u.photo as hostPhoto,u.empId as empId,u.name as host,u.nameDepart as depart,case when u.takeover = '' or u.takeover = null then u.rfid else u.takeover end as hst ,t.* From Transaksi t left join [User] u on t.name=concat(u.name,':',u.empID) left join visitor v on v.nik=t.nik where t.rfid=? and kondisi='checkin'     order by t.id desc  ", [$rfid]);
    if (count($data) > 0) {
      if ($data[0]->typeVisitor == "Residence" || $data[0]->purpose == "SUPPLY") {
        DB::update("update transaksi set kondisi='checkout', timeCheckout=GETDATE() where id=?", [$data[0]->id]);
        DB::update("Update Badge Set Status='free' where Rfid=?", [$rfid]);
      }
      return response()->json(['data' => $data[0]]);
    }
    //    $data = DB::select("select v.namaVisitor as nama,pm.nik,p.nameVendor,b.noBadge,v.photo From Permit p  INner join permitmember pm on p.id=pm.permit_id inner join temp_transaksi tt on tt.id_permit=p.id left join Visitor v on pm.nik=v.nik  left join badge b on tt.id_badge=b.id_badge where Pm.Nik=? and P.Id=?",[$req->nik,$permit_id]);
    return response("", 404);
  }
  public function Checkout(Request $req)
  {
    $rfid = $req->rfid;
    $hostRfid = $req->host;
    $data = DB::select("select v.namaVisitor,v.nik,v.nameVendor,v.typeVisitor,case when u.takeover = '' or u.takeover = null then u.rfid else u.takeover end as hst ,t.* From Transaksi t left join [User] u on t.name=concat(u.name,':',u.empID) left join visitor v on v.nik=t.nik where t.rfid=? and (u.takeover=? or u.rfid=?)     order by t.id desc  ", [$rfid, $hostRfid, $hostRfid]);
    if (count($data) < 1)
      return response("", 404);
    DB::update("update transaksi set kondisi='checkout' , timeCheckout=GETDATE() where id=?", [$data[0]->id]);
    DB::update("Update Badge Set Status='free' where Rfid=?", [$rfid]);
    return response()->json("OK", 200);
  }
  public function ScanCheckInStep2(Request $req)
  {
    $permit_id = $req->id;
    $nik = $req->nik;
    $confirmId = $req->confirmId;
    $temp = DB::select("Select Id_Permit,Nik  From Temp_Transaksi where id_permit=? and nik=?", [$permit_id, $nik]);
    if ($temp  != null) {
      $temp = $temp[0];
      DB::insert("Insert into transaksi(namaVisitor,NIK,purpose,nameVendor,name,temp,timeCheckin,timeCheckout,statusPermit,noVest,zone,nameLocation,kondisi,photo,permitID,barangBawaan,postby,reason) select v.namaVisitor,pm.nik,p.purpose,p.nameVendor,concat(hst.name,':',hst.empID),'37',getdate(),null,p.status,123,'',p.nameLocation,'waitinglist',v.photo,p.id,p.barangBawaan,p.postby,p.reason  From Permit p left join temp_transaksi tt on p.id=tt.Id_Permit  inner join [User] hst on p.host=hst.empID left join  PermitMember pm on p.id=pm.permit_id left join visitor v on pm.nik=v.nik where pm.nik=? and p.id=?  order by v.nik offset 0 rows fetch next 1 rows only;", [$nik, $permit_id]);
//      DB::update("Update Badge Set Status='used' where Id_Badge=?", [$temp->Id_Badge]);
      DB::delete("Delete From Temp_Transaksi Where Id_Permit=? and nik=?", [$permit_id, $nik]);
      DB::update("Update Temperature set statusTemp='checked' where id=?",[$confirmId]);
    }
    return response()->json("OK");
  }
  public function CancelCheckIn(Request $req)
  {
    $permit_id = $req->id;
    $nik = $req->nik;
//    $temp = DB::select("Select Id_Badge From Temp_Transaksi where id_permit=? and nik=?", [$permit_id, $nik]);
//    DB::update("Update Badge Set Status='free' where id_badge=? and status='reserved'", [$temp[0]->Id_Badge]);
    DB::delete("Delete From Temp_Transaksi Where Id_Permit=?  and nik=?", [$permit_id, $nik]);
    return response()->json("ok");
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

      Visitor::create([
        'photo' => $req->nik . '.png',
      ]);
      return response()->json(['success' => true, 'result' => 'Insert Successfully']);
    }
  }
}
