<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Check Out</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/vendor/css/bootstrap-select.min.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">-->
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

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
                    <h2 class="mb-0 main-title">VISITOR MANAGEMENT SYSTEM</h2>
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
                            <img id="photo2" src="assets/img/scan.png" alt="" class="scan-img">
                            <div class="p-3">
                                <h4 id="name2" class="visitor-content">NAME</h4>
                                <h4 id="nik2" class="visitor-content">NIK</h4>
                                <h4 id="company2" class="visitor-content">COMPANY</h4>

                                <h2 class="visitor-checkin-time">Check out time: <span id="time2"
                                        class="green-text-2"></span> <span id="today"
                                        style="opacity: 0"class="green-text-2"></span></h2>
                            </div>

                            <div class="badge-id">
                                <p>
                                    <small>Badge no:</small>
                                </p>
                                <img src="assets/img/id-card.png" alt=""> <span id="badgeno2"
                                    class="badge-number">0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="card card-checkin">
                        <div class="card-header text-center font-weight-bold">
                            STATUS
                        </div>
                        <div class="card-body">
                            <h5 id="statusA1Copy" class="card-title d-none">Waiting . . . <br> Visitor please tap the
                                badge</h5>
                            <h5 id="statusA1" class="card-title">Waiting . . . <br> Visitor please tap the badge</h5>
                            <div class="d-flex px-4 mt-4">
                                <img id="imgA1" src="assets/img/group-therapy-illustration_74855-5516.jpg"
                                    alt="" class="mx-auto img-status">
                                <img id="imgB1"src="assets/img/TapIn.png" alt="" class="mx-auto img-status">
                            </div>
                        </div>
                    </div>
                    <input type="text" id="txtBox1" style="opacity: 1" onchange="getCheckout2(this)" autofocus />
                </div>

                <!-- Row 2 -->

                <div id="cardhost" style="opacity: 1" class="col-12 col-lg-7">
                    <div class="card card-checkin">
                        <div class="card-header text-center font-weight-bold">
                            HOST
                        </div>
                        <div class="card-body position-relative d-flex">
                            <img id="photo" src="assets/img/scan.png" alt="" class="scan-img">
                            <div class="p-3">
                                <h4 id="namaHost" class="visitor-content">NAME</h4>
                                <h4 id="empID" class="visitor-content">EE</h4>
                                <h4 id="depart" class="visitor-content">DEPT</h4>

                                <h2 class="visitor-checkin-time">Confirmation time: <span id="timeHost"
                                        class="green-text-2"><!--16:21:00--></span> </h2>
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
                                    Visitor has been checked out!
                                </div>
                            </div>

                            <div class="arrow-steps clearfix">
                                <div class="step current" id="step-1" data-step="1"> <span> Step 1</span> </div>
                                <div class="step" id="step-2" data-step="2"> <span>Step 2</span> </div>
                                <div class="step" id="step-3" data-step="3"> <span> Step 3</span> </div>
                            </div>

                            <div class="bottom-bubble mt-4">
                                <div class="speech-bubble-bottom mx-auto" id="bubble-2">
                                    Host need to tap their badge for confirm the visitor
                                </div>
                            </div>

              <div class="nav clearfix d-none">
                <p>demo: </p> <br>
                <a href="javascipt:void(0)" class="prev me-2">Previous</a>
                <a href="javascipt:void(0)" class="next pull-right">Next</a>
              </div>

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

    <script src="assets/vendor/js/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>-->

    <!-- Latest compiled and minified JavaScript
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
  -->
    <script src="assets/vendor/js/bootstrap-select.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        setInterval(function() {
            var momentNow = moment();
            $('#clock').html(momentNow.format('DD MMMM YYYY | hh:mm:ss'));
        }, 100);
        var step = 1;
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
                        step = (step + 1);
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
        let isResidence = "";
        let rfid = "";
        let hostRfid = "";
        let TIMEOUT = null;
        let host = null;

        function getCheckout2(input) {
            document.getElementById("statusA1").innerHTML = "Scanning...";
            if (rfid == "") {
                rfid = input.value;
                $.ajax({
                    url: "/ekiosk/scan/check-out",
                    method: "GET",
                    data: {
                        rfid: rfid
                    },
                    success: function(data) {
                        if (data == undefined || data == "" || data == null) {
                            Swal.fire({
                                title: "Checkout Error",
                                text: "Invalid Scan",
                                icon: "error",
                                timer: 3000
                            });
                            return;
                        }
                        let usr = data.data;
                        console.log(usr);
                        $("#name2").html(usr.namaVisitor);
                        $("#nik2").html(usr.nik);
                        $("#company2").html(usr.nameVendor);
                        $("#photo2").attr("src", (usr.photo == undefined || usr.photo == "" ?
                            "assets/img/scan.png" : ("/storage/" + usr.photo)));
                        $("#time2").html((new Date()).toLocaleString('en-US')).css({
                            'opacity': '100%'
                        });
                        $(".next").click();
                        $("#badgeno2").html(usr.noBadge);
                        host = {
                            host: usr.host,
                            empId: usr.empId,
                            depart: usr.depart,
                            hostPhoto: usr.hostPhoto,
                            rfid: usr.hst
                        };
                        document.getElementById("statusA1").innerHTML =
                            "Visitor badge has read. \<br\> Host please confirm within 10 seconds";
                        document.getElementById("imgA1").src = "assets/img/step2A.png";

                        isResidence = (usr.purpose == "WORKING" && usr.typeVisitor == "Residence") || usr
                            .purpose == "SUPPLY";
                        console.log(isResidence);
                        if (isResidence) {
                            Swal.fire({
                                title: "Checkout Success",
                                text: "",
                                icon: "success",
                                timer: 2500
                            }).then(x => {
                                location.reload()
                            });
                        }
                        TIMEOUT = setTimeout(function() {
                            Swal.fire({
                                title: "Checkout Fail",
                                text: "Time out waiting for host scanning",
                                icon: "error",
                                timer: 3000
                            }).then(x => {
                                location.reload()
                            });
                        }, 10000);
                        input.value = "";
                    },
                    error: function(err) {
                        $("#statusA1").html("Has been Checkout or data Not Found!");
                    }
                })
            } else if (!isResidence && rfid != "") {
                clearTimeout(TIMEOUT);
                hostRfid = input.value;
                $.ajax({
                    url: "/ekiosk/scan/check-out",
                    method: "POST",
                    beforeSend: function(request) {
                        request.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
                    },
                    data: {
                        rfid: rfid,
                        host: hostRfid
                    },
                    success: function(data) {
                        /*document.getElementById("statusA1").innerHTML = "Checkout Success";
                        document.getElementById("bubble-2").classList.remove('green-text');
                        document.getElementById("step-2").classList.remove('current');
                        document.getElementById("bubble-3").classList.add('green-text');
                        document.getElementById("step-3").classList.add('current');*/
                        rfid = "";
                        hostRfid = "";
                        $("#timeHost").html((new Date()).toLocaleString('en-US')).css({
                            'opacity': '100%'
                        });
                        $("#statusA1").html("");
                        $("#imgA1").attr("src","assets/img/checkedout.png");
                        $("#imgB1").addClass("d-none");
                        $(".next").click();
                        updateHost(host);
                        setTimeout(function() {
                            Swal.fire({
                                title: "Checkout Success",
                                text: "",
                                icon: "success",
                                timer: 5000
                            }).then(x => {
                                location.reload()
                            });
                        }, 5000);
                    },
                    error: function(err) {
                        Swal.fire({
                            title: "Scan Error",
                            text: "No data found",
                            icon: "error",
                            timer: 2000
                        })
                    }
                })
            }
        }

        function updateHost(usr) {

            $("#namaHost").html(usr.host);
            $("#empID").html(usr.empId);
            $("#depart").html(usr.depart);
            $("#photo").attr("src", usr.hostPhoto == undefined || usr.hostPhoto == "" ? "assets/img/scan.png" : (
                "/storage/" + usr.hostPhoto));
        }
    </script>

</body>

</html>
