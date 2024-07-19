@extends('layouts.main')
@section('container')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class="mt-5 mb-2 text-gray-800"><strong>Badge Data</strong></h4>
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
                                        <table id="table_badge" class="display" style="width:100%">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>RFID</th>
                                                    <th>Status</th>
                                                    <th>Used By</th>
                                                    <th>No Badge</th>
                                                    <th>Type Visitor</th>
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
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Data Badge</strong> </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" class="form-control" name="id_badge" id="id_badge">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Badge No:</label>
                                <input type="text" readonly class="form-control" name="noBadge" id="noBadge">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">RFID:</label>
                                <input type="text" class="form-control" name="Rfid" id="Rfid">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Name Type</label>
                                <select class="form-select" aria-label="Default select example" name="nameType"
                                    id="nameType">
                                    <option selected>- Select one -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Status:</label>
                                <input type="text" readonly class="form-control" name="status" id="status">
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
            <div class="modal fade" id="DeleteConfirmModal" tabindex="-2" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true" role="dialog">
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
        </section>
    </main>


    <script type="text/javascript">
        // Load Table
        var table = $("#table_badge").DataTable({
            processing: true,
            serverSide: true,
            // ajax: 'visitor/data',
            "ajax": {
                "url": "badge/data", //API
                "type": "GET",
                "dataType": "json",
                "data": function(data) {
                    data.columns = JSON.stringify(data.columns);
                    data.draw = data.draw;
                    data.order = data.order;
                }
            },
            columns: [{
                    data: 'Rfid'
                },
                {
                    data: 'status'
                },
                {
                    data: 'UsedBy'
                },
                {
                    data: 'noBadge'
                },
                {
                    data: 'nameType'
                },
                {
                    data: 'reason'
                },
                {
                    data: 'postby'
                },
                {
                    data: 'postdate'
                },
                {
                    data: 'id_badge',
                    render: function(data, type) {
                        if (type === 'display') {
                            return '<button id="btnEdit" class="btn btn-success open-modal" value="' +
                                data +
                                '">Edit</button> <button id="btnDelete" class="btn btn-danger" value="' +
                                data + '">Delete</button>';
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
            url: "select/type",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.data.length; i++) {
                    html += '<option value="' + data.data[i].nameType + '">' + data.data[i].nameType +
                        '</option>';
                }
                $('#nameType').html(html);

            }
        })


        // Event Click Edit
        jQuery('body').on('click', '.open-modal', function() {
            var id_badge = $(this).val();
            console.log('id', id_badge);
            $.ajax({
                url: "badge/show/" + id_badge,
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



        // Event Click Delete
        jQuery('body').on('click', '#btnDelete', function() {
            var id_badge = $(this).val();
            $("#id_badge").val(id_badge);
            $("#DeleteConfirmModal").modal('show');


        });

        // Add New Record
        $("#btnAddNew").click(function(e) {
            $("#id_badge").val('');
            $("#noBagde").val('');
            $("#Rfid").val('');
            $("#nameType").val('');
            $("#status").val('');
            $("#reason").val('');

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
                id_badge: $('#id_badge').val(),
                noBadge: $('#noBadge').val(),
                Rfid: $('#Rfid').val(),
                nameType: $('#nameType').val(),
                status: $('#status').val(),
                reason: $('#reason').val(),

            };

            $.ajax({
                type: "PUT",
                url: "/badge/store",
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
                    $("#formModal").modal('hide');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        // Delete Record Cancel
        $("#btnDeleteNo").click(function(e) {
            $("#id_badge").val('');
            $("#DeleteConfirmModal").modal('hide');
        });

        // Delete Record Confirm
        $("#btnDeleteYes").click(function(e) {
            var id_badge = $('#id_badge').val();
            $.ajax({
                url: "badge/delete/" + id_badge,
                type: "GET",
                success: function(data) {
                    table.clear();
                    table.ajax.reload();
                    table.draw();
                    $("#id_badge").val('');
                    $("#DeleteConfirmModal").modal('hide');
                },
                error: function(response) {
                    console.log(response.responseJSON)
                }
            });
        });
    </script>
@endsection
