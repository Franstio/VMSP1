@extends('layouts.main')
@section('container')
    <main id="main" class="main">
        <section class="section dashboard p-3">


            <div class="row">
                <div class="col-md-8 mt-3">
                    <div class="d-sm-flex align-items-center  justify-content-between">
                        <h3 class="mt-5 mb-2 text-gray-800 "><strong>Recruitment</strong></h3>
                    </div>
                    <form action="{{ url('recruitment', []) }}" method="POST">
                        @csrf

                        <div class="card border-0 shadow-sm">
                            <div class=" card-header ">
                                <h4 class="text-gray-800">Please input Recruitment Candidate Visiting Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row justify-content-between">
                                    <div class="col-auto"><label for="" class="col-form-label-sm">Name</label></div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="name" id=""
                                            aria-describedby="helpId" placeholder="" />
                                    </div>
                                </div>
                                <div class="mb-3 row justify-content-between">
                                    <div class="col-auto"><label for="" class="col-form-label-sm">Gender</label></div>
                                    <div class="col-6">
                                        <select class="form-select" name="gender">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row justify-content-between">
                                    <div class="col-auto"><label for="" class="col-form-label-sm">Date Visit</label></div>
                                    <div class="col-6">
                                        <input type="date" class="form-control" name="visitDate" id="visitDate"
                                            aria-describedby="helpId" placeholder="" />
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <button class="btn btn-primary" role="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="d-sm-flex align-items-center  justify-content-between">
                        <h3 class="mt-5 mb-2 text-gray-800 "><strong>Upcoming Visit</strong></h3>
                    </div>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_recruitment" class="table table-light">
                                    <thead class="justify-content-center text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Date Visit</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="justify-content-center text-center">
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <th>-</th>
                                            <th>
                                                <button class="btn btn-danger text-white rounded">Delete</button>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="d-sm-flex align-items-center  justify-content-between">
                        <h3 class="mt-5 mb-2 text-gray-800 "><strong>Batch Upload</strong></h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <input type="file" accept=".xlsx" class="form-control p-5" name="photoUpload"/>
                            <h6 class="card-subtitle mt-1    text-muted">Supported file: .xlsx</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <label class="col-form-label">XLSX Template: </label>
                                <button class="btn w-75 btn-success text-white">Download Template .xlsx</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Add or Edit-->

    </main>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#visitDate").val(new Date().toISOString().split("T")[0]);
            

        });
        const table=  $("#table_recruitment").DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                "url": "/recruitment/page", //API
                "type": "GET",
                "dataType": "json",
                "data": function(data) {
                    data.columns = JSON.stringify(data.columns);
                    data.draw = data.draw;
                    data.order = data.order;
                }
            },
            columns: [{
                    data: 'No'
                },
                {
                    data: 'Name'
                },
                {
                    data:"Gender"
                },
                {
                    data:"VisitDate",
                    render: function(data,type){
                        let val =data;
                        if (type=='display')
                        {
                            const dt = new Date(data);
                            val = dt.toDateString();
                        }
                        return val;
                    }
                },
                {
                    data: 'permitId',
                    render: function(data, type) {
                        if (type === 'display') {
                            return '<button id="btnDelete" role="button" onclick="_delete(this)" class="btn btn-delete btn-danger open-modal" value="' +
                                data + '">Delete</button>';
                        }
                        return data;
                    },
                }
            ],

        });
        function _delete(x)
        {
            $.ajax({
                url: "/recruitment", 
                data:{
                        id:$(x).attr("Value"),
                        "_token": "{{ csrf_token() }}",
                },
                method:"DELETE",
                success: ()=>{
                    Swal.fire({
                        title: "Delete Status",
                        text:"Delete Success",
                        icon:'success',
                    }).then(()=>{
                        table.ajax.reload();
                    });
                }
            });
        }
</script>
@endsection
