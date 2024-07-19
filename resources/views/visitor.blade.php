@extends('layouts.main')
@section('container')

<main id="main" class="main">
    <section class="section dashboard">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h4 class="mt-5 mb-2 text-gray-800"><strong>Visitor Data</strong></h4>
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
                        <table id="table_visitor" class="display" style="width:100%">
                        <thead class="bg-light">
                    <tr>
                    <th></th>
                        <th>Visitor Name</th>
                        <th>Company Name</th>
                        <th>ID Number</th>
                        <th>ID Type</th>
                        <th>Position</th>
                        <th>Residence Status</th>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Data Visitor</strong> </h1>
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
                                    <!-- <input type="text" class="form-control" name="nameVendor" id="nameVendor" > -->
                                    </div>
                                    <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Asal Vendor</label>
                                    <select class="form-select" aria-label="Default select example" name="asalVendor" id="asalVendor">
                                    <option value="BATAM">BATAM</option>
                                    <option value="JAKARTA">JAKARTA</option>
                                    <option value="SINGAPORE">SINGAPORE</option>
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" >
                                    </div>
                                    <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Name</label>
                                    <input type="text" class="form-control @error ('namaVisitor') is-invalid @enderror" name="namaVisitor" id="namaVisitor" >
                                    @error('name')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                    <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">NRIC</label>
                                    <input type="text" class="form-control @error ('nik') is-invalid @enderror" name="nik" id="nik" >
                                    @error('name')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                    <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="gender" id="gender">
                                    <option selected>- Select one -</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Position</label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan"  >
                                    </div>
                                    <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Type Visitor</label>
                                    <select class="form-select" aria-label="Default select example" name="typeVisitor" id="typeVisitor">
                                    <option selected>- Select one -</option>
                                    <option value="Residence">Residence</option>
                                    <option value="Non Residence">Non Residence</option>
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

         <!-- Modal Change Photo-->
         <div class="modal fade" id="changePhotoModal" tabindex="-2"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel">Photo</h5>
                            </div>

                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img id="photoVisitor" src="" alt="Profile" class="rounded-circle" width="100%"/><br><br>
                                <div class="mb-3">
                            <input class="form-control" type="file" id="newPhotoVisitor" name="filename" onchange="loadFile(event)" accept="image/*;capture=camera">
                            </div>OR<br>
                            <div id="my_camera"></div>
                               <button type=submit id="btnOpenCamera" class="btn btn-primary">Take Photo</button>                                                         
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type=submit id="btnSubmitImage" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- Modal -->


        <div class="modal fade" id="cameraModal" tabindex="-2"  aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel">Camera</h5>
                            </div>

                            <div class="modal-body">
                            <video id="video" width="480" height="300" autoplay></video>

                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="btnCaptureCamera" class="btn btn-primary">Capture</button>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
</main>


   <script type="text/javascript">
    // Camera
    var video = document.getElementById('video');
    // Load Table
    var table = $("#table_visitor").DataTable({
        processing: true,
        serverSide: true,
       // ajax: 'visitor/data',
        "ajax": {
						"url": "visitor/data", //API
						"type": "GET",
                        "dataType": "json",
                        //"data":data
                        "data":function (data){
                            data.columns= JSON.stringify(data.columns);
                            data.draw = data.draw;
                            data.order=data.order;
                        }
					},
        columns: [
            { data: 'photo',
                render: function (data, type,row) {
                    if (type === 'display' ) {
                        data = data !=undefined && data != "" ? data : "804541.png";
                        return '<img src="/storage/' + data+ '" alt="Profile" class="rounded-circle center" width="32" value="' + row.id+ '"  onClick="showImage(this)" />' ;
                      //return '<img src="http://localhost:8000/storage/images/40UlRvq2u5O95DzbAWucmK5Jx6PFOsCmTJPIeVDX.jpg" alt="Profile" class="rounded-circle me-2" width="35">';
                    }
                    return data;
                },
            },
            { data: 'namaVisitor'},
            { data: 'nameVendor' },
            { data: 'nik', render: function(data){ const str = new String(data); return str.substring(0,str.length > 5 ? 5 : str.length);} },
            {data:'idType'},
            { data: 'jabatan' },
            { data: 'typeVisitor' },
           
            { data: 'id',
                render: function (data, type) {
                    if (type === 'display') {
                       return '<button id="btnEdit" class="btn btn-success open-modal" value="' + data+ '">Edit</button> <button id="btnDelete" class="btn btn-danger" value="' + data+ '">Delete</button>';
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


    // Event Click Edit
    jQuery('body').on('click', '.open-modal', function () {
        var id=$(this).val();
        $.ajax({
                url: "visitor/show/" + id,
                type: "GET",
                success: function(data) {
                     $("#id").val(data.id);
                     $("#nameVendor").val(data.nameVendor);
                     $("#asalVendor").val(data.asalVendor);
                     $("#email").val(data.email);
                     $("#namaVisitor").val(data.namaVisitor);
                     $("#nik").val(data.nik);
                     $("#gender").val(data.gender);
                     $("#jabatan").val(data.jabatan);
                     $("#typeVisitor").val(data.typeVisitor);
                     
                    $("#formModal").modal('show');
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });

    });

    function showImage(e) {
        console.log(e.getAttribute("value"));
            $.ajax({
                url: "visitor/show/" + e.getAttribute("value"),
                type: "GET",
                success: function(data) {
                    $("#id").val(data.id);
                    $("#nik").val(data.nik);
                    $("#photoVisitor").attr("src", '/storage/'+data.photo);
                    $("#changePhotoModal").modal('show');

                    },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });

    };

    // Event Click Delete
    jQuery('body').on('click', '#btnDelete', function () {
       // var link_id = $(this).val();
        console.log("DEL",$(this).val());
        var id=$(this).val();
        $("#id").val(id);
        $("#DeleteConfirmModal").modal('show');
       
    });

    // Add New Record
    $("#btnAddNew").click(function (e) {
        $("#id").val('');
        $("#nameVendor").val('');
        $("#asalVendor").val('');
        $("#email").val('');
        $("#namaVisitor").val('');
        $("#nik").val('');
        $("#gender").val('');
        $("#jabatan").val('');
        $("#typeVisitor").val('');

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
            asalVendor: $('#asalVendor').val(),
            email: $('#email').val(),
            namaVisitor: $('#namaVisitor').val(),
            nik: $('#nik').val(),
            gender: $('#gender').val(),
            jabatan: $('#jabatan').val(),
            typeVisitor: $('#typeVisitor').val(),
           
        };
            $.ajax({
            type: "PUT",
            url: "/visitor/store",
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

    // Delete Record Cancel
    $("#btnDeleteNo").click(function (e) {
        $("#id").val('');
        $("#DeleteConfirmModal").modal('hide');
    });

    // Delete Record Confirm
    $("#btnDeleteYes").click(function (e) {
        var id= $('#id').val();
         $.ajax({
                url: "visitor/delete/" + id,
                type: "GET",
                success: function(data) {
                    table.clear();
                    table.ajax.reload();
                    table.draw();
                     $("#id").val('');
                    $("#DeleteConfirmModal").modal('hide');
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });

    });

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



        $("#btnOpenCamera").click( async function (e) {
                e.preventDefault();
                $("#changePhotoModal").modal('hide');
                $("#cameraModal").modal('show');

                // Get access to the camera!
                if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    // Not adding `{ audio: true }` since we only want video now
                    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
                        //video.src = window.URL.createObjectURL(stream);
                        video.srcObject = stream;
                        video.play();
                    });
                }
        });

         $("#btnCaptureCamera").click( function (e) {
            e.preventDefault();
            //let canvas = document.querySelector("#canvas");
            var canvas = document.createElement("canvas");
            canvas.getContext('2d').drawImage(video, 0, 0, 300, 180);
            let image_data_url = canvas.toDataURL('image/jpeg');
            $("#photoVisitor").attr("src",image_data_url);
                $("#cameraModal").modal('hide');
                $("#changePhotoModal").modal('show');

         })

  </script>

  @endsection
