@extends('layouts.main')
@section('container')

<main id="main" class="main">
<section class="section dashboard">
<div class="d-sm-flex align-items-center justify-content-between">
    <h4 class="mt-5 mb-2 text-gray-800">Visitor List</h4>
        </div>
     
      <div class="col-md-12">
        <div class="btn-group">
          <a href="/waiting" class="btn btn-primary ">Visitor List</a>
          <a href="/manual" class="btn btn-primary">Manual Input</a>
          <a href="/reject" class="btn btn-primary">Reject List</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                  <table class="table" id="table_waiting">
                  <thead class="bg-light">
                      <tr>
                        <th>All</th>
                        <th>Visitor Name</th>
                        <th>Purpose</th>
                        <th>Host</th>
                        <th>Company Name</th>
                        <th>Badge Number</th>
                        <th>Temp</th>
                      </tr>
                    </thead>
                   </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-checkin">
          <div class="card-header text-center font-weight-bold" style="font-size: 23px;line-height: 23px;letter-spacing: -0.003em;font-weight: 900;font-style: normal;">
            Waiting List
          </div>         

            <div class="card info-card">
          <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="card-icon d-flex align-items-center justify-content-center">
            <img src="{{ asset ('storage/' . $data->photo)}}" alt="Profile" style="padding-left: 30px;" class=" me-3" height="100" >
            </div>
            <div class="ps-3" style="margin-left: 25px;">
              <h8 class="text-dark" style="font-size: 25px">{{$data['namaVisitor']}}</h8><br>
              <h8 class="text-dark" style="font-size: 20px">{{$data['nik']}}</h8><br>
              <h8 class="text-dark" style="font-size: 15px">{{$data['nameVendor']}}</h8><br>
              <br>
              <h8 class="text-dark" style="font-size: 15px">Host  :{{$user[$data['name']]['name']}}</h8><br>
              <h8 class="text-dark" style="font-size: 15px">To.{{$location[$data['nameLocation']]['nameLocation']}}</h8> <b style="color:#f00c0c"> </b><br>
                  
          </div> 
              <div class="ps-5">
              <img src="/img/card.png" alt="Profile" class=" me-3" style="border-top-style: solid;padding-bottom: 20px; ">
          <span class="text-primary" style="font-size: 50px;line-height: 0px;letter-spacing: -0.1em;font-weight: 500;">{{$data['noBadge']}}</span>          
         <br>
         <br>
          <img src="/img/id-vest.png" alt="Profile" class=" me-3" style="border-top-style: solid;padding-bottom: 20px;">
          <span class="text-primary" style="font-size: 50px;line-height: 0px;letter-spacing: -0.1em;font-weight: 500;">{{$data['noVest']}}</span>
              
              </div>  
          <div class=" ps-5 ">
          <span data-bs-toggle="modal" data-bs-target="#exampleModal">
          <img src="/img/pencil-square.svg" alt="Profile" class=" me-2" style="border-top-style: solid;padding-bottom: 20px; "data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-label="Views">
             </span>
             <br>
             <br>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalReject">
 reject
</button>

<!-- Modal -->
<div class="modal fade" id="ModalReject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
<div class="modal-content">
               <div class="modal-body" alt="Profile">
           <div class="modal-body">
      <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label"><h3 class="text-dark">Remarks</h3></label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Reject</button>
      </div>
    </div>
  </div>
</div>
              <br>   
          </div>
          <div class="ps-5 ">
          <!-- Button trigger modal -->
        
             </div>
          </div>
          </div>
        </div> 
        </div>
  
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" alt="Profile">
                    <div class="mb-3 row">
                       <label for="inputState" class="col-sm-4 col-form-label">No Badge </label>
                       <div class="col-sm-7">
                          <select id="inputState" class="form-select" name="noBadge">
                            <option value="{{$data->noBadge}}">{{$data->noBadge}}</option>   
                        </select>
                      </div>
                      </div>     
                      <div class="mb-3 row">
                       <label for="inputState" class="col-sm-4 col-form-label">No Vest </label>
                       <div class="col-sm-7">
                          <select id="inputState" class="form-select" name="noBadge">
                           <option value="{{$data->noVest}}">{{$data->noVest}}</option>  
                        </select>
                      </div>
                      </div>   
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-success">Edit</button>
                    </div>
                  </div>
                </div>
              </div>                  
       </section>
  



<!--modal tombol View Checkin -->
<div class="modal fade" id="viewCheckin" tabindex="-1">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Host</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       With Host
          
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger">No</button>
      </div>
    </div>
  </div>
</div><!-- End Extra Large Modal-->

<script>
  $("#table_waiting").DataTable({
    "order" : [],
      "ordering" : false
  })
</script>

@endsection