@extends('layouts.main')
@section('container')
    <main id="main" class="main">
        <section class="section dashboard mt-5">

            <div class="d-sm-flex align-items-center justify-content-between">
                <h3><strong>User Setting</strong></h3>
            </div>

            <!-- @if (session()->has('success'))
    <div class="alert alert-success col-md-6" role="alert">
      {{ session('success') }}
      </div>
    @endif -->

            <div class="col-md-6 mt-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><strong>Changed Password</strong></h3>
                                <hr>
                                <form action="usersetting" method="POST" id="frm1">
                                    @csrf
                                    <!--  <div class="mb-4 row">
                            <label for="Password" class="col-sm-3 col-form-label">Old Password</label>
                            <div class="col-sm-5">
                              <input type="password" class="form-control" id="Password" name="old_password">
                            </div>
                             </div> -->
                                    <div class="mb-4 row">
                                        <label for="Password" class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" id="Password" name="new_password">
                                        </div>
                                    </div>
                                    <div class="mb-4 row">
                                        <label for="Password" class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" id="ConfirmPassword"
                                                name="new_password_confirmation">
                                        </div>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Changed Password">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if (auth()->user()->nameRole == "Superadmin"  OR auth()->user()->nameRole == "Admin" OR auth()->user()->nameRole == "Host") 
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><strong>Handover (Second layer) Host</strong></h3>
                                <hr>
                                <form
                                    action="<?= $handover == null ? 'usersetting/handover' : 'usersetting/handover/reset' ?>"
                                    method="POST">
                                    @csrf
                                    <div class="mb-4 row">
                                        <label for="Host" class="col-sm-3 col-form-label">Select Hostname</label>
                                        <div class="col-sm-5">
                                            <select class="form-select"
                                                readonly="<?= $handover == null ? 'false' : 'true ' ?>"
                                                aria-label="Default select example" name="rfid" id="name">
                                                <option selected>- Select one -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4 row">
                                        <label for="Password" class="col-sm-3 col-form-label">Current Handover</label>
                                        <div class="col-sm-5">
                                            <input type="text" readonly class="form-control" id="cur"
                                                value="<?= $handover == null ? '' : $handover[0]->Name ?>" name="">
                                        </div>
                                    </div>
                                    <input class="btn <?= $handover == null ? 'btn-primary' : 'btn-danger' ?>"
                                        type="submit" value="<?= $handover == null ? 'Confirm' : 'Reset Handover' ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
    </main>

    <script type="text/javascript">
        // Ajax Setup Auth
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Load Host
        $.ajax({
            url: "select/user-dept",
            method: "GET",
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '<option selected>- Select one -</option>';
                var i;
                for (i = 0; i < data.data.length; i++) {
                    html += '<option value="' + data.data[i].rfid + '">' + data.data[i].name + '</option>';
                }
                $('#name').html(html);

            }
        })
        $("#frm1").on('submit',function(){
            if ($("#Password").val() != $("#ConfirmPassword").val())
            {
                Swal.fire({
                    title:"Password Change Failed",
                    text: "Confirmed Password Mismatch",
                    icon:"error"
                });
                return false;
            }
            return true;
        });
    </script>
    @include('sweetalert::alert')
@endsection
