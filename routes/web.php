<?php

use App\Http\Controllers\RecruitmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DepartController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\JotFormController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PermitvipController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VestController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\EkioskController;
use App\Http\Controllers\EscortController;
use App\Http\Controllers\PermitController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/store-register', [JotFormController::class, 'storeRegister']);
Route::get('/store-register-new', [JotFormController::class, 'storeRegisterNew']);
Route::get('/delete-jotform', [JotFormController::class, 'deleteJotFormSubmission']);
Route::get('/store-permit', [JotFormController::class, 'storePermit']);
Route::get('/convert-image-to-base64', [JotFormController::class, 'convertImageToBase64']);
//Route::post('/visitor', [JotFormController::class,'store']);

// Select Route
Route::get('/select/vendor', [SelectController::class,'vendor']);
Route::get('/select/type', [SelectController::class,'type']);
Route::get('/select/depart', [SelectController::class,'depart']);
Route::get('/select/role', [SelectController::class,'role']);
Route::get('/select/location', [SelectController::class,'location']);
Route::get('/select/badge', [SelectController::class,'badge']);
Route::get('/select/vest', [SelectController::class,'vest']);
Route::get('/select/purpose', [SelectController::class,'purpose']);
Route::get('/select/user', [SelectController::class,'user']);
Route::get('/select/user-dept', [SelectController::class,'userWithDept']);

Route::get('search', function () {
    return view('kiosk.search', ['title' => 'Search']);
});
Route::post('/search/searchNIK', [EkioskController::class,'searchNIK']);

Route::get('VisitorPermittion', function () {
    return view('kiosk.VisitorPermittion', ['title' => 'Regis']);
});
Route::put('VisitorPermittion/storePermittion', [EkioskController::class,'storePermittion']);

Route::get('VisitorRegister', function () {
    return view('kiosk.VisitorRegister', ['title' => 'Regis']);
});
Route::put('VisitorRegister/store', [EkioskController::class,'store']);
Route::post('/VisitorRegister/storeimage', [EkioskController::class,'storeimage']);

Auth::routes();

Route::get('/loginINA', function () {
    return view('loginINA', ["title" => "Login",]);
});
Route::get('/emailINA', function () {
    return view('emailINA', ["title" => "Email",]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usersetting', [UserController::class, 'password']);
Route::post('/usersetting', [UserController::class, 'usersetting']);

Route::post('/usersetting/handover', [UserController::class, 'handover']);
Route::post('/usersetting/handover/reset',[UserController::class,'handoverReset']);
Route::get('/manual', function () {
    return view('manual', ["title" => "Manual",]);
});
Route::put('/manual/store', [TransaksiController::class,'store']);

Route::get('/waiting/needcheckin', [TransaksiController::class, 'getWaitingList']);

Route::get('/waiting', function () {
    return view('waiting', ["title" => "Visitor List",]);
});
Route::get('/waiting/nik/{nik}',[VisitorController::class,'visitorByNik'])->withoutMiddleware(['auth']);
Route::get("/waiting/visitor/{nik}",[VisitorController::class,'getVisitorByNik'])->withoutMiddleware(['auth']);
Route::get('/waiting/data', [TransaksiController::class,'index']);
Route::put('/waiting/store', [TransaksiController::class,'store']);
Route::put('/waiting/storeBadge', [TransaksiController::class,'storeBadge']);
Route::get('/waiting/show/{id}', [TransaksiController::class,'show']);
Route::put('/waiting/updateReject', [TransaksiController::class,'updateReject']);
Route::get('/api/checkpermitbyrfid/{id}', [TransaksiController::class,'checkPermitByRfid']);
Route::get('/api/updatetransaksitocheckin/{id}', [TransaksiController::class,'updateTransaksiToCheckin']);
Route::post('/getcheckindata', [TransaksiController::class,'check-in']);
Route::put('/api/transaksi/badge/{id}', [TransaksiController::class,'UpdateTransaksiBadge']);
Route::get('/home', function () {
    return view('home', ["title" => "Home",]);
});
Route::get('/home/data', [TransaksiController::class, 'index']);
Route::get('/home/dashboard', [TransaksiController::class, 'dashboard']);

Route::get('/report', function () {
    return view('report', ["title" => "Report",]);
});
Route::get('/host/{rfid}',[TransaksiController::class,'getHostByRfid']);
Route::get('/report/data', [ReportController::class, 'index']);

Route::get('/export', [ReportController::class, 'export']);

Route::get('/reject', function () {
    return view('reject', ["title" => "Reject List"]);
});
Route::get('/reject/rejectlist', [TransaksiController::class, 'rejectlist']);
Route::get('/reject/show/{id}', [TransaksiController::class,'show']);
Route::put('/reject/editReject', [TransaksiController::class,'editReject']);

Route::get('track', [TrackController::class, 'index']);

Route::get('/permit', function () {
    return view('permit', ["title" => "Permit",]);
});

Route::get("/api/permit/image/{id}",[PermitController::class,'permitImage']);
Route::get('/api/waitingapproval', [DataController::class,'waitingApproval']);
Route::get('/api/permitarchivebyuser', [DataController::class,'permitArchiveByUser']);
Route::get('/api/permitbyid/{id}', [DataController::class,'permitById']);
Route::get('/api/permitmemberbyid/{id}', [DataController::class,'permitMemberById']);
Route::get('/api/permittoolbyid/{id}', [DataController::class,'permitToolById']);
Route::post('/home/updatelocation', [DataController::class,'updatelocation']);
Route::post('/permit/storeimage', [DataController::class,'storeimage']);
Route::put('/permit/store', [DataController::class,'store']);
Route::put('/permit/approval/member/{id}',[DataController::class,'UpdatePermitMember']);
Route::get('/permit/show/{id}', [DataController::class,'show']);
Route::get('/api/deleteAnggota/{id}', [DataController::class,'deleteAnggota']);


// Export
Route::get('/export/permitbytemplate/{id}', [ExportController::class,'testExport']);
Route::post('/permit/updatemail', [ExportController::class,'ChangeApprovalMail']);
Route::post('/approval/reject', [ExportController::class,'reject']);

Route::get('/report/exportReport', [ReportController::class,'exportReport']);

// Select Route
Route::get('/select/vendor', [SelectController::class,'vendor']);
Route::get('/select/type', [SelectController::class,'type']);
Route::get('/select/depart', [SelectController::class,'depart']);
Route::get('/select/role', [SelectController::class,'role']);
Route::get('/select/location', [SelectController::class,'location']);
Route::get('/select/badge', [SelectController::class,'badge']);
Route::get('/select/vest', [SelectController::class,'vest']);
Route::get('/select/purpose', [SelectController::class,'purpose']);
Route::get('/select/user', [SelectController::class,'user']);

Route::get('/visitor', function () {
    return view('visitor', ["title" => "Visitor",]);
});
Route::get('/visitor/data', [VisitorController::class,'index']);
Route::get('/visitor/show/{id}', [VisitorController::class,'show']);
Route::put('/visitor/store', [VisitorController::class,'store']);
Route::post('/visitor/storeimage', [VisitorController::class,'storeimage']);
Route::get('/visitor/delete/{id}', [VisitorController::class,'delete']);
//Route::apiResource('visitor', VisitorController::class);

Route::get('/vipcheckin', function () {
    return view('vipcheckin', ["title" => "Permit",]);
});
Route::get('/vipcheckin/data', [PermitvipController::class,'index']);
Route::get('/vipcheckin/show/{id_permit}', [PermitvipController::class,'show']);
Route::put('/vipcheckin/store', [PermitvipController::class,'store']);
Route::post('/vipcheckin/updatestatus', [PermitvipController::class,'updateStatusById']);
Route::get('/vipcheckout', function () {
    return view('vipcheckout', ["title" => "Permit",]);
});

Route::get('/approval', function () {
    return view('approval', ["title" => "Approval"]);
});

Route::get('/history', function () {
    return view('history', ["title" => "Approval History"]);
});
Route::get('/history/approvedapproval', [HistoryController::class,'approvedApproval']);
Route::get('/api/permitarchivebyuser', [HistoryController::class,'permitArchiveByUser']);
Route::get('/api/permitbyid/{id}', [HistoryController::class,'permitById']);
Route::get('/history/permitmemberbyid/{id}', [HistoryController::class,'permitMemberById']); 
Route::get('/api/permittoolbyid/{id}', [HistoryController::class,'permitToolById']);
Route::post('/api/updatestatus', [HistoryController::class,'updateStatusById']);
Route::put('/history/store', [HistoryController::class,'store']);

Route::get('/permit', function () {
    return view('permit', ["title" => "Permit",]);
});
Route::get('/permit/data', [PermitvipController::class,'index']);
Route::put('/permitvip/store', [PermitvipController::class,'store']);
Route::get('/permitvip/show/{id_permit}', [PermitvipController::class,'show']);

Route::get('/staff', function () {
    return view('staff', ["title" => "Staff",]);
});
Route::get('/staff/data', [UserController::class,'index']);
Route::get('/staff/show/{id}', [UserController::class,'show']);
Route::put('/staff/store', [UserController::class,'store']);
Route::get('/staff/delete/{id}', [UserController::class,'delete']);
Route::post('/staff/storeimage', [UserController::class,'storeimage']);

Route::get('/badge', function () {
    return view('badge', ["title" => "Badge",]);
});
Route::get('/badge/data', [BadgeController::class,'index']);
Route::get('/badge/show/{id_badge}', [BadgeController::class,'show']);
Route::put('/badge/store', [BadgeController::class,'store']);
Route::get('/badge/delete/{id_badge}', [BadgeController::class,'delete']);

Route::get('/depart', function () {
    return view('depart', ["title" => "Department",]);
});
Route::get('/depart/data', [DepartController::class,'index']);
Route::get('/depart/show/{id_depart}', [DepartController::class,'show']);
Route::put('/depart/store', [DepartController::class,'store']);
Route::get('/depart/delete/{id_depart}', [DepartController::class,'delete']);

Route::get('/location', function () {
    return view('location', ["title" => "Location",]);
});
Route::get('/location/data', [LocationController::class,'index']);
Route::get('/location/show/{id_location}', [LocationController::class,'show']);
Route::put('/location/store', [LocationController::class,'store']);
Route::get('/location/delete/{id_location}', [LocationController::class,'delete']);

Route::get('/permission', [PermissionController::class,'permission']);
Route::post('add_permission', [PermissionController::class,'Add_Permission']);
Route::get('delete_permission/{id}', [PermissionController::class,'delete_permission']);
Route::get('edit_permission/{id}', [PermissionController::class,'showDataPermission']);
Route::post('edit_permission', [PermissionController::class,'edit_permission']);

Route::get('/purpose', function () {
    return view('purpose', ["title" => "Purpose",]);
});
Route::get('/purpose/data', [PurposeController::class,'index']);
Route::get('/purpose/show/{id_purpose}', [PurposeController::class,'show']);
Route::put('/purpose/store', [PurposeController::class,'store']);
Route::get('/purpose/delete/{id_purpose}', [PurposeController::class,'delete']);

Route::get('/role', function () {
    return view('role', ["title" => "Role",]);
});
Route::get('/role/data', [RoleController::class,'index']);
Route::get('/role/show/{id_role}', [RoleController::class,'show']);
Route::put('/role/store', [RoleController::class,'store']);
Route::get('/role/delete/{id_role}', [RoleController::class,'delete']);

Route::get('/type', function () {
    return view('type', ["title" => "Type",]);
});
Route::get('/type/data', [TypeController::class,'index']);
Route::get('/type/show/{id_type}', [TypeController::class,'show']);
Route::put('/type/store', [TypeController::class,'store']);
Route::get('/type/delete/{id_type}', [TypeController::class,'delete']);

Route::get('/vendors', function () {
    return view('vendor', ["title" => "Vendor",]);
});
Route::get('/vendor/data', [VendorController::class,'index']);
Route::get('/vendor/show/{id_vendor}', [VendorController::class,'show']);
Route::put('/vendor/store', [VendorController::class,'store']);
Route::get('/vendor/delete/{id}', [VendorController::class,'delete']);

Route::get('/vest', function () {
    return view('vest', ["title" => "Vest",]);
});
Route::get('/vest/data', [VestController::class,'index']);
Route::get('/vest/show/{id_vest}', [VestController::class,'show']);
Route::put('/vest/store', [VestController::class,'store']);
Route::get('/vest/delete/{id_vest}', [VestController::class,'delete']);

Route::get('check-in', function () {
    return view('checked.check-in', ['title' => 'Check In']);
});

Route::get('check-out', function () {
    return view('checked.check-out', ['title' => 'Check Out']);
});

Route::get('/detail', function () {
    return view('detail', ["title" => "Detail"]);
});

Route::get('/edit', function () {
    return view('edit', ["title" => "Edit"]);
});

Route::get('index', function () {
    return view('kiosk.index', ['title' => 'Index']);
});

Route::get('regis', function () {
    return view('kiosk.regis', ['title' => 'Regis']);
});

Route::get('Covid', function () {
    return view('kiosk.Covid', ['title' => 'Regis']);
});

Route::put('/page1/store', [EkioskController::class,'store']);

Route::get('/VisitorApproval', function () {
    return view('VisitorApproval', ["title" => "Visitor Approval",]);
});
Route::get('/VisitorApproval/data', [EkioskController::class,'index']);
Route::post('/VisitorApproval/approve', [ExportController::class,'approve']);
Route::post('/VisitorApproval/reject', [ExportController::class,'reject']);
Route::get('/visitorApproval/delete/{id}', [EkioskController::class,'delete']);

Route::get('export', function () {
    return view('export', ['title' => 'Regis']);
});

Route::get('/export', [ExportController::class,'testExport']);


Route::get('/ekiosk/getcheckindata/{qr}', [EkioskController::class,'getcheckindata']);


Route::get('/ekiosk/scan/check-in',[EkioskController::class, 'ScanCheckIn']);
Route::get('/ekiosk/scan/2',[EkioskController::class, "ScanCheckInStep2"]);
Route::get("/ekiosk/scan",[EkioskController::class, 'CancelCheckIn']);
Route::get("/ekiosk/scan/check-out",[EkioskController::class,'getDataForCheckout']);
Route::post("/ekiosk/scan/check-out",[EkioskController::class,'CheckOut']);
Route::get('/register',function(){
    return view('forms.register');
});
Route::post("/register",[JotFormController::class,"storeRegisterManual"]);
Route::post("/register-permit",[JotFormController::class,"storePermitManual"]);
Route::get('/register-permit',function(){
    return view('forms.permit');
});
Route::get("/hosts",[UserController::class,"getHosts"]);
Route::post("/breakIn",[TransaksiController::class,"breakIn"]);
Route::post('/break/confirm',[TransaksiController::class,'breakConfirm']);
Route::get("/break",function(){
    return view("checked.break-in");
});

Route::get('/recruitment',[RecruitmentController::class,'index']);
Route::post('/recruitment',[RecruitmentController::class,'create']);
Route::post('/recruitment/batch',[RecruitmentController::class,'CreateBatch'])->name('recruitment.batch');
Route::post('/recruitment/check-in',[RecruitmentController::class,'CheckIN']);
Route::post('/recruitment/check-out',[RecruitmentController::class,'CheckOUT']);
Route::delete('/recruitment',[RecruitmentController::class,'DeleteRecruitment']);
Route::get('/recruitment/page',[RecruitmentController::class,'getPagination'])->name('recruitment.page');
Route::get('/recruitment/sample',[RecruitmentController::class,'DownloadSample'])->name('recruitment.sample');
Route::get('/recruitment-list',function (){
    return view('recruitment-list');
});
Route::get('/recruitment-list/data',[RecruitmentController::class,'getRecruitment']);

Route::get('/escorting-in',[EscortController::class,'index']);
/*Route::get('/artemis/user',[EkioskController::class,'GetListUserArtemis']);
Route::get('/artemis/user/{nik}',[EkioskController::class,'AddArtemisUser']);
Route::get('/artemis/reset',[EkioskController::class,'ResetArtemis']);*/
Route::post('/artemis/confirm',[EkioskController::class,'ConfirmArtemisData']);

Route::get('/vip-list/data',[PermitvipController::class,'getListPermit'])->name('vip.data');
Route::get('/vip-list',function(){
    return view('vip-list');
});
Route::post('/vip-list/check-in',[PermitvipController::class,'CheckIN']);
Route::post('/vip-list/check-out',[PermitvipController::class,'CheckOUT']);