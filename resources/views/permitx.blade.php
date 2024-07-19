@extends('layouts.main')
@section('container')
       
<main id="main" class="main">
<section class="section dashboard">
<div class="d-sm-flex align-items-center justify-content-between">
    <h4 class="mt-5 mb-2 text-gray-800"><strong>VIP Approval Application</strong></h4>
        </div>        
        <div class="col-md-3">
           </div>
         </div>
          <div class="col-md-11 mt-3">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
              <button class="btn btn-primary" id="btnAddNew">
                            Add New
                        </button>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                      <div class="p">
                      <table class="table" id="table_permitvip">
                        <thead class="bg-light">
                          <tr>
                            <th>Location</th>
                            <th>Company Name</th>
                            <th>Visitor Name</th>
                            <th>Host</th>
                            <th>Purpose</th>
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
            </div>
          </div>
</div>      

<!-- Modal Add or Edit-->
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Permit VIP</strong> </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        @csrf
                          <input type="hidden" class="form-control" name="id" id="id" >
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
                          <label for="recipient-name" class="col-form-label">No Badge</label>
                          <select class="form-select" aria-label="Default select example" name="noBadge" id="noBadge">
                          <option selected>- Select one -</option>
                          </select>
                          </div>
                          <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Purpose</label>
                          <select class="form-select" aria-label="Default select example" name="purpose" id="purpose">
                          <option selected>- Select one -</option>
                          </select>
                          </div>
                          <div class="mb-3">
                          <label for="inputEmail4" class="form-label">Date From</label>
                          <input type="date" class="form-control" id="startDate">
                          </div>
                          <div class="mb-3">
                          <label for="inputPassword4" class="form-label">Date To</label>
                          <input type="date" class="form-control" id="endDate">
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

</main>
<script type="text/javascript">

var table = $("#table_permitvip").DataTable({
        processing: true,
        serverSide: true,

        "ajax": {
						"url": "permitvip/data", //API
						"type": "GET",
                        "dataType": "json",
                        "data":function (data){
                            data.columns= JSON.stringify(data.columns);
                            data.draw = data.draw;
                            data.order=data.order;
                        }
					},
        columns: [
            { data: 'nameLocation'},
            { data: 'nameVendor' },
            { data: 'namaVisitor' },
            { data: 'nik' },
            { data: 'noBadge' },
            { data: 'purpose'},
            { data: 'startDate'},
            { data: 'endDate'},
            { data: 'id',
                render: function (data, type) {
                    if (type === 'display') {
                        return '<button id="btnEdit" class="btn btn-success open-modal" value="' + data+ '">Edit</button>';
                    }
                    return data;
                },
            }
        ],
       
    })

  // Ajax Setup Auth
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   // Load Purpose
   $.ajax({
					url: "select/purpose",
					method: "GET",
                    async: true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i < data.data.length; i++){
                            html += '<option value="'+data.data[i].purpose+'">'+data.data[i].purpose+'</option>';
                        }
                        $('#purpose').html(html);

                    }
				})
    
    // Load Vendor
    $.ajax({
					url: "select/vendor",
					method: "GET",
                    async: true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i < data.data.length; i++){
                            html += '<option value="'+data.data[i].nameVendor+'">'+data.data[i].nameVendor+'</option>';
                        }
                        $('#nameVendor').html(html);

                    }
				})

    // Load Location
    $.ajax({
					url: "select/location",
					method: "GET",
                    async: true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i < data.data.length; i++){
                            html += '<option value="'+data.data[i].nameLocation+'">'+data.data[i].nameLocation+'</option>';
                        }
                        $('#nameLocation').html(html);

                    }
				})

    // Load Badge
    $.ajax({
					url: "select/badge",
					method: "GET",
                    async: true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i < data.data.length; i++){
                            html += '<option value="'+data.data[i].noBadge+'">'+data.data[i].noBadge+'</option>';
                        }
                        $('#noBadge').html(html);

                    }
				})

         // Add New Record
    $("#btnAddNew").click(function (e) {
        $("#id").val('');
        $("#nameVendor").val('');
        $("#namaVisitor").val('');
        $("#nik").val('');
        $("#noBadge").val('');
        $("#purpose").val('');
        $("#startDate").val('');
        $("#endDate").val('');
        $("#nameLocation").val('');
       
        $("#formModal").modal('show');
    });   
 
      // Save Record
     $("#btnSave").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            id: $('#id').val(),
            nameVendor: $('#nameVendor').val(),
            namaVisitor: $('#namaVisitor').val(),
            nik: $('#nik').val(),
            noBadge: $('#noBadge').val(),
            purpose: $('#purpose').val(),
            startDate: $('#startDate').val(),
            endDate: $('#endDate').val(),
            nameLocation: $('#nameLocation').val(),
        };
      
        $.ajax({
            type: "PUT",
            url: "/permitvip/store",
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
                /* $(`input[type="text"]`).val('')
                $(`select`).val('').removeAttr('checked') */
             },
            error: function (data) {
                console.log(data);
            }
        });
    });

        // Event Click Edit
        jQuery('body').on('click', '.open-modal', function () {
        var id=$(this).val();
        console.log('id',id);
        $.ajax({
                url: "permitvip/show/" + id,
                type: "GET",
                success: function(data) {
                     $("#id_badge").val(data.id_badge);
                     $("#noBadge").val(data.noBadge);
                     $("#Rfid").val(data.Rfid);
                     $("#nameType").val(data.nameType);
                     $("#status").val(data.status);
                     $("#reason").val(data.reason);
                    
                     $("#formModal").modal('show');
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });

    });


    $("#btnReset").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $(`input[type="text"]`).val('')
        $(`select`).val('').removeAttr('checked')
    
});

</script>

  @endsection