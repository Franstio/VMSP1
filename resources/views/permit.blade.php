@extends('layouts.main')
@section('container')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class="mt-5 mb-2 text-gray-800"><strong>VIP Approval Application</strong></h4>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success col-md-10" role="alert">
                    {{ session('success') }}
                </div>
            @endif

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
                                        <table id="table_Permitvip" class="display" style="width:100%">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Location</th>
                                                    <th>Name</th>
                                                    <th>Company Name</th>
                                                    <th>ID Type</th>
                                                    <th>ID Number</th>
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

            <!-- Modal Add or Edit-->
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Permit VIP</strong> </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" class="form-control" name="id_permit" id="id_permit">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Company Name</label>
                                <input type="text" class="form-control" name="nameVendor" id="nameVendor" />
                                <!--                          <select class="form-select" aria-label="Default select example" name="nameVendor" id="nameVendor">
                              <option selected>- Select one -</option>
                              </select>-->
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
                                <input type="text" class="form-control" name="noBadge" id="noBadge" />
                                <!--                          <select class="form-select" aria-label="Default select example" name="noBadge" id="noBadge">
                              <option selected>- Select one -</option>
                              </select>-->
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Purpose</label>
                                <input type="text" class="form-control" id="purpose" name="purpose" />
                                <!--                          <select class="form-select" aria-label="Default select example" name="purpose" id="purpose">
                              <option selected>- Select one -</option>
                              </select>-->
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
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Location</label>
                                <input type='text' class="form-control" name="nameLocation" id="nameLocation" />
                                <!--                          <select class="form-select" aria-label="Default select example" name="nameLocation" id="nameLocation">
                              <option selected>- Select one -</option>
                              </select>-->
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
        // Load Table
        var table = $("#table_Permitvip").DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "permit/data", //API
                "type": "GET",
                "dataType": "json",
                "data": function(data) {
                    data.columns = JSON.stringify(data.columns);
                    data.draw = data.draw;
                    data.order = data.order;
                }
            },
            columns: [{
                    data: 'nameLocation'
                },
                {
                    data:"namaVisitor"
                },
                {
                    data: 'nameVendor'
                },
                {
                    data:"idType"
                },
                {
                    data:"nik",
                    render: function(data)
                    {
                        const str = new String(data);
                        return str.substring(0,str.length > 5 ? 5 : str.length);
                    }
                }
                ,
                {
                    data: 'purpose'
                },
                {
                    data: 'startDate',
                    render: function(data)
                    {
                      const value = new Date(data);            
                      return value.toDateString() + " " + value.toLocaleTimeString();
                    }
                },
                {
                    data: 'endDate',
                    render: function(data)
                    {
                      const value = new Date(data);            
                      return value.toDateString() + " " + value.toLocaleTimeString();
                    }
                },
                {
                    data: 'id_permit',
                    render: function(data, type) {
                        if (type === 'display') {
                            return '<button id="btnEdit" class="btn btn-success open-modal" value="' +
                                data + '">Views Detail</button>';
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
/* 
        // Load Purpose
        $.ajax({
            url: "select/purpose",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.data.length; i++) {
                    html += '<option value="' + data.data[i].purpose + '">' + data.data[i].purpose +
                    '</option>';
                }
                $('#purpose').html(html);

            }
        });

        // Load Vendor
        $.ajax({
            url: "select/vendor",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.data.length; i++) {
                    html += '<option value="' + data.data[i].nameVendor + '">' + data.data[i].nameVendor +
                        '</option>';
                }
                $('#nameVendor').html(html);

            }
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
                    html += '<option value="' + data.data[i].nameLocation + '">' + data.data[i].nameLocation +
                        '</option>';
                }
                $('#nameLocation').html(html);

            }
        })

        // Load Badge
        $.ajax({
            url: "select/badge",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.data.length; i++) {
                    html += '<option value="' + data.data[i].noBadge + '">' + data.data[i].noBadge +
                    '</option>';
                }
                $('#noBadge').html(html);

            }
        }) */


        // Event Click Edit
        jQuery('body').on('click', '.open-modal', function() {
            var id_permit = $(this).val();
            console.log('id_permit');
            $.ajax({
                url: "permitvip/show/" + id_permit,
                type: "GET",
                success: function(data) {
                    $("#id_permit").val(data.id_permit);
                    $("#nameVendor").val(data.nameVendor);
                    $("#namaVisitor").val(data.namaVisitor);
                    $("#nik").val(data.nik);
                    $("#noBadge").val(data.noBadge);
                    $("#purpose").val(data.purpose);
                    $("#startDate").val(data.startDate);
                    $("#endDate").val(data.endDate);
                    $("#nameLocation").val(data.nameLocation);

                    $("#formModal").modal('show');
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });

        });

        // Add New Record
        $("#btnAddNew").click(function(e) {
            $("#id_permit").val('');
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
        $("#btnSave").click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                id_permit: $('#id_permit').val(),
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
                    $("#formModal").modal('hide');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
