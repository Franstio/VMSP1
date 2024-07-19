@extends('layouts.main')
@section('container')

<main id="main" class="main">
  <section class="section dashboard mt-5">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h4><strong>Approval Page</strong></h4>
    </div>
    <div class="col-md-3">
    </div>
    </div>
    <div class="col-md-11 mt-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h6 class="card-title">Approval</h6>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                <div class="p">
                  <table class="table" id="table_approval">
                    <thead class="bg-light">
                      <tr>
                        <th scope="col">Location</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Requestor Name</th>
                        <th scope="col">ID Type</th>
                        <th scope="col">ID Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Host</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Date From</th>
                        <th scope="col">Date To</th>
                        <th scope="col" >Status</th>
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
                    <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" onclick="ExportToExcel('xlsx')" data-bs-original-title="Generate" aria-label="Views" id="btnDownload"><span class="badge rounded-pill bg-success">Generate</span></a>
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


    <!-- Modal Change Photo-->
    <div class="modal fade" id="changePhotoModal" tabindex="-2" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
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
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="uploadPermit" name="filename" onchange="loadFile(event)" accept="image/*;capture=camera">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type=submit id="btnSubmitImage" class="btn btn-primary">Upload E-approval</button>
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
    </div>
    </form>



    <!-- Modal Komentar Decline -->
    <div class="modal fade" id="staticApprovalDecline" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <h5 id="edit" class="card-title">Please enter the reason for the rejection of approval</h5>

                <!-- General Form Elements -->

                <input type="hidden" class="form-control" id="idPermitReject" name="userNamee">
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

    <!-- Modal Upload Sukses -->
    <div class="modal fade" id="popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <h4 id="edit" class="card-title d-none text-center pb-0 fs-4">Approval has been uploaded successfully.</h4>
                <h3 id="edit2" class="card-title text-center pb-0 fs-4">The QR code has been sent to the requestor's email.</h3>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button onClick="refreshPage()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
            <button type="submit" class="btn btn-primary" id="btnSimpan">Save</button>
          </div>
        </div>
      </div>
    </div>


</main>
<script type="text/javascript">
  // Load Table
  var table = $("#table_approval").DataTable({
    processing: true,
    serverSide: true,
    "ajax": {
      "url": "api/waitingapproval", //API
      "type": "GET",
      "dataType": "json",
      //"data":data
      "data": function(data) {
        data.columns = JSON.stringify(data.columns);
        data.draw = data.draw;
        data.order = data.order;
       
      }
    },
    columns: [

      {
        data: 'id',
        render: function(data, type,row) {
          if (type === 'display') {
            return '<button id="btnSelect" class="btn btn-secondary open-modal" value="' + data + '">'+ (row.nameLocation==undefined|| row.nameLocation=='' ? "Select Location" : row.nameLocation) + '</button> ';
          }
          return data;
        },
      },
      {
        data: 'nameVendor'
      },
      {
        data:'Nama'
      },
      {
        data:'idType'
      },
      {
        data:'NIK',
        render: function (data,type)
        {
          const str = new String(data);
          return str.substring(0,str.length > 5 ? 5 : str.length);
        }
      }
      ,
      {
        data: 'email',
        visible:false
      },
      {
        data: 'host',
        visible:false
      },
      {
        data: 'purpose'
      },
      {
        data: 'startDate',
        render: function(data,type){
          const value = new Date(data);
          return value.toDateString() + " " + value.toLocaleTimeString();
        }
      },
      {
        data: 'endDate',
        render: function(data,type){
          const value = new Date(data);
          return value.toDateString() + " " + value.toLocaleTimeString();
        }
      },
      {
        data: 'status',
        visible:false
      },
      {
        data: 'id',
        render: function(data, type) {

          if (type === 'display') {
            return '<button id="btnUpload" class="btn btn-secondary open-photo" value="' + data + '" onClick="showImage(this)" >Upload E-Request</button> <button id="btnDetail" class="btn btn-success open-modal" value="' + data + '">Detail</button> ';
          }
          return data;
        },
      }
    ],

    
  })

  table.on( 'draw', function () {
   // console.log( 'Redraw occurred at: '+new Date().getTime() );
    var rows =table.rows().nodes();

    rows.each(function(index){
      var rowData=table.row(this).data();
      console.log(rowData);
      if (rowData.status === 'waitinghost'){
        $('#btnUpload').prop('disabled',true);
      }
      else{
        $("#btnUpload").removeClass("btn-secondary").addClass("btn-warning text-white");
      }

    })
 } );

  // Ajax Setup Auth
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

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
  // Save Record
  $("#btnSimpan").click(function(e) {
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
      $("#formModalLocation").modal('hide');
      $("#table_approval").DataTable().ajax.reload();
      },
      error: function(data) {
        console.log(data);
      }
    });
  });

  // Event Click Photo
  jQuery('body').on('click', '#btnUpload', function() {
    var id = $(this).val();
    $("#id").val(id);
    $("#changePhotoModal").modal('show');
  });

  // Event Click Download
  jQuery('body').on('click', '#btnDownload', function() {
    var id = $(this).val();
    $("#popup").modal('show');

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
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>No Reference</strong></label><div class="col-sm-8"><input type="text" readonly class="form-control-plaintext" id="id" value="' + data.id + '"></div></div>';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Company Name</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="nameVendor" value="' + data.nameVendor + '"></div></div>';
      htmlContent += '<div class="mb-1 row"><label for="staticEmail" class="col-sm-3"><strong>Date</strong></label><div class="col-sm-3"><input type="text" class="form-control-plaintext" id="startDate" value="' + data.startDate +'"></div><div class="col"><input type="text" class="form-control-plaintext" id="endDate" value="' + data.endDate + '"></div></div> ';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Purpose</strong></label><div class="col-sm-8"><input type="text" class="form-control-plaintext" id="purpose" value="' + data.purpose + '"></div></div>';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Task</strong></label><div class="col-sm-8"><input type="text"  class="form-control-plaintext" id="desk" value="' + data.desk + '"></div></div>';
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>Permit No</strong></label><div class="col-sm-8"><input type="text"  class="form-control-plaintext" id="permitNo" value="' + data.permitNo + '"></div></div>';
      htmlContent += '</div>';
      $('#permitDiv').html(htmlContent);

    }

    function generatePermitMember(data) {
      var htmlContent = '<table class="table table-sm">';
      htmlContent += '<thead class="alert alert-secondary"><tr><th scope="col" >No</th><th scope="col">Nama</th><th scope="col">Jabatan</th><th scope="col">NIK</th><th scope="col">Registrasi</th><th scope="col">Action</th></tr>';
      htmlContent += '</thead><tbody>';

      $.each(data, function(i, item) {
        htmlContent += '<tr><th scope="row">' + (i+1)+ '</td></td><td><input disabled="true" type="text" id="nama-visitor-'+item.id+'" value="' + item.namaVisitor + '" class="form-control" /></td>  <td><input type="text" disabled="true" class="form-control" id="jabatan-'+item.id+'" value="' + item.jabatan + '" /></td> <td><input id="nik-'+item.id+'" disabled="true"  type="text" class="form-control"  value="' + item.nik + '"/></td> <td id="regis-'+item.id+'">' + item.regis + '</td><td> <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="delete-member-'+item.id+'" onclick="" data-bs-original-title="Decline" aria-label="Views"><span class="badge rounded-pill bg-danger" onclick="deleteAnggota('+item.id+','+item.permit_id+')">Delete</span></a> <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Decline" aria-label="Views"><span  id="member-' +item.id + '" mode="idle" onclick="editAnggota('+item.id+','+item.permit_id+')" class="badge rounded-pill bg-warning" >Edit</span></a>  </td></tr>';
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
      htmlContent += '<thead class="alert alert-secondary"><tr><th scope="col" >#</th><th scope="col">Nama Pemilik</th><th scope="col">NIK</th><th scope="col">SN</th><th scope="col">Jenis Media</th><th scope="col">Tujuan</th></tr>';
      htmlContent += '</thead><tbody>';

      $.each(data, function(i, item) {
        htmlContent += '<tr><td scope="row">' + i + '</td><td>' + item.namaPemilik + '</td>  <td>' + item.nik + '</td> <td>' + item.SN + '</td> <td>' + item.jenisMedia + '</td><td>' + item.tujuan + '</td></tr> ';
      });
      htmlContent += '</tbody></table>';
      $('#permitBarangBawaan').html(htmlContent);
    };

    $("#formModal").modal('show');

  });


  function ExportToExcel(type, fn, dl) {
    var id = $('#id').val();
    window.location.href = "/export/permitbytemplate/" + id; //lokasi fisik templatenya

    var wb = XLSX.utils.table_to_book(elt, {
      sheet: "sheet1"
    });    //buka templatenya
    return dl ?
      XLSX.write(wb, {
        bookType: type,
        bookSST: true,
        type: 'base64'
      }) :
      XLSX.writeFile(wb, fn || ('VisitorApprovalBT.' + (type || 'xlsx')));  // edit template


  }

  function kirimEmailDecline(btn,e ){
    var id = $('#id').val();
       var formData = {
           permit_id:id,
           reason: $('#reason').val(),  
           
       }
      
          $.ajax({
          type: "POST",
          url: "/approval/reject",
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
              $("#staticApprovalDecline").modal('hide');
                            
              
            },
          error: function (data) {
              console.log(data);
          }
      });
    
  }

  function showImage(e) {
        console.log(e.getAttribute("value"));
            $.ajax({
                url: "permit/show/" + e.getAttribute("value"),
                type: "GET",
                success: function(data) {
                    $("#id").val(data.id);
                    $("#photoPermit").attr("src", '/storage/'+data.uploadPermit);
                    $("#changePhotoModal").modal('show');

                    },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });

    };

// Choose Image
var loadFile = function(event) {
  const selectedFile = event.target.files[0];
  $("#photoPermit").attr("src", URL.createObjectURL(selectedFile));

  // Convert the selected image file to base64 data URL
  convertBase64(selectedFile)
    .then((base64) => {
      // Do something with the base64 data URL if needed
      console.log(base64);

      // Now you can use the base64 variable in the submit handler
      $("#btnSubmitImage").data("base64", base64);
    })
    .catch((error) => {
      console.error("Error converting image to base64:", error);
    });
};

// ... Your other code ...

// Handle Submit Edit Image
$("#btnSubmitImage").click(async function(e) {
  e.preventDefault();

  // Get the base64 data URL from the data attribute
  var base64 = $(this).data("base64");

  // Perform the AJAX request using the base64 data URL
  var formData = {
    id: $('#id').val(),
    uploadPermit: base64,
  };

  $.ajax({
    type: "POST",
    url: "/permit/storeimage",
    data: formData,
    cache: false,
    dataType: 'json',
    success: function(data) {
      table.clear();
      table.ajax.reload();
      table.draw();
      $("#changePhotoModal").modal('hide');
    },
    error: function(data) {
      console.log(data);
    }
  });
});

const convertBase64 = (file) => {
    return new Promise((resolve, reject) => {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(file);

      fileReader.onload = () => {
        resolve(fileReader.result);
      };

      fileReader.onerror = (error) => {
        reject(error);
      };
    });
  };

  //Reload Page
  function refreshPage() {
    window.location.reload();
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

    // Delete Record Confirm
  function deleteAnggota(strIdAnggota,permit_id) {
    var id = $('#id').val();
   console.log(strIdAnggota);
    $.ajax({
      url: "/api/deleteAnggota/" + permit_id+"?no="+strIdAnggota,
      type: "GET",
      success: function(data) {
        Swal.fire({
          title: "Success!",
          text: "You clicked the button!",
          icon: "success",
          button: "OK!",
          timer: 3000
        });    
      $.ajax({
      url: "api/permitmemberbyid/" + id,
      type: "GET",
      success: function(data) {      var htmlContent = '<table class="table table-sm">';
      htmlContent += '<thead class="alert alert-secondary"><tr><th scope="col" >No</th><th scope="col">Nama</th><th scope="col">Jabatan</th><th scope="col">NIK</th><th scope="col">Registrasi</th><th scope="col">Action</th></tr>';
      htmlContent += '</thead><tbody>';

      $.each(data, function(i, item) {
        htmlContent += '<tr><th scope="row">' + (i+1)+ '</td></td><td><input disabled="true" type="text" id="nama-visitor-'+item.id+'" value="' + item.namaVisitor + '" class="form-control" /></td>  <td><input type="text" disabled="true" class="form-control" id="jabatan-'+item.id+'" value="' + item.jabatan + '" /></td> <td><input id="nik-'+item.id+'" disabled="true"  type="text" class="form-control"  value="' + item.nik + '"/></td> <td id="regis-'+item.id+'">' + item.regis + '</td><td> <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" id="delete-member-'+item.id+'" onclick="" data-bs-original-title="Decline" aria-label="Views"><span class="badge rounded-pill bg-danger" onclick="deleteAnggota('+item.id+','+item.permit_id+')">Delete</span></a> <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Decline" aria-label="Views"><span  id="member-' +item.id + '" mode="idle" onclick="editAnggota('+item.id+','+item.permit_id+')" class="badge rounded-pill bg-warning" >Edit</span></a>  </td></tr>';
      });
      htmlContent += '</tbody></table>';
      $('#permitMemberDiv').html(htmlContent);

      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

  };

  function editAnggota(id,id_permit)
  {
      let btn = $("#member-"+id);
      let mode = btn.attr('mode');
      if (mode == 'idle')
      {
        mode = 'edit';
        $('#delete-member-'+id).attr('disabled',true);
        btn.removeClass('bg-warning').addClass('bg-success').html('Save');
        $("#nama-visitor-"+id).attr("disabled",false);
        $("#jabatan-"+id).attr("disabled",false);
        $("#nik-"+id).attr("disabled",false);
      }
      else if (mode =='edit')
      {
        mode = 'idle';
        $('#delete-member-'+id).attr('disable',false);
        btn.removeClass('bg-success').addClass('bg-warning').html('Edit');
        $("#nama-visitor-"+id).attr("disabled",true);
        $("#jabatan-"+id).attr("disabled",true);
        $("#nik-"+id).attr("disabled",true);
        $.ajax({
          url:"/permit/approval/member/"+id_permit,
          method:"PUT",
          "content-type": "application/json",
          data: {
            no: id,
            nik: $("#nik-"+id).val(),
            nama: $("#nama-visitor-"+id).val(),
            jabatan:$("#jabatan-"+id).val(),
          },
          success: function(res){
            console.log(res);
            $("#nama-visitor-"+id).val(res.Nama);
            $("#jabatan-"+id).val(res.Jabatan);
            $("#nik-"+id).val(res.NIK);
            $("#regis-"+id).html(res.Register);
          }
        });
      }
      btn.attr('mode',mode);
  }
</script>

@endsection