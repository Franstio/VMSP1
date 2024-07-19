@extends('layouts.main')
@section('container')

<main id="main" class="main">
    <section class="section dashboard">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h4 class="mt-5 mb-2 text-gray-800"><strong>Vest Data</strong></h4>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="card border-0 shadow-sm">
                <div class="card-header">
                        <button class="btn btn-primary" id="btnAddNew">
                            Add New
                        </button>
                    </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                        <table id="table_vest" class="display" style="width:100%">
                        <thead class="bg-light">
                        <tr>
                            <th>No Vest</th>
                            <th>Status</th>
                            <th>Reason</th>
                            <th>Post By</th>
                            <th>Post Date</th>
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

        <!-- Modal Add or Edit-->
           <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Data Vest</strong> </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" class="form-control" name="id_vest" id="id_vest" >
                            <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">No Vest:</label>
                            <input type="text" class="form-control" name="noVest" id="noVest">
                            </div>
                            <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Status:</label>
                            <input type="text" class="form-control" name="status" id="status">
                            </div>
                            <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Reason:</label>
                            <input type="text" class="form-control" name="reason" id="reason">
                            </div>                       
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
                        </div>
                    </div>
                </div>
            </div>



        <!-- Modal -->
        <div class="modal fade" id="DeleteConfirmModal" tabindex="-2"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel">Are you sure want to delete?</h5>
                    </div>
                    <div class="modal-footer">
                            <button type=button id="btnDeleteNo" class="btn btn-secondary" >No</button>
                            <button type=submit id="btnDeleteYes" class="btn btn-danger" >Yes ! Delete it</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        </section>
</main>


<script type="text/javascript">
      var table = $("#table_vest").DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
                  "url":"vest/data",
                  "type": "GET",
                  "dataType": "json",
                  "data": function(data){
                    data.columns= JSON.stringify(data.columns);
                            data.draw = data.draw;
                            data.order=data.order;
                  }
        },
        columns:[
          { data: 'noVest'},
          { data: 'status'},
          { data: 'reason'},
          { data: 'postby'},
          { data: 'postdate'},
          { data: 'id_vest',
                render: function (data, type) {
                    if (type === 'display') {
                       return '<button id="btnEdit" class="btn btn-success open-modal" value="' + data+ '">Edit</button> <button id="btnDelete" class="btn btn-danger" value="' + data + '">Delete</button>';
                    }
                    return data;
                },
          }
        ],
    })

    $.ajax({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

     // Event Click Edit
   jQuery('body').on('click', '.open-modal', function(){
        var id_vest=$(this).val();
        $.ajax({
            url: "vest/show/" +id_vest,
            type: "GET",
            success: function(data){
                $("#id_vest").val(data.id_vest);
                $("#noVest").val(data.noVest);
                $("#status").val(data.status);
                $("#reason").val(data.reason);
                
                $("#formModal").modal('show');
            },
            error: function(response){
              console.log(response.responseJSON)
            }
        });
   });

   // Event Click Delete
   jQuery('body').on('click', '#btnDelete', function(){
    var id_vest=$(this).val();
    $("#id_vest").val(id_vest);
    $("#DeleteConfirmModal").modal('show');
   });

   // Add New Record
   $("#btnAddNew").click(function(e){
      $("#id_vest").val('');
      $("#noVest").val('');
      $("#status").val('');
      $("#reason").val('');
     
      $("#formModal").modal('show');
   });

   // Save Record
   $("#btnSave").click(function (e){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
          id_vest: $('#id').val(),
          noVest: $('#noVest').val(),
          status: $('#status').val(),
          reason: $('#reason').val(),
          };

        $.ajax({
          type: "PUT",
          url: "/vest/store",
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
                }, 2000);
            $("#formModal").modal('hide');
          },
          error: function(data){
            console.log(data);
          }
        });
   });

   // DELETE RECORD CANCEL
   $("#btnDeleteNo").click(function(e){
      $("#id_vest").val('');
      $("#DeleteConfirmModal").modal('hide');
   });

   // DELETE RECORD CONFIRM
   $("#btnDeleteYes").click(function (e){
      var id_vest= $('#id_vest').val();
      $.ajax({
        url: "vest/delete/" +id_vest,
        type: "GET",
        success: function(data){
          table.clear();
          table.ajax.reload();
          table.draw();
            $("#id_vest").val('');
            $("#DeleteConfirmModal").modal('hide');
        },
        error: function(response){
            console.log(response.responseJSON)
        }
      });
   });
   
  </script>



  @endsection
