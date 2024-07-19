@extends('layouts.main')
@section('container')

<main id="main" class="main">
    <section class="section dashboard">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h4 class="mt-5 mb-2 text-gray-800"><strong>Host Data</strong></h4>
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
                                    <table id="table_staff" class="display" style="width:100%">
                                        <thead class="bg-light">
                                            <tr>
                                                <th></th>
                                                <th>Host Name</th>
                                                <th>Username</th>
                                                <th>Employee ID</th>
                                                <th>Badge No</th>
                                                <th>Department</th>
                                                <th>Role</th>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Data Host</strong> </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" class="form-control" name="id" id="id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control @error ('name') is-invalid @enderror" name="name" id="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control @error ('username') is-invalid @enderror" name="username" id="username">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Employee ID</label>
                            <input type="text" class="form-control @error ('empID') is-invalid @enderror" name="empID" id="empID">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Badge No</label>
                            <input type="text" class="form-control @error ('Rfid') is-invalid @enderror" name="Rfid" id="Rfid">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Department</label>
                            <select class="form-select" aria-label="Default select example" name="nameDepart" id="nameDepart">
                                <option selected>- Select one -</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" name="nameRole" id="nameRole">
                                <option selected>- Select one -</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="text" class="form-control @error ('email') is-invalid @enderror" name="email" id="email">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Salah Badge Host-->
        <div class="modal" tabindex="-1" id="wrong">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-red center"><strong>Data Already Exists</strong></h5>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="DeleteConfirmModal" tabindex="-2" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel">Are you sure want to delete?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type=button id="btnDeleteNo" class="btn btn-secondary">No</button>
                        <button type=submit id="btnDeleteYes" class="btn btn-danger">Yes ! Delete it</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <!-- Modal Change Photo-->
        <div class="modal fade" id="changePhotoModal" tabindex="-2" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel">Photo</h5>
                    </div>

                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img id="photoStaff" src="" alt="Profile" class="rounded-circle" style="height: 400px;" /><br><br>
                        <!-- <div id="my_camera"></div>
                                <input type=button value="Take Snapshot" onClick="take_snapshot()"> -->
                        <div class="mb-3">
                            <input class="form-control" type="file" id="newPhotoStaff" name="filename" onchange="loadFile(event)" accept="image/*;capture=camera">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type=submit id="btnSubmitImage" class="btn btn-primary">Submit</button>
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
    var table = $("#table_staff").DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": "staff/data", //API
            "type": "GET",
            "dataType": "json",
            "data": function(data) {
                data.columns = JSON.stringify(data.columns);
                data.draw = data.draw;
                data.order = data.order;
            }
        },
        columns: [{
                data: 'photo',
                render: function(data, type, row) {
                    if (type === 'display') {
                        return '<img src="/storage/' + data + '" alt="Profile" class="rounded-circle center" width="32" value="' + row.id + '"  onClick="showImage(this)" />';
                        //return '<img src="http://localhost:8000/storage/images/40UlRvq2u5O95DzbAWucmK5Jx6PFOsCmTJPIeVDX.jpg" alt="Profile" class="rounded-circle me-2" width="35">';
                    }
                    return data;
                },
            },
            {
                data: 'name'
            },
            {
                data: 'username'
            },
            {
                data: 'empID'
            },
            {
                data: 'Rfid',
                visible:false
            },
            {
                data: 'nameDepart'
            },
            {
                data: 'nameRole',
                visible:false
            },
            {
                data: 'id',
                render: function(data, type) {
                    if (type === 'display') {
                        return '<button id="btnEdit" class="btn btn-success open-modal" value="' + data + '">Edit</button> <button id="btnDelete" class="btn btn-danger" value="' + data + '">Delete</button>';
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

    // Load Depart
    $.ajax({
        url: "select/depart",
        method: "GET",
        async: true,
        dataType: 'json',
        success: function(data) {
            var html = '';
            var i;
            for (i = 0; i < data.data.length; i++) {
                html += '<option value="' + data.data[i].nameDepart + '">' + data.data[i].nameDepart + '</option>';
            }
            $('#nameDepart').html(html);

        }
    })

    // Load Role
    $.ajax({
        url: "select/role",
        method: "GET",
        async: true,
        dataType: 'json',
        success: function(data) {
            var html = '';
            var i;
            for (i = 0; i < data.data.length; i++) {
                html += '<option value="' + data.data[i].nameRole + '">' + data.data[i].nameRole + '</option>';
            }
            $('#nameRole').html(html);

        }
    })


    // Event Click Edit
    jQuery('body').on('click', '.open-modal', function() {
        var id = $(this).val();
        $.ajax({
            url: "staff/show/" + id,
            type: "GET",
            success: function(data) {
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#username").val(data.username);
                $("#empID").val(data.empID);
                $("#Rfid").val(data.Rfid);
                $("#nameDepart").val(data.nameDepart);
                $("#nameRole").val(data.nameRole);
                $("#email").val(data.email);

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
            url: "staff/show/" + e.getAttribute("value"),
            type: "GET",
            success: function(data) {
                $("#id").val(data.id);
                $("#empID").val(data.empID);
                $("#photoStaff").attr("src", '/storage/' + data.photo);
                $("#changePhotoModal").modal('show');

            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });

    };

    // Event Click Delete
    jQuery('body').on('click', '#btnDelete', function() {
        console.log("DEL", $(this).val());
        var id = $(this).val();
        $("#id").val(id);
        $("#DeleteConfirmModal").modal('show');
    });

    // Add New Record
    $("#btnAddNew").click(function(e) {
        $("#id").val('');
        $("#name").val('');
        $("#username").val('');
        $("#empID").val('');
        $("#Rfid").val('');
        $("#nameDepart").val('');
        $("#nameRole").val('');
        $("#email").val('');
        $("#photo").val('');

        $("#formModal").modal('show');
    });

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
            name: $('#name').val(),
            username: $('#username').val(),
            empID: $('#empID').val(),
            Rfid: $('#Rfid').val(),
            nameDepart: $('#nameDepart').val(),
            nameRole: $('#nameRole').val(),
            email: $('#email').val(),
            photo: $('#photo').val(),
        };

        $.ajax({
            type: "PUT",
            url: "/staff/store",
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
                /* $("#formModal").modal('hide'); */
            },
            error: function(data) {
                $("#wrong").modal('show');
            }
        });
    });

    // Delete Record Cancel
    $("#btnDeleteNo").click(function(e) {
        $("#id").val('');
        $("#DeleteConfirmModal").modal('hide');
    });

    // Delete Record Confirm
    $("#btnDeleteYes").click(function(e) {
        var id = $('#id').val();
        $.ajax({
            url: "staff/delete/" + id,
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
        // var image = document.getElementById('output');
        //  image.src = URL.createObjectURL(event.target.files[0]);
        $("#photoStaff").attr("src", URL.createObjectURL(event.target.files[0]));
    };

    function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.naturalWidth;
        canvas.height = img.naturalHeight;
        /*  canvas.width = img.width;
         canvas.height = img.height; */
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        return dataURL;

    }

    //Handle Submit Edit Image
    $("#btnSubmitImage").click(async function(e) {

        e.preventDefault();
        var base64 = getBase64Image(document.getElementById("photoStaff"));
        console.log(base64);
        var formData = {
            id: $('#id').val(),
            empID: $('#empID').val(),
            photo: base64,
        };

        $.ajax({
            type: "POST",
            url: "/staff/storeimage",
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



    $("#btnOpenCamera").click(async function(e) {
        e.preventDefault();
        $("#changePhotoModal").modal('hide');
        $("#cameraModal").modal('show');

        // Get access to the camera!
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Not adding `{ audio: true }` since we only want video now
            navigator.mediaDevices.getUserMedia({
                video: true
            }).then(function(stream) {
                //video.src = window.URL.createObjectURL(stream);
                video.srcObject = stream;
                video.play();
            });
        }
    });

    $("#btnCaptureCamera").click(function(e) {
        e.preventDefault();
        //let canvas = document.querySelector("#canvas");
        var canvas = document.createElement("canvas");
        canvas.getContext('2d').drawImage(video, 0, 0, 640, 480);
        let image_data_url = canvas.toDataURL('image/jpeg');
        $("#photoStaff").attr("src", image_data_url);
        $("#cameraModal").modal('hide');
        $("#changePhotoModal").modal('show');

    })
</script>

<!-- @include('sweetalert::alert') -->
@endsection