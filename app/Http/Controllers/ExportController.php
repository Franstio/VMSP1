<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Vendor;
use App\Models\Permit;
use App\Models\Permitmember;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  private function InsertToPermitMember($permit_id)
  {
    $id = $permit_id;
    $anggota = DB::select("Select Anggota From Permit where Id=?",[$id])[0]->Anggota;
    $anggota = json_decode($anggota);
    $data=  [];
    foreach ($anggota as $member)
    {
      array_push($data, [
        "permit_id"=>$id,
        "nik" => $member->NIK,
        "jabatan"=>$member->Jabatan,
        "status"=>isset($member->Register) ? $member->Register : "Tidak"
      ]);
    }
    DB::delete("Delete From PermitMember Where Permit_Id=?",[$id]);
    Permitmember::insert($data);
    return $data;
  }
  public function ChangeApprovalMail(Request $req)
  {
     $id = $req->id;
     $mail = $req->mail;
     DB::update("Update Permit Set email=? where id=?;",[$mail,$id]);
     return $this->testExport($req);
  }

  public function testExport(Request $req)
  {
    $id = $req->id;
    $this->InsertToPermitMember($id);
    $sp = "vms_approve_email";
    $param = [$id];
    
    //$emailResult = DB::select("DECLARE @spmsg varchar(100); exec vms_approve_email ?,@spmsg OUTPUT;SELECT @spmsg as spmsg; ", $param);
    //$returnValue = $emailResult;
    $emailResult = DB::select("exec vms_approve_email ?", $param);
    $returnValue = $emailResult;
    if ($req->qr=="resend")
    {
        DB::update("Update Permit Set Status='approved' where id=?",[$id]);
        return Redirect::back();
    }
    // Generate excel
    $mainRecords = DB::select("select b.jabatan as position,b.q1  from permitmember a inner join visitor b on a.nik=b.nik where a.permit_id=?  ", [$id])[0];
    $mainRecords2 = DB::select("select nameVendor from permit where id =? ", [$id])[0];
    $mainRecords3 = DB::select("select desk from permit where id =? ", [$id])[0];
    //$mainRecords4 = DB::select("select id from permit where id =? ", [$id])[0];
    $mainRecords5 = DB::select("select nameLocation from permit where id =? ", [$id])[0];
    $mainRecords6 = DB::select("select startDate from permit where id =? ", [$id])[0];
    $mainRecords7 = DB::select("select endDate from permit where id =? ", [$id])[0];
    $results = DB::select("SELECT jenisMedia FROM permittool WHERE permit_id = ?", [$id]);

    

    $memberRecords = DB::select("select b.namaVisitor as nameVisitor, b.jabatan as position,b.q1 from permitmember a inner join visitor b on a.nik=b.nik where a.permit_id=? ", [$id]);
    // return Excel::download($records, 'permit.xlsx');
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('../public/VisitorApprovalBTX.xlsx');

    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->setCellValue('C5', $memberRecords[0]->nameVisitor);
    $activeWorksheet->setCellValue('C6', $mainRecords->position);
    $activeWorksheet->setCellValue('C7', $mainRecords2->nameVendor);
    $activeWorksheet->setCellValue('C9', $mainRecords6->startDate);
    // $activeWorksheet->setCellValue('C16', $mainRecords4);  Main record 4 ini data json 
    $activeWorksheet->setCellValue('C10', $mainRecords7->endDate);
    $activeWorksheet->setCellValue('A11', $mainRecords3->desk);

    if ($mainRecords5->nameLocation == 'Corporate Office') {
      $activeWorksheet->setCellValue('D36', ($mainRecords5[0]->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'PABX room') {
      $activeWorksheet->setCellValue('D37', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Training Room') {
      $activeWorksheet->setCellValue('D38', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Resistor Office') {
      $activeWorksheet->setCellValue('D39', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Resistor Production') {
      $activeWorksheet->setCellValue('D40', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Resistor Production') {
      $activeWorksheet->setCellValue('D41', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'IT Server Room') {
      $activeWorksheet->setCellValue('D42', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Workshop & Machine shop') {
      $activeWorksheet->setCellValue('D43', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Medan Meeting Room') {
      $activeWorksheet->setCellValue('D44', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Surabaya Meeting Room') {
      $activeWorksheet->setCellValue('D45', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Yogyakarta Meeting Room') {
      $activeWorksheet->setCellValue('D46', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Denpasar Meeting Room') {
      $activeWorksheet->setCellValue('D47', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Jakarta Meeting Room') {
      $activeWorksheet->setCellValue('D48', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'CB & IE Room') {
      $activeWorksheet->setCellValue('D49', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'EM & PED Office') {
      $activeWorksheet->setCellValue('D50', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Capacitor Production') {
      $activeWorksheet->setCellValue('D51', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Capacitor Office') {
      $activeWorksheet->setCellValue('D52', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Capacitor Production') {
      $activeWorksheet->setCellValue('D53', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'QD Laboratory') {
      $activeWorksheet->setCellValue('D54', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'QD Office') {
      $activeWorksheet->setCellValue('D55', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Calibration/Reability Room') {
      $activeWorksheet->setCellValue('D56', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Varistor office') {
      $activeWorksheet->setCellValue('D57', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Varistor production') {
      $activeWorksheet->setCellValue('D58', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Logistic office') {
      $activeWorksheet->setCellValue('D59', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Coil Automotive production PCC') {
      $activeWorksheet->setCellValue('D60', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Inductor Production') {
      $activeWorksheet->setCellValue('D61', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Inductor Office') {
      $activeWorksheet->setCellValue('D62', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Inductor Production-PCC') {
      $activeWorksheet->setCellValue('D63', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'LELP Production') {
      $activeWorksheet->setCellValue('D64', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'Power House') {
      $activeWorksheet->setCellValue('D65', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } else if ($mainRecords5->nameLocation == 'All Building') {
      $activeWorksheet->setCellValue('D66', ($mainRecords5->nameLocation == "ya") ? "❌" : "✅");
    } 

     $index = 0;
     $startNo = 7;
     foreach ($memberRecords as $member) {
       $activeWorksheet->setCellValue('H' . $startNo + $index, $member->nameVisitor);
     //error_log('xxxx'. $member->nameVisitor);  
    $index++;
     }

     $index = 0;
     $startNo = 7;
     foreach ($memberRecords as $member) {
       $activeWorksheet->setCellValue('O' . $startNo + $index, $member->position);
     //error_log('xxxx'. $member->nameVisitor);  
    $index++;
     }
  
     if (count($results) > 0) {
      // Check if there are results before accessing index 0
      $mainRecords8 = $results[0];
  
      if ($mainRecords8->jenisMedia == 'Personal Computer / Laptop') {
          $activeWorksheet->setCellValue('D21', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'Camera (Digital or analogue)') {
          $activeWorksheet->setCellValue('D22', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'Mobilephone with camera / video') {
          $activeWorksheet->setCellValue('D23', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'Tablet with camera / video') {
          $activeWorksheet->setCellValue('D24', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'Digital Video Recorder') {
          $activeWorksheet->setCellValue('D25', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'Thumbdrive / Pendrive storage unit') {
          $activeWorksheet->setCellValue('D26', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'Memory Cards (SD/CF/MMC etc.)') {
          $activeWorksheet->setCellValue('D27', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'Audio Tape Recorder') {
          $activeWorksheet->setCellValue('D28', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'CDRW / CDR / HDD') {
          $activeWorksheet->setCellValue('D29', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } elseif ($mainRecords8->jenisMedia == 'Others (pls state)') {
          $activeWorksheet->setCellValue('D30', ($mainRecords8->jenisMedia == "ya") ? "❌" : "✅");
      } else {
          // Handle the case when $mainRecords8->jenisMedia does not match any of the conditions
      }
  } else {
      // Handle the case when no results are returned for the query
  }
  
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('VisitorApprovalBT.xlsx');


    $filename = 'VisitorApprovalBT.xlsx';
    $mime = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

    // Create a new Response object
    $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($filename);

    // Set the headers to force download of the file
    $response->headers->set('Content-Type', $mime);
    $response->setContentDisposition(
      \Symfony\Component\HttpFoundation\ResponseHeaderBag::DISPOSITION_ATTACHMENT,
      $filename
    );

    // Send the file to the browser
    $response->send();


    //  return Excel::download(new Visitor, 'Visitor.xlsx');


  }
  public function reject(Request $req)
  {
    $id = $req->permit_id;
    $param = [$id];

    $data = permit::find($id);
    $data->reason = $req->reason;
    $data->save();

   error_log( $id );
   $emailResult = DB::select("exec vms_reject_email ?", $param);
  // $returnValue = $emailResult[0];
  //   $emailResult = DB::select("DECLARE @spmsg varchar(100); exec $sp ?,@spmsg OUTPUT;SELECT @spmsg; ", $param);
   // $returnValue = $emailResult[0]; 
    return response()->json(['success' => true, 'result' => 'Update Successfully']);
  }
  public function approve(Request $req){
    $id = $req->permit_id;
    $sp = "vms_approve_email";
    $param = [$id];

    $emailResult = DB::select("exec vms_approve_email ?", $param);
    $returnValue = $emailResult;
    return response()->json(['success' => true, 'result' => 'Update Successfully']);
  }
}
