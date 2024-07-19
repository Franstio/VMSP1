@extends('layouts.main')
@section('container')

<main id="main" class="main">
  <section class="section dashboard">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h4 class="mt-5 mb-2 text-gray-800"><strong>Report Data</strong></h4>
    </div>

    <div class="col-md-12">
    </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3 position-relative card-table">
                <label class="col-sm-7 col-form-control"><strong>VISITOR NAME</strong></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="namaVisitor" id="namaVisitor">
                </div>
                <br>
                <label class="col-sm-7 col-form-control"><strong>PURPOSE</strong></label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="purpose" id="purpose">
                    <option value="" selected>- Select one -</option>
                  </select>
                </div>
                <br>
                <label class="col-sm-7 col-form-control"><strong>ID Type</strong></label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="idType" id="idType">
                    <option value="" selected>- Select one -</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-3 position-relative">
                <label class="col-sm-7 col-form-control"><strong>COMPANY</strong></label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="nameVendor" id="nameVendor">
                    <option selected>- Select one -</option>
                  </select>
                </div><br>
                <label class="col-sm-7 col-form-control"><strong>HOST</strong></label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="name" id="name">
                    <option selected>- Select one -</option>
                  </select>
                </div>
                <br>
                <label class="col-sm-7 col-form-control"><strong>Manual Input</strong></label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="manualInput" id="manualInput">
                    <option value="" selected>- Select one -</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-3 position-relative">
                <label class="col-sm-7 col-form-control"><strong>ID Number</strong></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nik" id="nik">
                </div>
                <br>
                <label class="col-sm-7 col-form-control"><strong>LOCATION</strong></label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="nameLocation" id="nameLocation">
                    <option selected>- Select one -</option>
                  </select>
                </div>
                <br>
                <label class="col-sm-7 col-form-control"><strong>Include Rejected Visitors?</strong></label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example" name="rejectedVisitor" id="rejectedVisitor">
                    <option value="No" selected>NO</option>
                    <option value="Yes">YES</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2 position-relative">
                <label for="inputDate" class="col-sm-7 col-form-control"><strong>DATE FROM</strong></label>
                <div class="col">
                  <input name="fromDate" id="fromDate" type="date" class="form-control" placeholder="dd-mm-yyyy" onchange="changeDate(this)">
                </div><br>
                <label for="inputDate" class="col-sm-7 col-form-control"><strong>DATE END</strong></label>
                <div class="col">
                  <input name="endDate" id="endDate" type="date" class="form-control" placeholder="dd-mm-yyyy" onchange="changeDate(this)">
                </div><br>
              </div>

              <div class="col-11 flex-row d-flex ">
                <span class="flex-grow-1"></span>
                <div class="gap-2  d-block">
                  <button class="btn btn-primary" type="reset" id="btnReset">Reset</button>
                  <button class="btn btn-primary" type="submit" onClick="applyFilter()">Apply Filter</button> 
                  <button class="btn btn-success " type="button" onclick="ExportToExcel()">Download</button>
                </div>

              </div>



              <!-- End Custom Styled Validation with Tooltips -->

            </div>


          </div>
        </div>
        </form>
        <!-- End Button -->

        <!-- End Filter Column -->
        <div class="row">
          <div class="col-md-12">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
              </div>
              <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                <table id="table_report" class="table2excel" class="display" style="width:100%">
                  <thead class="bg-light">
                    <tr>
                      <th>Visitor Name</th>
                      <th>ID Number</th>
                      <th>Purpose</th>
                      <th>Host</th>
                      <th>Time-In</th>
                      <th>Time-Out</th>
                      <th>Company Name</th>
                      <th>Badge Number</th>
                      <th>Temp</th>
                      <th>ID Type</th>
                      <th>Location</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>

<script type="text/javascript">
  // Load Table
  var table = $("#table_report").DataTable({
    sDom: 'lrtip',
    processing: true,
    serverSide: true,
    "ajax": {
      "url": "report/data", //API
      "type": "GET",
      "dataType": "json",
      //"data":data
      "data": function(data) {
        data.columns = JSON.stringify(data.columns);
        data.draw = data.draw;
        data.order = data.order;
      }
    },
    columns: [{
        data: 'namaVisitor'
      },
      {
        data: 'nik',
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
        data: 'name',
        render: function(data, type, row, meta) {
        console.log(data);
        let Name = data.split(':');
        return  Name[0];
         }, 
      },
      {
        data: 'timeCheckin',
        name: 'timeCheckin',
        render: function(data)
        {
          const value = new Date(data);
          return value.toDateString() + " "+ value.toLocaleTimeString();
        }
      },
      {
        data: 'timeCheckout',
        render: function(data)
        {
          const value = new Date(data);
          return value.toDateString() + " "+ value.toLocaleTimeString();
        }
      },
      {
        data: 'nameVendor'
      },
      {
        data: 'noBadge',
        visible:false
      },
      {
        data: 'temp',
        visible:false
      },
      {
        data:'idType'
      },
      {
        data: 'nameLocation'
      },
    ],

  })
  // Ajax Setup Auth
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  document.getElementById("fromDate").valueAsDate = new Date();
  document.getElementById("endDate").valueAsDate = new Date();


  function changeDate(e) {
    // console.log(e.getAttribute("value"));
    console.log($('#fromDate').val(), $('#endDate').val());
    //  table.column(4).search($('#fromDate').val());
    table.column(4).search($('#fromDate').val() + ' and ' + $('#endDate').val());
    table.ajax.reload();
    // table.draw();
  };

  function applyFilter() {
    // console.log('TEST',$('#namaVisitor').val(),$('#purpose').val());
    table.column(0).search($('#namaVisitor').val());
    table.column(1).search($('#nik').val());
    table.column(2).search($('#purpose').val());
    table.column(3).search($('#name').val());
    table.column(4).search($('#fromDate').val() + ' and ' + $('#endDate').val());
    table.column(6).search($('#nameVendor').val());
    table.column(9).search($("#nameLocation").val());
    table.ajax.reload();

  }


  // Load Purpose
  $.ajax({
    url: "select/purpose",
    method: "GET",
    async: true,
    dataType: 'json',
    success: function(data) {
      var html = '<option value="" selected>- Select one -</option>';
      var i;
      for (i = 0; i < data.data.length; i++) {
    
        html += '<option value="' + data.data[i].purpose + '">' + data.data[i].purpose + '</option>';
      }
      $('#purpose').html(html);

    }
  })

  // Load Vendor
  $.ajax({
    url: "select/vendor",
    method: "GET",
    async: true,
    dataType: 'json',
    success: function(data) {
      var html = '<option value="" selected>- Select one -</option>';
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
      var html = '<option value="" selected>- Select one -</option>';
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
      var html = '<option value="" selected>- Select one -</option>';
      var i;
      for (i = 0; i < data.data.length; i++) {
        html += '<option value="' + data.data[i].nameLocation + '">' + data.data[i].nameLocation + '</option>';
      }
      $('#nameLocation').html(html);

    }
  })

  $("#btnReset").click(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    $(`input[type="text"]`).val('')
    $(`input[type="date"]`).val('')
    $(`select`).val('').removeAttr('checked')
  });

  function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('table_report');
    var wb = XLSX.utils.table_to_book(elt, {
      sheet: "sheet1",
      raw: true
    });
    return dl ?
      XLSX.write(wb, {
        bookType: type,
        bookSST: true,
        type: 'base64'
      }) :
      XLSX.writeFile(wb, fn || ('VMS.' + (type || 'xlsx')));
  }
</script>



@endsection