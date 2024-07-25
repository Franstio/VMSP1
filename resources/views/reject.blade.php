@extends('layouts.main')
@section('container')

<main id="main" class="main">
<section class="section dashboard">
<div class="d-sm-flex align-items-center justify-content-between">
    <h4 class="mt-5 mb-2 text-gray-800"><strong>Reject List</strong></h4>
        </div>
    
      <div class="col-md-12">
        <div class="btn-group">
        <a href="/waiting" class="btn btn-secondary ">Visitor List</a>
        <a href="/manual" class="btn btn-secondary">Manual Input</a>
        <a href="/reject" class="btn btn-secondary">Reject List</a>
        <a href="/vipcheckin" class="btn btn-secondary">VIP Check-in</a>
        <a href="/vipcheckout" class="btn btn-secondary">VIP Check-out</a>
        <a href="/vip-list" class="btn btn-secondary">VIP List</a>
        <a href="/recruitment-list" class="btn btn-secondary">Recruitment List</a>
        </div>
      </div>
    </div>

       <div class="col-md-7">
        <div class="card card-checkin ">
          <div class="card-header d-none bg-danger text-center text-white font-weight-bold" style="font-size: 23px;line-height: 23px;letter-spacing: -0.003em;font-weight: 900;font-style: normal; ">
            Reject List
          </div>  
          
          <div id="rejectlist"></div>




</div>
</div>
</div>

<div class="modal fade" id="ModalReject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body" alt="Profile">
            <div class="modal-body">
              @csrf
              <input type="hidden" class="form-control" name="id" id="id">
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">
                  <h3 class="text-dark">Remarks</h3>
                </label>
                <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" id="btnReject" class="btn btn-danger">Reject</button>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>   
  
          
<script>
  $("#table_reject").DataTable({
    order: []
  })

  // Load Need Checkin
  $.ajax({
        url: "/reject/rejectlist",
        method: "GET",
        async: true,
        dataType: 'json',
        success: function(data) {
          console.log(data);
          var html = '';
          var i;
          for (i = 0; i < data.reject.length; i++) {
            //  html += '<option value="' + data.data[i].noVest + '">' + data.data[i].noVest + '</option>';
            html += '<div class="card info-card">'
            html += '  <div class="card-body">'
            html += '    <div class="d-flex align-items-center">'
            html += '      <div class="card-icon d-flex flex-shrink-1 align-items-center justify-content-center">'
            html += '        <img src="/storage/' +( data.reject[i].photo==undefined||data.reject[i].photo=="" ?   "804541.png" : data.reject[i].photo ) + '" alt="Profile" style="padding-left: 30px;" class=" me-3" height="70">'
            html += '      </div>'
            html += '      <div class="ps-4" style="margin-left: 35px;">'
            html += '        <h8 class="text-dark" style="font-size: 25px"><strong> ' + data.reject[i].namaVisitor + '</strong> </h8><br>'
            html += '        <h8 class="text-dark" style="font-size: 20px"><strong> ' + data.reject[i].nik + ' </strong></h8><br>'
            html += '        <h8 class="text-dark" style="font-size: 15px"> ' + data.reject[i].nameVendor + ' </h8><br>'
            html += '        <br>'
            html += '        <h8 class="text-dark" style="font-size: 15px">Host : ' + data.reject[i].name + ' </h8><br>'
            html += '        <h8 class="text-dark" style="font-size: 15px">To. ' + data.reject[i].nameLocation + ' </h8> <b style="color:#f00c0c"> </b><br>'
            html += '        <h8 class="text-dark" style="font-size: 15px">Purpose : ' + data.reject[i].purpose + ' </h8> '
            html += '      </div>'
            html += '      <div class="ps-5 flex-grow-1" style="margin-left: 35px;">'
            html += '     <div class="form-outline mb-4">'
            html += '     <label for="remarks" class="form-label text-dark"><strong>Remarks</strong></label>'
            html += '     <textarea class="form-control" readonly class="form-control-plaintext" rows="4" style="flex-grow:1;">' + data.reject[i].reason + '</textarea>'
            html += '      </div>'
            html += '      </div>'
            html += '      <div class=" ">'
            html += '       <span>'
            html += '          <img src="/img/pencil-square.svg" alt="Profile" style="padding-left: 30px;" class=" me-2" onClick="reject(' + data.reject[i].id + ')" data-bs-toggle="modal" data-bs-target="#ModalReject">'
            html += '        </span>'
            html += '        <br><br>'
            html += '      ' 
            html += '  </div></div></div></div>'

          }
          $('#rejectlist').html(html);
        }
      })

      function reject(strId) {
        // var id = $(this).val();
        $("#id").val(strId);
        // console.log('ID' + strId);
        $.ajax({
          url: "reject/show/" + strId,
          type: "GET",
          success: function(data) {
            console.log(data);
            $("#reason").val(data.reason);

            $("#modalReject").modal('show');
          },
          error: function(response) {
            console.log(response.responseJSON)
          }
        });
      };

            // Save Record
            $("#btnReject").click(function(e) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
        });
        e.preventDefault();
        var formData = {
          id: $('#id').val(),
          reason: $('#reason').val(),

        };
        $.ajax({
          type: "PUT",
          url: "/reject/editReject",
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
            $("#ModalReject").modal('hide');
          },
          error: function(data) {
            console.log(data);
          }
        });
      });

</script>

@endsection