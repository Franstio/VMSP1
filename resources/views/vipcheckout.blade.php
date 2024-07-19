@extends('layouts.main')
@section('container')

<main id="main" class="main">
<section class="section dashboard">
<div class="d-sm-flex align-items-center justify-content-between">
    <h4 class="mt-5 mb-2 text-gray-800"><strong>VIP List</strong></h4>
        </div>
     
            <div class="col-md-12">
              <div class="btn-group">
                <a href="/waiting" class="btn btn-secondary ">Visitor List</a>
                <a href="/manual" class="btn btn-secondary">Manual Input</a>
                <a href="/reject" class="btn btn-secondary">Reject List</a>
                <a href="/vipcheckin" class="btn btn-secondary">VIP Check-in</a>
                <a href="/vipcheckout" class="btn btn-secondary">VIP Check-out</a>
                <a href="/recruitment-list" class="btn btn-secondary">Recruitment List</a>
            </div>
     


            <div class="col-md-11">
                <div class="card border-0 shadow-sm">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                        <table id="table_vip" class="display" style="width:100%">
                        <thead class="bg-light">
                        <tr>
                            <th>Company Name</th>
                            <th>Visitor Name</th>
                            <th>Purpose</th>
                            <th>Host</th>
                            <th>Badge</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            </table>
                          </div>
                       </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit-->
           <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Data VIP</strong> </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                @csrf
                                <input type="hidden" class="form-control" name="id_permit" id="id_permit" >
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Company Name</label>
                                <select class="form-select" aria-label="Default select example" name="nameVendor" id="nameVendor">
                                <option selected>- Select one -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Visitor Name</label>
                                <input type="text" class="form-control" name="namaVisitor" id="namaVisitor">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">NRIC</label>
                                <input type="text" class="form-control" name="nik" id="nik">
                            </div>
                            <div class="mb-3">
                               <label for="recipient-name" class="col-form-label">Purpose</label>
                                <select class="form-select" aria-label="Default select example" name="purpose" id="purpose">
                                <option selected>- Select one -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Host</label>
                                <select class="form-select" aria-label="Default select example" name="name" id="name">
                                <option selected>- Select one -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Badge</label>
                                <select class="form-select" aria-label="Default select example" name="noBadge" id="noBadge">
                                <option selected>- Select one -</option>
                                </select>
                           </div>
                           <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Date From</label>
                                <input type="date" class="form-control" id="startDate" name="startDate">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Date To</label>
                                <input type="date" class="form-control" id="endDate" name="endDate">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Location</label>
                                <select class="form-select" aria-label="Default select example" name="nameLocation" id="nameLocation">
                                <option selected>- Select one -</option>
                                </select>
                             
                            </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
<script type="text/javascript">
     // Ajax Setup Auth
 $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    // Load Table
    var table = $("#table_vip").DataTable({
        processing: true,
        serverSide: true,
       // ajax: 'visitor/data',
        "ajax": {
						"url": "vipcheckin/data", //API
						"type": "GET",
                        "dataType": "json",
                        //"data":data
                        "data":function (data){
                            data.columns= JSON.stringify(data.columns);
                            data.draw = data.draw;
                            data.order=data.order;
                            data.status="Checkin"
                        }
					},
        columns: [
            { data: 'nameVendor' },
            { data: 'namaVisitor'},
            { data: 'purpose' },
            { data: 'name' },
            { data: 'noBadge' },
            { data: 'startDate' },
            { data: 'endDate' },
            { data: 'id_permit',
                render: function (data, type) {
                    if (type === 'display') {
                       return '<button class="btn btn-danger btnCheckout" onclick="check_out_data(this, event)" value="' + data+ '">Checkout</button>';
                    }
                    return data;
                },
            }
        ],
       
    })

    function check_out_data(btn, e) {
        console.log(e.target.value);

        var formData = {
           permit_id:e.target.value,
           status:'Checkout'
       }
          $.ajax({
          type: "POST",
          url: "/vipcheckin/updatestatus",
          data: formData,
          dataType: 'json',
          success: function (data) {
            Swal.fire({
              title: "Success!",
              text: "You clicked the button!",
              icon: "success",
              button: "OK!",
              timer: 3000
              });
              setTimeout(() => {
                  location.reload()
              }, 3000);
              console.log(data);
              table.clear();
              table.ajax.reload();
              table.draw();
              
              
            },
          error: function (data) {
              console.log(data);
          }
      });
    }

    
      
  </script>  

  @endsection
