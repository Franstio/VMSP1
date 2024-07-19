@extends('layouts.main')
@section('container')

<main id="main" class="main">
  <section class="section dashboard mt-5">

    <div class="d-sm-flex align-items-center justify-content-between">
      <h4><strong>Approval History</strong></h4>
    </div>

    <div class="col-md-3">
    </div>
    </div>
    <div class="col-md-12 mt-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="card-title">Approval History</h6>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                <div class="p">
                  <table class="table" id="table_history">
                    <thead class="bg-light">
                      <th scope="col">Location</th>
                      <th scope="col">Company Name</th>
                      <th scope="col">Requestor Name</th>
                      <th scope="col">ID Number</th>
                      <th scope="col">Purpose</th>
                      <th scope="col">Date From</th>
                      <th scope="col">Date To</th>
                      <th scope="col">email</th>
                      <th scope="col">status</th>
                      <th scope="col">Host</th>
                      <th scope="col">Action</th>
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
    <div class="modal fade" id="completeModal" tabindex="-2" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-body" style="
                                padding-top: 0px;
                                padding-right: 0px;
                                padding-left: 0px;
                                padding-bottom: 0px;
                            ">
            <div class="card">
              <div class="card-body" style="
                            padding-top: 0px;
                            padding-left: 0px;
                            padding-bottom: 0px;
                            padding-right: 0px;
                            ">

                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                  <img id="photoPermit" src="" alt="Profile" style="height: 350px;" /><br><br>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
                    <div id="permitBarangBawaan">
                    </div>
                  </div>
                  <div class="text-end">
                  <span data-bs-toggle="modal" data-bs-target="#staticApprovalDecline">
                  <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" onclick="ExportToExcel('xlsx')" data-bs-original-title="Generate" aria-label="Views" id="btnDownload"><span class="badge rounded-pill bg-success">Resend QR Code</span></a>
                  <a href="javascript:;" class="text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" onclick="" id="btnSave" type="submit" aria-label="Views"><span class="badge rounded-pill bg-primary">Save</span></a>
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

    <!-- Button trigger modal -->
    
    
    <!-- Modal -->
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Change & Send Approval Mail</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form id="frmEmail" >
              <input type="hidden" id="idApproval"/>
              <input type="email" class="form-control" name="newEmail" id="newEmail" value=""/>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="btnChangeMail"  class="btn btn-primary">Save</button>
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
  function showCompleteModal(id){
    $.ajax({
      url : 'api/permit/image/'+id,
      method: "GET",
      success:function(res)
      {
        $("#photoPermit").attr("src",'/storage/'+res);
        $("#completeModal").modal('show');
      }
    })
  }
  var table = $("#table_history").DataTable({
      processing: true,
      serverSide: true,
      "ajax": {
        "url": "history/approvedapproval", //API
        "type": "GET",
        "dataType": "json",
        //"data":data
        "data": function(data) {
          data.columns = JSON.stringify(data.columns);
          data.draw = data.draw;
          data.order = data.order;
          data.status = "approved"
        }
      },
      columns: [

        {
          data: 'nameLocation',
          visible:false
        },
        {
          data: 'nameVendor'
        },
        {
          data:"Nama"
        },
        {
          data:"NIK",
          render: function(data)
          {
              const str = new String(data);
              return str.substring(0,str.length > 5 ? 5 : str.length);
          }
        },
        {
          data: 'purpose'
        },
        {
          data: 'startDate',
          render: function(data)
          {
            return new Date(data).toDateString() + " " + new Date(data).toLocaleTimeString();
          }
        },
        {
          data: 'endDate',
          render: function(data)
          {
            return new Date(data).toDateString() + " " + new Date(data).toLocaleTimeString();
          }
        },
        {
          data: 'email'
        },
        {
          data: 'status',
          visible:false
        },
        {
          data: 'host',
          visible:false
        },
        {
          data: 'id',
          render: function(data, type,row) {
            if (type === 'display') {
              return '<div class="d-flex gap-1 flex-row"><button id="btnDetail" class="btn btn-success open-modal" value="' + data + '">Detail</button> <button class="btn btn-danger btnExpired" onclick="set_expired_data(this, event)" value="' + data + '">Set Expired</button><button onclick="showCompleteModal(\''+data+'\' )" class="btn btn-success">Complete</button> <button type="button" class="btn btn-primary " onclick="showEmailModal(\''+row.id+'\')" >Change Mail</button></div>';
            }
            return data;
          },
        }
      ],

    });
    
    function showEmailModal(x)
    {
      $.ajax({
        method:"GET",
        url : "/api/permitbyid/"+x,
        success:function(data){
          $("#idApproval").val(data.id);
          $("#newEmail").val(data.email)
          $("#emailModal").modal('show');
        }
      });
    }
    $("#btnChangeMail").on('click',function(){
      $.ajax({
        method:"POST",
        url: "/permit/updatemail",
        data: {id : $("#idApproval").val(),mail: $("#newEmail").val(),qr: "resend"},
        success:function(){
          Swal.fire({
          title: "Success!",
          text: "QR have been successfully resend!",
          icon: "success",
          button: "OK!",
          timer: 3000
        });
        }
      })
    });
     // Event Click Detail
    jQuery('body').on('click', '#btnDetail', function() {
      var id = $(this).val();
      $("#id").val(id);

      //Fetch Table Header
      $.ajax({
        url: "api/permitbyid/" + id,
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
        url: "api/permitmemberbyid/" + id,
        type: "GET",
        success: function(data) {
          generatePermitMember(data);
        },
        error: function(response) {
          console.log(response.responseJSON)
        }
      });


      function generatePermit(data) {
        var htmlContent = '<div class="container-fluid">';
        htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>No Reference</strong></label><div class="col-sm-8"><input type="text" readonly class="form-control-plaintext"  id="id" value="' + data.id + '"></div></div>';
        htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Company Name</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="nameVendor" value="' + data.nameVendor + '"></div></div>';
        htmlContent += '<div class="mb-1 row"><label for="staticEmail" class="col-sm-3"><strong>Date</strong></label><div class="col-sm-3"><input type="text" class="form-control-plaintext" id="startDate" value="' + data.startDate +'"></div><div class="col"><input type="text" class="form-control-plaintext" id="endDate" value="' + data.endDate + '"></div></div> ';
        htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Purpose</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="purpose" value="' + data.purpose + '"></div></div>';
        htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Task</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="desk" value="' + data.desk + '"></div></div>';
        htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Permit No</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="permitNo" value="' + data.permitNo + '"></div></div>';
        htmlContent += '</div>';
        $('#permitDiv').html(htmlContent);

      }

      function generatePermitMember(data) {
        var htmlContent = '<table class="table table-sm">';
        htmlContent += '<thead class="alert alert-secondary"><tr><th scope="col" >No</th><th scope="col">Nama</th><th scope="col">Jabatan</th><th scope="col">NIK</th><th scope="col">Registrasi</th></tr>';
        htmlContent += '</thead><tbody>';

        $.each(data, function(i, item) {
          htmlContent += '<tr><th scope="row">' + (i+1) + '</td><td>' + item.namaVisitor + '</td>  <td>' + item.jabatan + '</td> <td>' + item.nik + '</td> <td>' + item.regis + '</td></tr> ';
        });
        htmlContent += '</tbody></table>';
        $('#permitMemberDiv').html(htmlContent);
      };

       //Fetch Table Member
       $.ajax({
      url: "api/permittoolbyid/" + id,
      type: "GET",
      success: function(data) {
        generatePermitTool(data);
      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

    function generatePermitTool(data) {
      var htmlContent = '<table class="table table-sm">';
      htmlContent += '<thead class="alert alert-secondary"><tr><th scope="col" >No</th><th scope="col">NIK</th><th scope="col">SN</th><th scope="col">Jenis Media</th><th scope="col">Tujuan</th></tr>';
      htmlContent += '</thead><tbody>';

      $.each(data, function(i, item) {
        htmlContent += '<tr><th scope="row">' + i+ '</td></td><td>' + item.nik + '</td>  <td>' + item.sn + '</td> <td>' + item.description+ '</td> <td>' + item.purpose + '</td><td></tr>';
      });
      htmlContent += '</tbody></table>';
      $('#permitBarangBawaan').html(htmlContent);
    };


      $("#formModal").modal('show');

    });


  function ExportToExcel(type, fn, dl) {
    var id = $('#id').val();
    $.ajax({
      url: "/export/permitbytemplate/" + id+"?qr=resend",
      method: "GET",
      success: function(){
        Swal.fire({
          title: "Success!",
          text: "QR have been successfully resend!",
          icon: "success",
          button: "OK!",
          timer: 3000
        });
      }
    })
    //window.location.href = "/export/permitbytemplate/" + id+"?qr=resend";
/*    var wb = XLSX.utils.table_to_book(elt, {
      sheet: "sheet1"
    });
    return dl ?
      XLSX.write(wb, {
        bookType: type,
        bookSST: true,
        type: 'base64'
      }) :
      XLSX.writeFile(wb, fn || ('VisitorApprovalBT.' + (type || 'xlsx')));
*/

  }

  function set_expired_data(btn, e) {
    console.log(e.target.value);
    var formData = {
      id: e.target.value,
      status: "Expired"
    }

    $.ajax({
      type: "POST",
      url: "api/updatestatus",
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


      },
      error: function(data) {
        console.log(data);
      }
    });


  }

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
            startDate: $('#startDate').val(),
            endDate: $('#endDate').val(),
            purpose: $('#purpose').val(),
            desk: $('#desk').val(),
            permitNo: $('#permitNo').val(),
                       
        };
            $.ajax({
            type: "PUT",
            url: "/history/store",
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
                /*  console.log(data);
                table.clear();
                table.ajax.reload();
                table.draw(); */
                $("#formModal").modal('hide');
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

</script>

@endsection