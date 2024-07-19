@extends('layouts.main')
@section('container')
@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Security" OR auth()->user()->nameRole == "Admin")
<main id="main" class="main">
  <section class="section dashboard overflow-y-auto">

    <div class="pagetitle mt-5">
      <div class="d-flex">
        <div>
          <h1>Dashboard</h1>
        </div>
      </div>
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-11">
          <div class="row">

            <!-- Card -->
            <div class="col-md-3 mt-3">
              <div class="card info-card visitor-card ">
                <div class="card-body">
                  <div class="d-flex h-100 flex-column align-items-center ">
                    <div class="d-flex align-items-center justify-content-between gap-3   flex-row">
                      <i class="bi m-0 fa-fw h2 bi-person-plus"></i>
                      <div class="text-success m-0" id="todayCheckin"></div>
                    </div>
                    <div class="d-flex  align-items-center justify-content-between gap-3 flex-row">
                      <i class="bi fa-fw m-0 h2 bi-person-dash"></i>
                      <div class="text-white m-0" id="todayCheckout"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Card -->

            <!-- Card -->
            <div class="col-md-3 mt-3">
              <div class="card info-card checkin-card">
                <div class="card-body">
                  <div class="d-flex align-items-center flex-row">
                    <i class="bi bi-bar-chart h1 m-0"></i>
                    <div class="ps-3">
                      <h2>
                        <div id="todayVisitor" class="m-0">
                      </h2>
                      <h5>Total Visitor Today</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Card -->

            <!-- Card -->
            <div class="col-md-3 mt-3">
              <div class="card info-card monthly-card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                      <i class="bi h1 bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                      <h2>
                        <div id="thisMonthVisitor">
                      </h2>
                      This Month Visitors
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Card -->


            <!-- Card -->
            <div class="col-md-3 mt-3">
              <div class="card info-card last-month-card">
                <div class="card-body">

                  <div class="d-flex align-items-center">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                      <i class="bi h1 bi-clipboard-data"></i>
                    </div>
                    <div class="ps-3">
                      <h2>
                        <div id="lastMonthVisitor">
                      </h2>
                      Last Month Visitors
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Card -->
          </div>
        </div><!-- End Left side columns -->

        <div class="container-fluid">
          <div class="col-md-11 mt-3">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <h6 class="card-title">Recent Visitors</h6>
                <hr>
                <div class="row w-75 ms-auto">
                  <div class="col-md-3 d-flex">
                    <div class="my-auto mx-auto">
                      <!-- <form id="gantiTanggal" method="POST"> -->
                      <!-- <input name="tanggal" id="tanggal" type="date" class="form-control" value={{ date('Y-m-d H:i:s') }} onchange="changeDate(this)"> -->
                      <input name="tanggal" id="tanggal" type="date" class="form-control" placeholder="dd-mm-yyyy" onchange="changeDate(this)">
                      <!-- </form> -->
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                    <div class="p">
                      <table id="table_home" class="display" style="width:100%">
                        <thead class="bg-light">
                          <tr>
                            <th>

                            </th>
                            <th></th>
                            <th>Visitor Name</th>
                            <th>Purpose</th>
                            <th>Host</th>
                            <th>Time-In</th>
                            <th>Time-Out</th>
                            <th>Company Name</th>
                            <th>Badge Number</th>
                            <th>Temp</th>
                            <th>Visit History</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <script type="text/javascript">
            // Load Table
            var todayVisitor = 0;
            var table = $("#table_home").DataTable({
              order: [[5,'desc']],
              processing: true,
              serverSide: true,
              "ajax": {
                "url": "home/data", //API
                "type": "GET",
                "dataType": "json",
                //"data":data
                // "dataSrc": function (response) {
                //        // roleList = response;
                //         console.log(response);
                //        // todayVisitor=response.recordsTotal;
                //     },
                "data": function(data) {
                  console.log(data);
                  data.columns = JSON.stringify(data.columns);
                  data.draw = data.draw;
                  data.order = data.order;
                  data.status = $("#checkType").val()  //"checkin","checkout";
                }
              },
              columns: [{
                  data: 'kondisi',
                  render: function(data, type, row) {
                    if (row.kondisi.toLowerCase() == 'checkin') {
                      return '<i class="bi bi-arrow-right-square text-primary">&nbsp;&nbsp;CHECKED-IN</i>'
                    } else if (row.kondisi.toLowerCase()=='checkout') {
                      return '<i class="bi bi-arrow-left-square text-red">&nbsp;&nbsp;CHECKED-OUT</i>'
                    }
                    else
                    {
                      return '';
                    }

                    return data;
                  },
                },
                {
                  data: 'photo',
                  render: function(data, type, row) {
                    if (type === 'display') {
                      
                      data = data !=undefined && data != "" ? data : "804541.png";
                      return '<img src="/storage/' + data + '" alt="Profile" class="rounded-circle center" width="32" value="' + row.id + '"  onClick="showImage(this)" />';
                      //return '<img src="http://localhost:8000/storage/images/40UlRvq2u5O95DzbAWucmK5Jx6PFOsCmTJPIeVDX.jpg" alt="Profile" class="rounded-circle me-2" width="35">';
                    }
                    return data;
                  },
                },
                {
                  data: 'namaVisitor'
                },
                {
                  data: 'purpose'
                },
                {
                  data: 'name',
                  render: function(data, type, row, meta) {
                  console.log(data);
                  let Name = data.split(':');
                  return  Name[0];
                  }, 
                },
                {
                  data: 'timeCheckin',
                  name: 'timeCheckin'
                },
                {
                  data: 'timeCheckout',
                  name: 'timeCheckout'
                },
                {
                  data: 'nameVendor'
                },
                {
                  data: 'noBadge'
                },
                {
                  data: 'temp',
                  visible:false
                },
                {
                  data:'visitHistory',
                  visible:false,
                }

                // { data: 'id',
                //     render: function (data, type) {
                //         if (type === 'display') {
                //            return '<button id="btnEdit" class="btn btn-success open-modal" value="' + data+ '">Edit</button> <button id="btnDelete" class="btn btn-danger" value="' + data+ '">Delete</button>';
                //         }
                //         return data;
                //     },
                //}
              ],
              "columnDefs": [{
                "orderable": false,
                "targets": 0
              }],
              initComplete: function() {
                this.api().columns([0]).every(function() {
                  var column = this;


                  //var select = $('<div class="dropdown"><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> All </a>  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> <a class="dropdown-item" href="#">AAAAA</a> </div></div>')
                  var select = $('<select id="checkType"><option value=""> ALL</option> <option value="checkIn">CHECKED-IN</option> <option value="checkOut">CHECKED-OUT</option></select>')
                    .appendTo($(column.header()))
                    .on('change', function() {
                      var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                      );
                      console.log('Oncange..', val);
                      column
                        .search(val ? val : '', true, false)
                        .draw();
                    });



                });
              }
            })
            // Ajax Setup Auth
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });



            document.getElementById("tanggal").valueAsDate = new Date();

            function changeDate(e) {
              // console.log(e.getAttribute("value"));
              console.log($('#tanggal').val());
              table.column(5).search($('#tanggal').val());
              // table
              // .column(6)
              // .data()
              // .filter( function ( value, index ) {
              //     return e.getAttribute("value");
              // } );

              //     table.clear();

              table.ajax.reload();
              // table.draw();
            }

            function windgetCounter() {
              $.ajax({
                url: "home/dashboard/",
                type: "GET",
                success: function(data) {

                  $("#todayCheckin").html('Visitor Check-in ' + data.checkin + ' Persons');
                  $("#todayCheckout").html('Visitor Check-out ' + data.checkout + ' Persons');
                  $("#todayVisitor").html(data.todayvisitor);
                  $("#thisMonthVisitor").html(data.thismonthvisitor);
                  $("#lastMonthVisitor").html(data.lastmonthvisitor);
                  // $("#nik").val(data.nik);
                  // $("#photoVisitor").attr("src", '/storage/'+data.photo);
                  // $("#changePhotoModal").modal('show');
                  console.log(data);

                },
                error: function(response) {
                  console.log(response.responseJSON)
                }
              });

            };
            //  $('#todayVisitor').html(todayVisitor);
            windgetCounter();
          </script>

          @else

          <!--Halaman Host -->

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
                      <textarea id='emailBody' class="form-control" style="height: 100px"></textarea>
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
                  <h4 id="edit" class="card-title text-center pb-0 fs-4">Approval has been uploaded successfully.</h4>
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
      },
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
        $('#btnUpload').prop('disabled',true)
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
        //$("#formModal").modal('hide');
        $("#formModalLocation").modal('hide');
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
      htmlContent += '<div class="mb-2 row"><label for="staticEmail" class="col-sm-3"><strong>No E-Request</strong></label><div class="col-sm-8"><input type="text" readonly class="form-control-plaintext" id="id" value="' + data.id + '"></div></div>';
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


  


  function ExportToExcel(type, fn, dl) {
    var id = $('#id').val();
    window.location.href = "/export/permitbytemplate/" + id;

    var wb = XLSX.utils.table_to_book(elt, {
      sheet: "sheet1"
    });
    return dl ?
      XLSX.write(wb, {
        bookType: type,
        bookSST: true,
        type: 'base64'
      }) :
      XLSX.writeFile(wb, fn || ('VisitorApprovalBT.' + (type || 'xlsx')));


  }

  function showImage(e) {
        console.log(e.getAttribute("value"));
            $.ajax({
                url: "permit/show/" + e.getAttribute("value"),
                type: "GET",
                success: function(data) {
                    $("#id").val(data.id);
                    data.uploadPermit = data.uploadPermit !=undefined && data.uploadPermit != "" ? data : "804541.png";
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
    $("#photoPermit").attr("src", URL.createObjectURL(event.target.files[0]));
  };

  function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    canvas.width = img.naturalWidth;
    canvas.height = img.naturalHeight;
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    var dataURL = canvas.toDataURL("image/png");
    return dataURL;
  }

  //Handle Submit Edit Image
  $("#btnSubmitImage").click(async function(e) {

    e.preventDefault();
    var base64 = getBase64Image(document.getElementById("uploadPermit"));
    // console.log(base64);
    var formData = {
      id: $('#id').val(),
      //  permit_id: $('#permit_id').val(),
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
  $("#btnSave").click(function(e) {
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
        /*  console.log(data);
        table.clear();
        table.ajax.reload();
        table.draw(); */
        $("#formModal").modal('hide');
      },
      error: function(data) {
        console.log(data);
      }
    });
  });

  // Delete Record Confirm
  function deleteAnggota(strIdAnggota) {
    var id = $('#id').val();
   console.log(strIdAnggota);
    $.ajax({
      url: "/api/deleteAnggota/" + strIdAnggota,
      type: "GET",
      success: function(data) {
        Swal.fire({
          title: "Success!",
          text: "You clicked the button!",
          icon: "success",
          button: "OK!",
          timer: 3000
        });
        generatePermitModal(id);
        

      },
      error: function(response) {
        console.log(response.responseJSON)
      }
    });

  };
</script>

@endif
@endsection