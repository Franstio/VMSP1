@extends('layouts.main')
@section('container')

<main id="main" class="main">
<section class="section dashboard">
<div class="d-sm-flex align-items-center justify-content-between">    
        
     <div class="col-md-8 mt-3">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                  <h5 class="card-title">Approval Detail</h5>
                  <div class="text-end">
                    <h8 id="warningStatus" style="color:#f00c0c" ></h8>
                    <!--<h8 style="color:#f00c0c" >Employee data is not completed - Waiting Approval from HR-Dept</h8> -->
                </div>
                  <!-- Small tables -->
                  <div class="col-lg-8">
                    <table class="table table-borderless">
    
                      <tbody>
                        <tr>
                          <th scope="row" >Nama Company</th>
                          <td scope="row" style="width:1px">:</td>
                          <td scope="row" id="permitDetailVendor"></td>  
                        </tr>
                        <tr>
                          <th scope="row">Date</th>
                          <td scope="row">:</td>
                          <td id="permitDetailDate"></td>
                          
                        </tr>
                        <tr>
                          <th scope="row">Purpose</th>
                          <td scope="row">:</td>
                          <td id="permitDetailPurpose"></td>
    
                        </tr>
                        <tr>
                          <th scope="row">Task</th>
                          <td scope="row">:</td>
                          <td id="permitDetailtask"></td>
    
                        </tr>
                        <tr>
                          <th scope="row">Permit No.</th>
                          <td scope="row">:</td>
                          <td id="permitDetailPermitNo"></td>
    
                        </tr>
    
                      </tbody>
                    </table>
                    <!-- End small tables -->
                    </div>
                  <div class="col-lg-10">
                    <h5 class="card-title">List Anggota Kerja</h5>
                  <table class="table table-sm" id="permitDetailAnggota">
                    <thead>
                      <tr>
                        <th scope="col" >#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Registrasi</th>
                    </tr>
                    </thead>
                   <tbody>
                    </tbody>
                  </table>
                  <div class="col-lg-5">
                    <h5 class="card-title">Bring Recordable Media :</h5>  
                  <table class="table table-borderless col-lg-3" id="permitBarangBawaan">
                    
                    <tbody>
                      
    
                    </tbody>
                  </table>
                </div>
                  <div class="text-end">
                    <span data-bs-toggle="modal" data-bs-target="#staticApprovalDecline">
                        
                      <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" onclick="" data-bs-original-title="Decline" aria-label="Views"><span class="badge rounded-pill bg-danger">Decline</span></a>
                    </span>
                  <a id="generatebuttonxls" href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" onclick="" data-bs-original-title="Generate" aria-label="Views"><span class="badge rounded-pill bg-secondary">Generate</span></a>
                   
                </div>
                  </div>
    
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
</main>
      @endsection