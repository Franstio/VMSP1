@extends('layouts.main')
@section('container')

<main id="main" class="main">
  <section class="section dashboard">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h4 class="mt-5 mb-2 text-gray-800"><strong>Manual Input</strong></h4>
    </div>

    <div class="btn-group">
      <a href="/waiting" class="btn btn-secondary ">Visitor List</a>
      <a href="/manual" class="btn btn-secondary">Manual Input</a>
      <a href="/reject" class="btn btn-secondary">Reject List</a>
      <a href="/vipcheckin" class="btn btn-secondary">VIP Check-in</a>
      <a href="/vipcheckout" class="btn btn-secondary">VIP Check-out</a>
      <a href="/recruitment-list" class="btn btn-secondary">Recruitment List</a>
    </div>

    <div class="col-md-6 mt-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body">

          <div class="row">
            <div class="col-md-12">
              <div class="p">
                @csrf
                <h3><strong> Input visitor data in the following field</strong></h3>
                <br>

                <input type="hidden" class="form-control" name="id" id="id">
                <div class="mb-3 row">
                    <label for="Purpose" class="col-sm-2 col-form-label">
                      <strong>ID Card Type</strong>
                    </label>
                    <div class="col-sm-5">
                      <select class="form-select " aria-label="Default select example" name="nik" id="Select" onchange="NRIC(this)">
                        <option value="NRIC">NRIC</option>
                        <option value="Passport">Passport</option>
                      </select>
                    </div>
                  </div>
                

                  <div id="IDCard">
                    <div class="mb-3 row">
                      <label for="Anggota" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-5">
                        <input type="text"  class="form-control" name="nik" id="nik" maxlength="16" required>
                        <datalist id="nikList">

                        </datalist>
                      </div>
                    </div>
                  </div>

                  <div id="Passport" class="d-none">
                    <div class="mb-3 row">
                      <label for="Anggota" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="nik" id="nik" required>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Anggota" class="col-sm-2 col-form-label"><strong>Name</strong></label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="namaVisitor" id="namaVisitor">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Purpose" class="col-sm-2 col-form-label"><strong>Purpose</strong></label>
                    <div class="col-sm-5">
                      <select class="form-select purpose" aria-label="Default select example" name="purpose" id="purpose" onchange="myFunction(this)">
                        <option value=''>- Select one -</option>
                        <option value="EMERGENCY">EMERGENCY</option>
                        <option value="WORKING">WORKING</option>
                        <option value="MEETING">MEETING</option>
                        <option value="SUPPLY">SUPPLY</option>
                        <option value="RECRUITMENT PROCESS">RECRUITMENT PROCESS</option>
                        <option value="VISIT">VISIT</option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Company name" class="col-sm-2 col-form-label"><strong>Company Name</strong></label>
                    <div class="col-sm-5">
                      <select class="form-select" aria-label="Default select example" name="nameVendor" id="nameVendor">
                        <option disable selected></option>
                        <option value=""></option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Host" class="col-sm-2 col-form-label"><strong>Host</strong></label>
                    <div class="col-sm-5">
                      <select class="form-select" aria-label="Default select example" name="name" id="name">
                        <option selected>- Select one -</option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Temperature" class="col-sm-2 col-form-label"><strong>Temperature</strong></label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="temp" id="temp">
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Location" class="col-sm-2 col-form-label"><strong>Location</strong></label>
                    <div class="col-sm-5">
                      <select class="form-select" aria-label="Default select example" name="nameLocation" id="nameLocation">
                        <option selected>- Select one -</option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Badge No" class="col-sm-2 col-form-label"><strong>Badge No.</strong></label>
                    <div class="col-sm-5">
                      <select class="form-select" aria-label="Default select example" name="noBadge" id="noBadge">
                        <option selected>- Select one -</option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Vest No" class="col-sm-2 col-form-label"><strong>Vest No.</strong></label>
                    <div class="col-sm-5">
                      <select class="form-select" aria-label="Default select example" name="noVest" id="noVest">
                        <option selected>- Select one -</option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="Purpose" class="col-sm-2 col-form-label">
                      <strong>Recordable Media</strong>
                    </label>
                    <div class="col-sm-5">
                      <select class="form-select bawaBarang " aria-label="Default select example" name="bawaBarang" id="mySelect" onchange="text(this)">
                        <option value=''>- Select one -</option>
                        <option value="YA">YA</option>
                        <option value="TIDAK">TIDAK</option>
                      </select>
                    </div>
                  </div>

                  <div class="card" id="mycode" style="display: none">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <th>Controlled Items</th>
                                <th>Serial Number</th>
                                <th>Action</th>
                              </thead>
                              <tbody id="table_data">
                                <td>
                                  <select class="form-select" aria-label="Default select example" name="jenisMedia" id="jenisMedia">
                                    <option selected>- Select one -</option>
                                    <option value="Personal Computer / Laptop">Personal Computer / Laptop</option>
                                    <option value="Camera (Digital or analogue)">Camera (Digital or analogue) </option>
                                    <option value="Mobilephone with camera / video">Mobilephone with camera / video</option>
                                    <option value="Digital Video Recorder">Digital Video Recorder</option>
                                    <option value="Thumdrive / pendrive storage unit">Thumdrive / pendrive storage unit</option>
                                    <option value="Memory Cards (SD/CF/MMC .etc)">Memory Cards (SD/CF/MMC .etc)</option>
                                    <option value="Audio Tape Recorder">Audio Tape Recorder</option>
                                    <option value="CDRW / CDR / HDD">CDRW / CDR / HDD</option>
                                    <option value="Others (pls states)">Others (pls states)</option>
                                  </select>
                                </td>
                                <td>
                                  <input type="text" class="form-control" name="SN" id="SN">
                                </td>
                                <td>

                                  <!--   <button onclick="delete_row(this)" type="button" class="btn btn-danger btn-sm">Delete</i>
                            </button> -->
                                  <button onclick="add_row(this)" type="button" class="btn btn-success btn-sm">Add</i>
                                  </button>
                                </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--  <div class="mb-3 row">
                    <label for="Temperature" class="col-sm-2 col-form-label"><strong>Photo</strong></label>
                    <div class="col-sm-5">
                      <input type="file" class="form-control" name="photo" id="photo">
                    </div>
                  </div> -->
                <div class="modal-footer">
                  <button type="reset" class="btn btn-primary" id="btnReset">Clear</button>
                  <button type="submit" class="btn btn-primary" id="btnSave">Submit</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
  // Load Purpose
  /* $.ajax({
    url: "select/purpose",
    method: "GET",
    async: true,
    dataType: 'json',
    success: function(data) {
      var html = '';
      var i;
      for (i = 0; i < data.data.length; i++) {
        html += '<option value="' + data.data[i].purpose + '">' + data.data[i].purpose + '</option>';
      }
      $('#purpose').html(html);

    }
  }) */

  // Load Vendor
  $.ajax({
    url: "select/vendor",
    method: "GET",
    async: true,
    dataType: 'json',
    success: function(data) {
      var html = '<option value=\'\'>- Select one -</option>';
      var i;
      for (i = 0; i < data.data.length; i++) {
        html += '<option value="' + data.data[i].nameVendor + '">' + data.data[i].nameVendor + '</option>';
      }
      $('#nameVendor').html(html);

    }
  })

  // Load Host
  $.ajax({
    url: "select/user",
    method: "GET",
    async: true,
    dataType: 'json',
    success: function(data) {
      var html = '<option value=\'\'>- Select one -</option>';
      var i;
      for (i = 0; i < data.data.length; i++) {
        html += '<option value="' + data.data[i].name + '">' + data.data[i].name + '</option>';
      }
      $('#name').html(html);

    }
  })

  // Load Location
  $.ajax({
    url: "select/location",
    method: "GET",
    async: true,
    dataType: 'json',
    success: function(data) {
      var html = '<option value=\'\'>- Select one -</option>';
      var i;
      for (i = 0; i < data.data.length; i++) {
        html += '<option value="' + data.data[i].nameLocation + '">' + data.data[i].nameLocation + '</option>';
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
      var html = '<option value=\'\'>- Select one -</option>';
      var i;
      for (i = 0; i < data.data.length; i++) {
        html += '<option value="' + data.data[i].noBadge + '">' + data.data[i].noBadge + '</option>';
      }
      $('#noBadge').html(html);

    }
  })

  // Load Vest
  $.ajax({
    url: "select/vest",
    method: "GET",
    async: true,
    dataType: 'json',
    success: function(data) {
      var html = '<option value=\'\'>- Select one -</option>';
      var i;
      for (i = 0; i < data.data.length; i++) {
        html += '<option value="' + data.data[i].noVest + '">' + data.data[i].noVest + '</option>';
      }
      $('#noVest').html(html);

    }
  })
  $("#nik").on('change',function(){
    let val = $("#nik").val();
    $.ajax({
      url: "waiting/visitor/"+val,
      method:"GET",
      async:true,
      dataType: 'json',
      success: function(x){
        if (x.length < 1)
          return;
        let data = x[0];
      $('#namaVisitor').val(data.namaVisitor);
      $('#nameVendor').val(data.nameVendor);
      }
    });
  });
/*  $("#nik").on('keyup',function(){
    let val = $("#nik").val();
    $.ajax({
      url: "waiting/nik/"+val,
      method:"GET",
      async:true,
      dataType: 'json',
      success: function(x){
        if (x.length > 1)
          $("#nikList").html("");
        for (let i=0;i<x.length;i++)
        {
          $("#nikList").append("<option value='"+x[i].NIK+"'></option>");
        }
      }
    });
  });*/
  // Save Record
  const d ={NRIC: 'IDCard', Passport: 'Passport'};
  $("#btnSave").click(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    var formData = {
      id: $('#id').val(),
      nik: $("#"+d[$("#Select").val()]+ " #nik").val(),
      namaVisitor: $('#namaVisitor').val(),
      nameVendor: $('#nameVendor').val(),
      name: $('#name').val(),
      purpose: $('#purpose').val(),
      temp: $('#temp').val(),
      nameLocation: $('#nameLocation').val(),
      noBadge: $('#noBadge').val(),
      noVest: $('#noVest').val(),
      kondisi: $('#kondisi').val(),
      bawaBarang: $('.bawaBarang').val(),
      //bawaBarang: $('input[bawaBarang="inlineRadioOptions"]:checked').val(),
      jenisMedia: $('#jenisMedia').val(),
      SN: $('#SN').val(),
    };

    $.ajax({
      type: "PUT",
      url: "/manual/store",
      data: formData,
      dataType: 'json',
      success: function(data) {
        Swal.fire({
          title: "Success!",
          text: "Data berhasil diinput!",
          icon: "success",
          button: "OK!",
          timer: 3000
        });
        setTimeout(() => {
          location.reload()
        }, 2000);
        console.log(data);
        /*  table.clear();
         table.ajax.reload();
         table.draw(); */
        $(`input[type="text"]`).val('')
        $(`select`).val('')
        $(`input[type="radio"]`).val('').removeAttr('checked')
      },
      error: function(data) {
        console.log(data);
      }
    });
  });

  $("#btnReset").click(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    $(`input[type="text"]`).val('')
    $(`select`).val('').removeAttr('checked')

  });

  function add_row(btn) {

    let total_row = $("#table_data tr").length
    total_row = total_row + 1
    let html = `
          <tr>
          <td>
                                <select class="form-select" aria-label="Default select example" name="jenisMedia">
                                    <option selected>- Select one -</option>
                                    <option value="Personal Computer / Laptop">Personal Computer / Laptop</option>
                                    <option value="Camera (Digital or analogue)">Camera (Digital or analogue) </option>
                                    <option value="Mobilephone with camera / video">Mobilephone with camera / video</option>
                                    <option value="Digital Video Recorder">Digital Video Recorder</option>
                                    <option value="Thumdrive / pendrive storage unit">Thumdrive / pendrive storage unit</option>
                                    <option value="Memory Cards (SD/CF/MMC .etc)">Memory Cards (SD/CF/MMC .etc)</option>
                                    <option value="Audio Tape Recorder">Audio Tape Recorder</option>
                                    <option value="CDRW / CDR / HDD">CDRW / CDR / HDD</option>
                                    <option value="Others (pls states)">Others (pls states)</option>
                                  </select>
                              </td>

                                <td>
                                <input type="text" class="form-control" name="SN" >
                                </td>
                                
                                <td>
                                  <button onclick="delete_row(this)" type="button" class="btn btn-danger btn-sm">Delete</i>
                                  </button>
                                </td>

          </tr>
          `

    $("#table_data").append(html)
  }

  function delete_row(btn) {
    $(btn).closest('tr').remove()
    let row_number = 0
    $('.no').each(function() {
      $(this).text(row_number + 1)
      row_number++
    })
  }

  function clear_input(btn) {
    $(btn).closest('tr').find('input, select').val('')
  }

  function text(x) {
    var x = document.getElementById("mySelect").value;
    if (x == "YA") document.getElementById("mycode").style.display = "block";
    else document.getElementById("mycode").style.display = "none";
    return;
  }

  function NRIC(x) {
    var x = document.getElementById("Select").value;
    if (x == "NRIC") {
      document.getElementById("IDCard").style.display = "block";
    } else if (x == "Passport"){
      document.getElementById("IDCard").style.display = "none";
    }  else if (x == "Passport") {
      document.getElementById("Passport").style.display = "block";
    } else document.getElementById("Passport").style.display = "none"; 

    if (x === "Passport") {
      $('#Passport').removeClass('d-none')
    } else {
      $('#Passport').addClass('d-none')
    }
    return;
  }
</script>

@endsection