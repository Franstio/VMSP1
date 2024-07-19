@extends('layouts.main')
@section('container')
  
<main id="main" class="main">
    <section class="section dashboard">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h4 class="mt-5 mb-2 text-gray-800"><strong>Location Data</strong></h4>
        </div>

@if(session()->has('success'))
  <div class="alert alert-success col-md-12" role="alert">
  {{ session('success')}}
  </div>
@endif
<div class="row">
            <div class="col-md-8">
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
                        <table id="table_location" class="display" style="width:100%">
                        <thead class="bg-light">
                              <tr>
                                  <th>Location Name</th>
                                  <th>Zone</th>
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

                       <!-- Modal -->
              <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><strong>Data Location</strong></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" class="form-control" name="id_location" id="id_location">
                        <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Location Name:</label>
                        <input type="text" class="form-control" name="nameLocation" id="nameLocation">
                        </div>
                        <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Zone</label>
                        <select class="form-select" aria-label="Default select example" name="zone" id="zone">
                        <option selected>- Select one -</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
                    </div>
                    </form>
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

</main>

   <script type="text/javascript">
      var table = $("#table_location").DataTable({
        processing: true,
        serverSide: true,

        "ajax": {
                  "url":"location/data",
                  "type": "GET",
                  "dataType": "json",
                  "data": function(data){
                    data.columns= JSON.stringify(data.columns);
                            data.draw = data.draw;
                            data.order=data.order;
                  }
        },
        columns:[
          { data: 'nameLocation'},
          { data: 'zone'},
          { data: 'postby'},
          { data: 'postdate'},
          { data: 'id_location',
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
        var id_location=$(this).val();
        $.ajax({
            url: "location/show/" +id_location,
            type: "GET",
            success: function(data){
                $("#id_location").val(data.id_location);
                $("#nameLocation").val(data.nameLocation);
                $("#zone").val(data.zone);

                $("#formModal").modal('show');
            },
            error: function(response){
              console.log(response.responseJSON)
            }
        });
   });

   // Event Click Delete
   jQuery('body').on('click', '#btnDelete', function(){
    var id_location=$(this).val();
    $("#id_location").val(id_location);
    $("#DeleteConfirmModal").modal('show');
   });

   // Add New Record
   $("#btnAddNew").click(function(e){
      $("#id_location").val('');
      $("#nameLocation").val('');
      $("#zone").val('');

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
          id_location: $('#id_location').val(),
          nameLocation: $('#nameLocation').val(),
          zone: $('#zone').val()
        };

        $.ajax({
          type: "PUT",
          url: "/location/store",
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
      $("#id_location").val('');
      $("#DeleteConfirmModal").modal('hide');
   });

   // DELETE RECORD CONFIRM
   $("#btnDeleteYes").click(function (e){
      var id_location= $('#id_location').val();
      $.ajax({
        url: "location/delete/" +id_location,
        type: "GET",
        success: function(data){
          table.clear();
          table.ajax.reload();
          table.draw();
            $("#id_location").val('');
            $("#DeleteConfirmModal").modal('hide');
        },
        error: function(response){
            console.log(response.responseJSON)
        }
      });
   });
   
  </script>

  
@endsection