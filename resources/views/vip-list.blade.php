@extends('layouts.main')
@section('container')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h4 class="mt-5 mb-2 text-gray-800"><strong>VIP Waiting List</strong></h4>
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

            <div class="row">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                                        <table id="table_waiting" class="display" style="width:100%">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th>Visitor Name</th>
                                                    <th>ID Number</th>
                                                    <th>Purpose</th>
                                                    <th>Location</th>
                                                    <th>Host</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-checkin">
                        <div class="card-header text-center font-weight-bold"
                            style="font-size: 23px;line-height: 23px;letter-spacing: -0.003em;font-weight: 900;font-style: normal;">
                            Waiting List
                        </div>
                        <div id="waitingneedcheckin"></div>




                    </div>


                </div>


                <div class="modal" tabindex="-1" id="formScanHost">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title"><strong>Waiting Host Confirmation</strong></h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label"><strong>Nama Visitor</strong></label>
                                        <input type="text" class="form-control" id="Visitor" name="Visitor" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputPassword4" class="form-label"><strong>No Badge</strong></label>
                                        <input type="text" class="form-control" name="nomorBadge" id="nomorBadge"
                                            disabled>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label for="recipient-name" class="col-form-label"><strong>Host</strong></label>
                                    <input type="text" class="form-control" name="hostName" id="hostName" disabled>
                                </div>
                                <!--   <input type="text" class="form-control" name="hostName" id="hostName" disabled> -->
                                <!-- <input class="form-control" id="scanRfidHost" name="scanRfidHost" /> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Salah Badge Host-->
                <div class="modal" tabindex="-1" id="wrongBadge">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-red center"><strong>Wrong badge! Please use the authorized host
                                        badge</strong></h5>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="eApproval" tabindex="-2" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-body"
                                style="
                                  padding-top: 0px;
                                  padding-right: 0px;
                                  padding-left: 0px;
                                  padding-bottom: 0px;
                              ">
                                <div class="card">
                                    <div class="card-body"
                                        style="
                              padding-top: 0px;
                              padding-left: 0px;
                              padding-bottom: 0px;
                              padding-right: 0px;
                              ">

                                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                            <img id="photoPermit" src="" alt="Profile"
                                                style="height: 350px;" /><br><br>
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

                <!-- Modal Edit Badge-->
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" alt="Profile">
                                <div class="mb-3 row">
                                    <input type="hidden" class="form-control" name="id" id="id">
                                    <label for="inputState" class="col-sm-4 col-form-label">No Badge </label>
                                    <div class="col-sm-7">
                                        <select class="form-select" aria-label="Default select example" name="noBadge"
                                            id="noBadge">
                                            <option selected>- Select one -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputState" class="col-sm-4 col-form-label">No Vest </label>
                                    <div class="col-sm-7">
                                        <select class="form-select" aria-label="Default select example" name="noVest"
                                            id="noVest">
                                            <option selected>- Select one -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success" id="btnSave">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="confirmBadge" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered modal-sm"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center w-100" id="modalTitleId">
                                    Are you sure want to assign the badge?<br />
                                    <span class="text-primary">Scan the badge again to confirm</span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-row gap-2 justify-content-around">
                                    <img id="confirmBadgePhoto" src="/storage/804541.png" />
                                    <div class="d-flex flex-column gap-2">
                                        <label>Nama : <span id="confirmBadgeNama">FRANSTIO DIEGO</span></label>
                                        <label><span id="confirmBadgeTypeId">KTP</span></label>
                                        <label>Nomor : <span id="confirmBadgeId">710001</span></label>
                                        <label>Perusahaan : <span id="confirmBadgeVendor">PANASONIC
                                                CORPORATION</span></label>
                                        <label>Nama Host : <span id="confirmBadgeHost">GALIH GALUH GIRI
                                                GILBERTO</span></label>
                                        <label>Lokasi : <span id="confirmBadgeLokasi">Meeting Room - Zone B</span></label>
                                        <span id="confirmWithoutMedia" class="d-none text-success">without Recordable
                                            media</span>
                                    </div>
                                    <div>
                                        <div class="d-flex flex-row align-items-center ">
                                            <img src="assets/img/id-card.png" height="80" alt=""> <span
                                                id="badge1" class="badge-number text-center text-bold">12</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                                </button>
                                <span class="text-danger w-100 text-center">Press "Esc" to cancel and close this
                                    window</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Optional: Place to the bottom of scripts -->
                <script>
                    const myModal = new bootstrap.Modal(
                        document.getElementById("modalId"),
                        options,
                    );
                </script>

                <div class="modal fade" id="ModalReject" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="btnReject" class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <script>
                    var strRfid = '';
                    var strRfidHost = '';
                    var strRfidTakeOver = '';
                    var strTransaksiId = '';
                    var topUser = null;
                    var badge = undefined;
                    function actionCheck(x)
                    {
                        let data = {
                            id_permit: $(x).attr('permit'),
                            id: $(x).attr("transaksi"),
                            kondisi: $(x).attr("status")
                        };
                        $.ajax({
                            data:data,
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            },
                            method:"POST",
                            url: "/vip-list/" + (data.kondisi=='checkin' ? 'check-out' : 'check-in'),
                            success: function(){
                                window.location.reload();   
                            }
                        });
                    }
                    $(document).keydown(function(e) {
                        if (e.key == 'Escape') {
                            strRfid = '';
                            badge = undefined;
                            $("#confirmBadge").modal('hide');
                        }
                        if (e.key == 'Enter') {
                            if (!badge || badge == null) {
                                $.ajax({
                                    url: '/badge/show/' + strRfid,
                                    method: 'GET',
                                    success: function(data) {
                                        badge = data;
                                        $("#confirmBadgeNama").html(topUser.namaVisitor);
                                        $("#confirmBadgeId").html(data.Rfid);
                                        $("#confirmBadgeVendor").html(topUser.nameVendor);
                                        $("#confirmBadgeHost").html(topUser.name.split(':')[0]);
                                        $("#confirmBadgeLokasi").html(topUser.nameLocation);
                                        $("#confirmBadgePhoto").attr('src', '/storage/' + topUser.photo);
                                        $("#badge1").html(data.noBadge + " - Zone " + topUser.zone);
                                        if (topUser.barangBawaan && topUser.barangBawaan != null && topUser
                                            .barangBawaan != '') {
                                            $("#confirmWithoutMEdia").removeClass('d-none');
                                        } else {
                                            $("#confirmWithoutMedia").addClass('d-none');
                                        }
                                        $("#confirmBadge").modal('show');
                                    },
                                    error: function(errJquery, text, errText) {
                                        console.log([errJquery, text, errText]);
                                        alert('Invalid Badge');
                                        strRfid = '';
                                    }
                                }).done(function() {
                                    strRfid = '';
                                });
                            } else {
                                //              alert([strRfid,badge.Rfid,topUser.id]);
                                if (strRfid != badge.Rfid) {
                                    alert('Incorrect Badge');
                                    strRfid = '';
                                    return;
                                }
                                $.ajax({
                                    url: '/api/transaksi/badge/' + topUser.id,
                                    method: 'PUT',
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                    },
                                    data: {
                                        badgeId: badge.id_badge,
                                        noBadge: badge.noBadge,
                                        rfid: badge.Rfid
                                    },
                                    success: function(d) {
                                        document.location.reload();
                                    },
                                    error: function(err) {
                                        console.log(err);
                                        alert('Update Badge Failed');
                                    }
                                });
                            }
                        } else {
                            strRfid += e.key;
                        }
                    });
                    /*$(document).keydown(function(e) {
                      if (e.key == 'Enter') {
                        //alert('RFID'+strRfid);
                        //alert(strRfidHost);
                        if ((strRfidHost != '' && strRfidHost != undefined && strRfidHost != null) || ( strRfidTakeOver != '' && strRfidTakeOver != undefined && strRfidTakeOver != null)) {
                          if (strRfidHost === strRfid || strRfidTakeOver == strRfid) {
                            //  alert('OK')
                            updateToCheckin(strTransaksiId);
                            $("#formScanHost").modal('hide');
                          } else {
                            $("#wrongBadge").modal('show')
                          }
                        } else {
                          getPermitStatusByBadge(strRfid)
                        }
                        strRfid = '';
                      } else {
                        strRfid += e.key;
                      }
                    })*/
                    // Load Table
                    var table = $("#table_waiting").DataTable({
                        processing: true,
                        lengthMenu: [15, 50, 100],
                        pageLength: 15,
                        serverSide: true,
                        "ajax": {
                            "url": "/vip-list/data", //API
                            "type": "GET",
                            "dataType": "json",
                            //"data":data
                            "data": function(data) {
                                data.columns = JSON.stringify(data.columns);
                                data.draw = data.draw;
                                data.order = data.order;
                                //                          data.status = "checkin", "checkout";

                            }
                        },
                        columns: [
                            /*{
                              data: 'photo',
                              render: function(data, type, row) {
                                if (type === 'display') {
                                  return '<img src="/storage/' + data + '" alt="Profile" class="rounded-circle center" width="32" value="' + row.id + '"  onClick="showImage(this)" />';
                                  //return '<img src="http://localhost:8000/storage/images/40UlRvq2u5O95DzbAWucmK5Jx6PFOsCmTJPIeVDX.jpg" alt="Profile" class="rounded-circle me-2" width="35">';
                                }
                                return data;
                              },
                            },*/
                            {
                                data: 'nameVendor'
                            },
                            {
                                data: 'namaVisitor'
                            },
                            {
                                data: 'Nik'
                            },
                            {
                                data: 'purpose'
                            },
                            {
                                data: 'nameLocation'
                            },
                            {
                                data: 'Host',
                                render: function(data) {
                                    return data ?? "-";
                                }
                            },
                            {
                                data: 'kondisi',
                                render: function(data, type, row) {
                                    if (row.kondisi == 'Checkin' || row.kondisi == 'checkin') {
                                        return '<button class="transaksi_button" onclick="actionCheck(this)" transaksi="'+row.id+'" status="'+row.kondisi+'" permit="'+row.id_permit+'"><i  class="bi bi-arrow-left-square text-red">&nbsp;&nbsp;CHECKED-OUT</i></button>';
                                    } else {
                                        return '<button class="transaksi_button" onclick="actionCheck(this)" transaksi="'+row.id+'" status="'+row.kondisi+'" permit="'+row.id_permit+'"> <i class="bi bi-arrow-right-square text-blue">&nbsp;&nbsp;CHECKED-IN</i></button>';
                                    }

                                    return data;
                                },
                            },
                        ],

                    })

                    function getPermitStatusByBadge(strBadge) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "GET",
                            url: "/api/checkpermitbyrfid/" + strBadge,
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                if (data.purpose === "Supply" || data.purpose == "SUPPLY") {

                                    // Update jadi Checkin
                                    updateToCheckin(data.id);
                                } else if (data.typeVisitor === "Residence" && (data.purpose == "Working" || data.purpose ==
                                        "WORKING")) {
                                    // update checkin
                                    updateToCheckin(data.id);
                                } else {
                                    strRfidHost = data.rfidhost;
                                    strRfidTakeOver = data.rfidtakeover;
                                    strTransaksiId = data.id;
                                    $("#Visitor").val(data.namaVisitor);
                                    $("#nomorBadge").val(data.noBadge);
                                    $("#hostName").val(data.name);
                                    // muncul pop up entry badge host
                                    $("#formScanHost").modal('show');
                                }
                            },
                            error: function(data) {

                                Swal.fire({
                                    title: "Scan Error",
                                    icon: 'error',
                                    text: data.responseText,
                                    timer: 5000
                                });
                                console.log(data);
                            }
                        });

                    }


                    function updateToCheckin(idTransaksi) {
                        console.log(idTransaksi);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "GET",
                            url: "/api/updatetransaksitocheckin/" + idTransaksi,
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
                                console.log(data);
                                if (data.result === "Update Successfully") {
                                    loadNeedCheckin();

                                    table.clear();
                                    table.ajax.reload();
                                    table.draw();
                                }
                            }
                        });

                    }


                    function handleScanRfidHost(e) {
                        console.log('OOOOOOO');

                        // if (e.key == 'Enter') {
                        //   alert('RFID'+strRfidHostEntry);

                        // } else {
                        //   strRfidHostEntry += e.key;
                        // }
                    }

                    // $(document).ready(function(){
                    //   $('#scanRfidHost').keypress(function(event) {
                    //     if (event.keyCode === 13) {
                    //         if ($('#scanRfidHost').val() === strRfidHost) {
                    //            alert('OK');


                    //         } else {
                    //           alert('Salah Badge !!');
                    //         }
                    //     }
                    //   })
                    // })



                    // Ajax Setup Auth
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

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
                    })

                    // Load Vest
                    $.ajax({
                        url: "select/vest",
                        method: "GET",
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;
                            for (i = 0; i < data.data.length; i++) {
                                html += '<option value="' + data.data[i].noVest + '">' + data.data[i].noVest + '</option>';
                            }
                            $('#noVest').html(html);

                        }
                    })


                    loadNeedCheckin();
                    // Load Need Checkin
                    function loadNeedCheckin() {
                        $.ajax({
                            url: "/waiting/needcheckin",
                            method: "GET",
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                var i;
                                for (i = 0; i < data.waitinglist.length; i++) {
                                    if (i == 0)
                                        topUser = data.waitinglist[i];
                                    //  html += '<option value="' + data.data[i].noVest + '">' + data.data[i].noVest + '</option>';
                                    html += '<div class="card info-card">'
                                    html += '  <div class="card-body">'
                                    html += '    <div class="d-flex align-items-center">'
                                    html += '      <div class="card-icon d-flex align-items-center justify-content-center">'
                                    html += '        <img src="/storage/' + data.waitinglist[i].photo +
                                        ' " alt="Profile" style="padding-left: 30px;" class=" me-3" height="70">'
                                    html += '      </div>'
                                    html += '      <div class="ps-4" style="margin-left: 35px;">'
                                    html += '        <h8 class="text-dark" style="font-size: 20px"><strong> ' + data
                                        .waitinglist[i].namaVisitor + '</strong> </h8><br>'
                                    html += '        <h8 class="text-dark" style="font-size: 20px"><strong> ' + data
                                        .waitinglist[i].nik + '</strong> </h8><br>'
                                    html += '        <h8 class="text-dark" style="font-size: 15px"> ' + data.waitinglist[i]
                                        .nameVendor + ' </h8><br>'
                                    html += '        <br>'
                                    html += '         <h8 class="text-dark" style="font-size: 15px">Host: ' + data
                                        .waitinglist[i].name.split(':')[0] + '</h8><br>';
                                    html += '        <h8 class="text-dark" style="font-size: 15px">To. ' + data.waitinglist[
                                        i].nameLocation + ' - Zone ' + data.waitinglist[i].zone + '</h8><br>'
                                    html += '        <h8 class="text-dark" style="font-size: 15px">Purpose : ' + data
                                        .waitinglist[i].purpose + ' </h8><br> '
                                    if (data.waitinglist[i].barangBawaan == null || data.waitinglist[i].barangBawaan == "")
                                        html +=
                                        '        <h8 class="text-red" style="font-size: 15px"><strong>  </strong></h8> '
                                    else {
                                        let bw = JSON.parse(data.waitinglist[i].barangBawaan);
                                        for (let i = 0; i < bw.length; i++) {

                                            html += '        <h8 class="text-red" style="font-size: 15px"><strong> ' + bw[i]
                                                .JenisMedia + ' </strong></h8> '
                                        }
                                    }
                                    html += '      </div>'
                                    // html += '      <div class="ps-5">'
                                    // html += '        <img src="/img/card.png" alt="Profile" class=" me-3" style="border-top-style: solid;padding-bottom: 20px; ">'
                                    // html += '        <span class="text-dark" style="font-size: 50px;line-height: 0px;letter-spacing: -0.1em;font-weight: 500;" > ' + data.waitinglist[i].noBadge + ' </span>'
                                    // html += '        <br><br>'
                                    // html += '        <img src="/img/id-vest.png" alt="Profile" class=" me-3" style="border-top-style: solid;padding-bottom: 20px;">'
                                    // html += '        <span class="text-dark" style="font-size: 50px;line-height: 0px;letter-spacing: -0.1em;font-weight: 500;" > ' + data.waitinglist[i].noVest   + ' </span>'
                                    // html += '      </div>'
                                    html += '      <div class=" ps-5 ">'
                                    html += '       <span >'
                                    html +=
                                        '          <img src="/img/pencil-square.svg" alt="Profile" class=" me-2" onClick="EditTransaksi(' +
                                        data.waitinglist[i].id + ',' + data.waitinglist[i].noBadge + ',' + data.waitinglist[
                                            i].noVest +
                                        ')" style="border-top-style: solid;padding-bottom: 20px; " data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-label="Views">'
                                    html += '        </span>'
                                    html += '        <br><br>'
                                    html += '      <div class="d-flex flex-column gap-2 align-items-stretch">';
                                    html += '      <button type="button" class="btn w-100 btn-danger" onClick=reject(' +
                                        data.waitinglist[i].id +
                                        ') data-bs-toggle="modal" data-bs-target="#ModalReject">reject </button>'
                                    html += '      <button type="button" class="btn btn-info" onClick=showEApproval(' + data
                                        .waitinglist[i].permitID + ')>Show E-Approval</button>';
                                    html += '      </div>';
                                    html += '  </div></div></div></div>';

                                }
                                $('#waitingneedcheckin').html(html);
                            }
                        })

                    };
                    //let Name = data.split(':');
                    //return  Name[0];

                    function EditTransaksi(id, noBadge, noVest) {
                        console.log('OK', id, noBadge, noVest);
                        $.ajax({
                            url: "waiting/show/" + id,
                            type: "GET",
                            success: function(data) {
                                $("#id").val(data.id);
                                $("#noBadge").val(data.noBadge);
                                $("#noVest").val(data.noVest);

                                $("#formModal").modal('show');
                            },
                            error: function(response) {
                                console.log(response.responseJSON)
                            }
                        });

                    };

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
                            noBadge: $('#noBadge').val(),
                            noVest: $('#noVest').val(),

                        };
                        $.ajax({
                            type: "PUT",
                            url: "/waiting/storeBadge",
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

                    function reject(strId) {
                        // var id = $(this).val();
                        $("#id").val(strId);
                        // console.log('ID' + strId);
                        $.ajax({
                            url: "waiting/show/" + strId,
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
                            url: "/waiting/updateReject",
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

                    function showEApproval(e) {
                        $.ajax({
                            url: "permit/show/" + e,
                            type: "GET",
                            success: function(data) {
                                $("#id").val(data.id);
                                $("#photoPermit").attr("src", '/storage/' + data.uploadPermit);
                                $("#eApproval").modal('show');

                            },
                            error: function(response) {
                                console.log(response.responseJSON)
                            }
                        });

                    };
                </script>
            @endsection