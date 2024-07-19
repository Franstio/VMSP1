<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Check-in</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/vendor/img/favicon.png" rel="icon">
    <link href="/vendor/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="assets/vendor/css/css.css" rel="stylesheet">
  <link href="assets/vendor/css/css2.css" rel="stylesheet">-->

    <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@800&display=swap" rel="stylesheet">-->

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/vendor/css/bootstrap-select.min.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">-->
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!--	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->

    <style>
        html,
        body {
            margin: 0;
            height: 100%;
            background-image: linear-gradient(#3197fd, #76c8fa);
        }

        #main {
            margin-left: 0;
            margin-top: 0;
            /* background-image: linear-gradient(#3e97ef, #3eaef6); */
            /* background-image: linear-gradient(#3197fd, #76c8fa); */
        }

        #main .dashboard {
            margin-top: 80px;
        }
    </style>

    @vite(['resources/js/app.js'])
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <div>
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="assets/img/pn.svg" alt="">
                </a>
                <h6 id="clock" class="mt-2"></h6>
            </div>
            <i class="bi bi-list toggle-sidebar-btn d-lg-none"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto w-100">
            <ul class="d-flex align-items-center w-100">

                <li class="nav-item d-none d-lg-block mx-auto">
                    <h2 class="mb-0 text-primary text-bold">ESCORTING POINT</h2>
                </li>

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">

                <!-- row 1 -->

                <div class="col-12 col-lg-7">
                    <div class="card card-checkin">
                        <div class="card-header text-center font-weight-bold">
                            VISITOR
                        </div>
                        <div class="card-body position-relative d-flex">
                            <img id="photo1" src="assets/img/scan.png" alt="" class="scan-img">
                            <div class="p-3" id="checkin">
                                <h4 id="name1" style="font-size: 24px;" class="visitor-content">NAMA</h4>
                                <h4 id="nik1" style="font-size: 24px;" class="visitor-content">NIK</h4>
                                <h4 id="vendor1" style="font-size: 24px;" class="visitor-content">COMPANY</h4>

                                <h2 style="font-size: 24px;" class="visitor-checkin-time">Check in time: <span
                                        id="time1" class="green-text-2"></span> <span id="today1"
                                        style="opacity: 0"class="green-text-2"></span></h2>
                            </div>

                            <div class="badge-id">
                                <p>
                                    <small>Badge no:</small>
                                </p>
                                <img src="assets/img/id-card.png" alt=""> <span id="badge1"
                                    class="badge-number"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="card card-checkin card-status">
                        <div class="card-header text-center font-weight-bold">
                            STATUS
                        </div>
                        <div class="card-body">

                            <h5 id="statusA1Copy" style="font-size: 24px;" class="card-title d-none">Waiting . . . <br>
                                Visitor please tap the badge</h5>
                            <h5 id="statusA1" style="font-size: 24px;" class="card-title">Waiting . . . <br> Visitor
                                please tap the badge</h5>
                            <div class="d-flex px-4 mt-4">
                                <img id="imgA1" src="assets/img/group-therapy-illustration_74855-5516.jpg"
                                    alt="" class="mx-auto img-status">
                                <img id="imgB1" src="assets/img/qr-code.png" alt=""
                                    class="mx-auto img-status">
                            </div>
                        </div>
                    </div>
                    <input type="text" id="qrCode" style="opacity: 1" autofocus />
                    <input type="hidden" value="" id="nikStore" />
                    <input type="hidden" value="" id="permitStore" />
                </div>

                <!-- Row 2 -->

                <div class="col-12 col-lg-7">
                    <div class="card card-checkin">
                        <div class="card-header text-center font-weight-bold">
                            HOST
                        </div>
                        <div class="card-body position-relative d-flex">
                            <img id="photo2" src="assets/img/scan.png" alt="" class="scan-img">
                            <div class="p-3" id="checkin">
                                <h4 id="name2" style="font-size: 24px;" class="visitor-content">NAMA</h4>
                                <h4 id="nik2" style="font-size: 24px;" class="visitor-content">EE</h4>
                                <h4 id="vendor2" style="font-size: 24px;" class="visitor-content">DEPT</h4>

                                <h2 style="font-size: 24px;" class="visitor-checkin-time">Confirmation Time: <span
                                        id="time1" class="green-text-2"></span> <span id="today2"
                                        style="opacity: 0"class="green-text-2"></span></h2>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <center>
                        <div class="wrapper w-100">
                            <div class="top-bubble mb-4 d-flex">
                                <div class="speech-bubble green-text" id="bubble-1">
                                    Visitor need to tap their badge
                                </div>

                                <div class="speech-bubble ms-auto" id="bubble-3">
                                    Visitor has been checked in!
                                </div>
                            </div>

                            <div class="arrow-steps clearfix">
                                <div class="step current" id="step-1" data-step="1"> <span> Step 1</span> </div>
                                <div class="step" id="step-2" data-step="2"> <span>Step 2</span> </div>
                                <div class="step" id="step-3" data-step="3"> <span> Step 3</span> </div>
                            </div>

                            <div class="bottom-bubble mt-4">
                                <div class="speech-bubble-bottom mx-auto" id="bubble-2">
                                    Host need to tap their badge to confirm the visitor
                                </div>
                            </div>

                            <!-- Arrow step demo -->
                            <div class="nav clearfix" style="opacity: 0">
                                <p>demo: </p> <br>
                                <a href="javascipt:void(0)" class="prev me-2">Previous</a>
                                <a href="javascipt:void(0)" class="next pull-right">Next</a>
                            </div>
                            <!-- Arrow step demo -->


                            <p id="dataqr" style="opacity: 1"> </p>
                        </div>
                    </center>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span></span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      
    </div>
  </footer> -->
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

    <script src="assets/vendor/js/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js"
        integrity="sha512-he8U4ic6kf3kustvJfiERUpojM8barHoz0WYpAUDWQVn61efpm3aVAD8RWL8OloaDDzMZ1gZiubF9OSdYBqHfQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <!--<script src="assets/vendor/js/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>-->
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/vendor/js/bootstrap-select.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>-->

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!--  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script type="module">
        let TIMEOUT = null;
        setInterval(function() {
            var momentNow = moment();
            $('#clock').html(momentNow.format('DD MMMM YYYY | HH:mm:ss'));
        }, 100);
        let step = 1;
        // Code By Webdevtrick ( https://webdevtrick.com )
        jQuery(document).ready(function() {

            var back = jQuery(".prev");
            var next = jQuery(".next");
            var steps = jQuery(".step");

            next.bind("click", function() {
                jQuery.each(steps, function(i) {
                    if (!jQuery(steps[i]).hasClass('current') && !jQuery(steps[i]).hasClass(
                            'done')) {
                        jQuery(steps[i]).addClass('current');
                        jQuery(steps[i - 1]).removeClass('current').addClass('done');

                        $('#bubble-' + (i + 1)).addClass('green-text');
                        $('#bubble-' + (i)).removeClass('green-text');
                        step = step + 1;
                        return false;
                    }
                })
            });
            back.bind("click", function() {
                jQuery.each(steps, function(i) {
                    if (jQuery(steps[i]).hasClass('done') && jQuery(steps[i + 1]).hasClass(
                            'current')) {
                        jQuery(steps[i + 1]).removeClass('current');
                        jQuery(steps[i]).removeClass('done').addClass('current');
                        step = step - 1;
                        $('#bubble-' + (i + 2)).removeClass('green-text');
                        $('#bubble-' + (i + 1)).addClass('green-text');
                        return false;
                    }
                })
            });

        })
        var idHost = '';
        var idUser = '';
        var idtakeOver = '';
        var curId = '';
        var strTransaksiId = '';
        var curHost = {};
        $("#qrCode").change(function(e) {
            const qrCode = e.target.value;
            /*const _data = {
                id: qrCode.split(':')[0],
                nik: qrCode.split(':')[1]
            };*/
            console.log(idHost);
            curId = qrCode;
            if ((idHost != '' && idHost != undefined && idHost != null) || (idtakeOver != '' && idtakeOver !=
                    undefined && idtakeOver != null)) {
                if (idHost === curId || idtakeOver == curId) {
                    //  alert('OK')
                    updateToCheckin(strTransaksiId);
                } else {

                    Swal.fire({
                        title: "Scan Error",
                        icon: 'error',
                        text: 'Host Id Unauthorized',
                        timer: 1000
                    });
                }
            } else {
                getPermitStatusByBadge(curId)
            }
        });

        function getPermitStatusByBadge(strBadge) {
            // Load Vest
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '@csrf'
                }
            });

            $.ajax({
                type: "GET",
                url: "/api/checkpermitbyrfid/" + strBadge,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (curHost.purpose === "Supply" || curHost.purpose == "SUPPLY") {

                        // Update jadi Checkin
                        updateToCheckin(curHost.id);
                    } else if (curHost.typeVisitor === "Residence" && (curHost.purpose == "Working" || data
                            .purpose == "WORKING")) {
                        // update checkin
                        updateToCheckin(curHost.id);
                    } else {
                      curHost = {
                            hostId: data.hostId,
                            hostDept: data.hostDept,
                            hostName: data.hostName,
                            hostPhoto: data.hostPhoto
                        };
                        idHost = data.rfidhost;
                        idtakeOver = data.rfidtakeover;
                        strTransaksiId = data.id;
                        $("#badge1").html(data.noBadge);
                        $("#photo1").attr("src", '/storage/' + (data.photoVisitor == undefined ?
                            "804541.png" : data.photoVisitor));
                        $("#name1").html(data.namaVisitor);
                        $("#nik1").html(data.nikVisitor);
                        $("#vendor1").html(data.nameVendor);
                        $("#today1").html((new Date()).toLocaleString('en-US')).css({
                            'opacity': '100%'
                        });
                        $("#statusA1").html(
                            "Visitor badge has read <br/> Host please confirm within 10 seconds");
                        $(".next").click();
                        
                        $("#qrCode").val('');
                    }
                },
                error: function(data) {

                    Swal.fire({
                        title: "Scan Error",
                        icon: 'error',
                        text: curHost.responseText,
                        timer: 5000
                    });
                    console.log(data);
                }
            });


        }

        function updateToCheckin(idTransaksi) {
            $("#qrCode").val('');
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
                        text: "Data Saved!",
                        icon: "success",
                        button: "OK!",
                        timer: 3000
                    }).then(() => {
                        if (curId == idtakeOver) {
                            $.ajax({
                                type: 'GET',
                                url: '/host/' + idtakeOver,
                                success: function(data) {
                                    $("#photo2").attr("src", '/storage/' + (curHost.hostPhoto == undefined ? "804541.png" :
                                        curHost.hostPhoto));
                                    $("#name2").html(curHost.hostName);
                                    $("#nik2").html(curHost.hostId);
                                    $("#vendor2").html(curHost.hostDept);
                                    $("#today2").html((new Date()).toLocaleString('en-US'))
                                        .css({
                                            'opacity': '100%'
                                        });

                                    $("#statusA1").html("Check-In");

                                    setTimeout(() => {
                                        resetFront();
                                    }, 3000);
                                }
                            });
                        } else {
                            $("#photo2").attr("src", '/storage/' + (curHost.hostPhoto == undefined ?
                                "804541.png" : curHost.hostPhoto));
                            $("#name2").html(curHost.hostName);
                            $("#nik2").html(curHost.hostId);
                            $("#vendor2").html(curHost.hostDept);
                            $("#today2").html((new Date()).toLocaleString('en-US')).css({
                                'opacity': '100%'
                            });

                            $("#statusA1").html("Check-In");
                            $("#imgA1").attr('src','assets/img/checked_old.png');
                            $("#imgB1").addClass('d-none');
                            $(".next").click();
                            setTimeout(() => {
                                resetFront();
                            }, 3000);
                        }
                    });
                    console.log(data);
                }
            });
        }

        function resetFront() {
            $(".prev").click();
            $(".prev").click();
            $("#statusA1").html($("#statusA1Copy").html());
            $("#photo1").attr('src', 'assets/img/scan.png');
            $("#imgA1").attr('src','assets/img/group-therapy-illustration_74855-5516.jpg');
            
            $("#imgB1").removeClass('d-none');
            $("#photo2").attr('src', 'assets/img/scan.png');
            $("#name1").html("Name");
            $("#name2").html("Name");
            $("#vendor1").html("Company");
            $("#vendor2").html("Dept");
            $("#nik1").html("NIK");
            $("#nik2").html("EE");
            $("#today1").html('');
            $("#today2").html('');
            $("#badge1").html('');
            $("#qrCode").val('');
            $("#qrCode").focus();
            curId='';
            curHost='';
            idTransaksi='';
            idtakeOver='';
        }
    </script>

</body>

</html>
