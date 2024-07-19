@extends('layouts.main')
@section('container')

<main id="main" class="main">
  <section class="section dashboard mt-5">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h4><strong>Visitor Waiting Approval</strong></h4>
    </div>
    <div class="col-md-3">
    </div>
    </div>
    <div class="col-md-11 mt-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                <div class="p">
                  <table class="table" id="table_approval">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col">Location</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Host</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Date From</th>
                        <th scope="col">Date To</th>
                        <th scope="col">Action</th>
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

    <!-- Modal Add or Edit Location-->
    <div class="modal fade" id="formModalLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Location</strong> </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            @csrf
            <input type="hidden" class="form-control" name="id" id="id">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">name Location</label>
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

    <!--Modal Lihat Detail -->
    <div class="modal fade" id="formModal" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Approval Detail</h5>
                <div class="text-end">
                  <h8 id="warningStatus" style="color:#f00c0c"></h8>
                  <!--<h8 style="color:#f00c0c" >Employee data is not completed - Waiting Approval from HR-Dept</h8> -->
                </div>
                <!-- Small tables -->
                <div class="col-lg-8">

                  <input type="hidden" class="form-control" name="id" id="id">
                  <div id="permitDiv"></div>

                  <!-- End small tables -->
                </div>
                <div class="col-lg-10">
                  <h5 class="card-title">List Anggota Kerja</h5>

                  <div id="permitMemberDiv"></div>

                  <!-- End small tables -->
                  <div class="col-lg-12">
                    <h5 class="card-title">Bring Recordable Media :</h5>
                    <div id="permitBarangBawaan"></div>
                     
                  </div>
                  <div class="text-end">
                    <span data-bs-toggle="modal" data-bs-target="#staticApprovalDecline">

                      <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" onclick="" data-bs-original-title="Decline" aria-label="Views"><span class="badge rounded-pill bg-danger">Decline</span></a>
                    </span>
                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" onclick="approve_data()" data-bs-original-title="Generate" aria-label="Views"><span class="badge rounded-pill bg-success">Approve</span></a>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div><!-- End Extra Large Modal-->


    <!-- Modal Komentar Decline -->
    <div class="modal fade" id="staticApprovalDecline" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <h5 id="edit" class="card-title">Please enter the reason for the rejection of approval</h5>

                <!-- General Form Elements -->

                <input type="hidden" class="form-control" id="permit_id" name="permit_id">
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <textarea id="reason" name="reason" class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>


                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button onclick='kirimEmailDecline()' name="formEdit" value="editPhoto" class="btn btn-danger">Decline Approval</button>
                  </div>
                </div>

                <!-- End General Form Elements -->

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
</main>
<script type="text/javascript">
  // Ajax Setup Auth
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // Load Table
  var table = $("#table_approval").DataTable({
    processing: true,
    serverSide: true,
    // ajax: 'visitor/data',
    "ajax": {
      "url": "VisitorApproval/data", //API
      "type": "GET",
      "dataType": "json",
      //"data":data
      "data": function(data) {
        data.columns = JSON.stringify(data.columns);
        data.draw = data.draw;
        data.order = data.order;
        data.status = "waitingadmin"
      }
    },
    columns: [{
        data: 'id',
        render: function(data, type) {
          if (type === 'display') {
            return '<button id="btnSelect" class="btn btn-secondary open-modal" value="' + data + '">Select Location</button> ';
          }
          return data;
        },
      },
      {
        data: 'nameVendor',
        /*  render: function(data, type, row, meta) {
           let row_data = JSON.parse(row.anggota)
           return row_data.Nama
         }, */
      },
      {
        data: 'email',
        /*  render: function(data, type, row, meta) {
           let row_data = JSON.parse(row.anggota)
           return row_data.NIK
         }, */
      },
      {
        data: 'name'
      },

      {
        data: 'purpose'
      },
      {
        data: 'startDate'
      },
      {
        data: 'endDate'
      },

      {
        data: 'id',
        render: function(data, type) {
          if (type === 'display') {
            return '<button id="btnDetail" class="btn btn-success open-modal" value="' + data + '">Detail</button>';
          }
          return data;
        },
      }
    ],

  })

  // Load Location
  $.ajax({
    url: "select/location",
    method: "GET",
    async: true,
    dataType: 'json',
    success: function(data) {
      var html = '';
      var i;
      for (i = 0; i < data.data.length; i++) {
        html += '<option value="' + data.data[i].nameLocation + '">' + data.data[i].nameLocation + '</option>';
      }
      $('#nameLocation').html(html);

    }
  })


  // Save Record
  $("#btnSave").click(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    var formData = {
      id: $('#id').val(),
      nameLocation: $('#nameLocation').val(),

    };

    $.ajax({
      type: "PUT",
      url: "/permit/store",
      data: formData,
      dataType: 'json',
      success: function(data) {
        //$("#formModal").modal('hide');
        $("#formModalLocation").modal('hide');
      },
      error: function(data) {
        console.log(data);
      }
    });
  });

  // Select update
  jQuery('body').on('click', '#btnSelect', function() {

    var id = $(this).val();
    $("#id").val(id);
    console.log('ID' + id);
    $.ajax({
      url: "permit/show/" + id,
      type: "GET",
      success: function(data) {
        $("#id").val(data.id);
        $("#nameLocation").val(data.nameLocation);

        $("#formModalLocation").modal('show');
      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

  });

  // Event Click Detail
  jQuery('body').on('click', '#btnDetail', function() {
    var id = $(this).val();
    $("#id").val(id);

    generatePermitModal(id);
     
    $("#formModal").modal('show');
  });

   function generatePermitModal(strId) {
 //Fetch Table Header
 $.ajax({
      url: "api/permitbyid/" + strId,
      type: "GET",
      success: function(data) {
        generatePermit(data);
      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

    //Fetch Table Member
    $.ajax({
      url: "api/permitmemberbyid/" + strId,
      type: "GET",
      success: function(data) {
        generatePermitMember(data);
      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

   //Fetch Table Member
   $.ajax({
      url: "api/permittoolbyid/" + strId,
      type: "GET",
      success: function(data) {
        generatePermitTool(data);
      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

    }


  function generatePermit(data) {
      var htmlContent = '<div class="container-fluid">';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>No E-Request</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="id" value="' + data.id + '"></div></div>';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Company Name</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="nameVendor" value="' + data.nameVendor + '"></div></div>';
      htmlContent += '<div class="mb-1 row"><label for="staticEmail" class="col-sm-3"><strong>Date</strong></label><div class="col-sm-3"><input type="text" class="form-control-plaintext" id="startDate" value="' + data.startDate + '"></div><div class="col"><input type="text" class="form-control-plaintext" id="endDate" value="' + data.endDate + '"></div></div> ';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Purpose</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="purpose" value="' + data.purpose + '"></div></div>';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Task</strong></label><div class="col-sm-8"><input type="text"  class="form-control-plaintext" id="desk" value="' + data.desk + '"></div></div>';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Permit No</strong></label><div class="col-sm-8"><input type="text"  class="form-control-plaintext" id="permitNo" value="' + data.permitNo || ''+ '"></div></div>';
      htmlContent += '</div>';
      $('#permitDiv').html(htmlContent);

    }

    function generatePermitMember(data) {
      var htmlContent = '<table class="table table-sm">';
      htmlContent += '<thead class="alert alert-secondary"><tr><th scope="col" >#</th><th scope="col">Nama</th><th scope="col">Jabatan</th><th scope="col">NIK</th><th scope="col">Registrasi</th></tr>';
      htmlContent += '</thead><tbody>';
     console.log(data);
      $.each(data, function(i, item) {
        htmlContent += '<tr><th scope="row">' + i + '</td><td>' + item.namaVisitor + '</td>  <td>' + item.jabatan + '</td> <td>' + item.nik + '</td> <td>' + item.regis + '</td></tr> ';
      });
      htmlContent += '</tbody></table>';
      $('#permitMemberDiv').html(htmlContent);
    };



    function generatePermitTool(data) {
      var htmlContent = '<table class="table table-sm">';
      htmlContent += '<thead class="alert alert-secondary"><tr><th scope="col" >#</th><th scope="col">Nama Pemilik</th><th scope="col">NIK</th><th scope="col">SN</th><th scope="col">Jenis Media</th><th scope="col">Tujuan</th></tr>';
      htmlContent += '</thead><tbody>';
     // console.log(data);
      $.each(data, function(i, item) {
        //console.log(item);
        htmlContent += '<tr><td scope="row">' + i + '</td><td>' + item.namaPemilik + '</td>  <td>' + item.nik + '</td> <td>' + item.SN + '</td> <td>' + item.jenisMedia + '</td><td>' + item.tujuan + '</td></tr> ';
      });
      htmlContent += '</tbody></table>';
      $('#permitBarangBawaan').html(htmlContent);
    };

  
 

  // Event Click Reject
  jQuery('body').on('click', '#btnReject', function() {
    var id = $(this).val();
    $("#id").val(id);
    console.log('ID' + id);
    $.ajax({
      url: "permit/show/" + id,
      type: "GET",
      success: function(data) {
        $("#id").val(data.id);
        $("#reason").val(data.reason);
        $("#staticApprovalDecline").modal('show');
      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

  });

  function kirimEmailDecline(btn, e) {
    var id = $('#id').val();
    var formData = {
      permit_id: id,
      reason: $('#reason').val(),

    }

    $.ajax({
      type: "POST",
      url: "/VisitorApproval/reject",
      data: formData,
      dataType: 'json',
      success: function(data) {
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
        $("#staticApprovalDecline").modal('hide');


      },
      error: function(data) {
        console.log(data);
      }
    });

  }


  function approve_data(btn, e) {
    var id = $('#id').val();
    var formData = {
      permit_id: id,


    }

    $.ajax({
      type: "POST",
      url: "/VisitorApproval/approve",
      data: formData,
      dataType: 'json',
      success: function(data) {
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
        console.log(data);
        table.clear();
        table.ajax.reload();
        table.draw();

      },
      error: function(data) {
        console.log(data);
      }
    });


  }

</script>

@endsection