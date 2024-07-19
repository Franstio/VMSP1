<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
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

  @vite(['resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    
    html, body {
      margin: 0;
      height: 100%;
      background-image: linear-gradient(#3197fd, #76c8fa);
    }
    
    #main{
      margin-left: 0;
      margin-top: 0;
      /* background-image: linear-gradient(#3e97ef, #3eaef6); */
      /* background-image: linear-gradient(#3197fd, #76c8fa); */
    }

    #main .dashboard{
      margin-top: 80px;
    }
  </style>
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
      <div class="container d-flex flex-column bg-white rounded elevation-3 p-3 gap-2">
        <h3 class="text-secondary text-center "><strong>Selamat datang di <br/> Visitor Management System <br/>PT. Panasonic Industrial Devices Batam </strong></h3>
        <p class="text-center ">Silahkan mengisi Formulir registrasi berikut untuk meregistrasi karyawan anda.</p>
        <form id="frm1">
            <div class="d-flex flex-column gap-2">
                <div class="form-group row">
                    <label for="nPerusahaan" class="col-sm-3 col-form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <select  required class="form-select" id="nPerusahaan" name="nameVendor" >
                        <option value="">Please Select</option>
                        <option value="PANASONIC CORPORATION">PANASONIC CORPORATION</option>
                        <option value="PT AWAL BROS CITRA BATAM">PT AWAL BROS CITRA BATAM</option>
                        <option value="CV. ABDI JASA INDUSTRI">CV. ABDI JASA INDUSTRI</option>
                        <option value="PT. ACEPLAS INDONESIA">PT. ACEPLAS INDONESIA</option>
                        <option value="A-EUROPE CERTIFICATION PTE LTD">A-EUROPE CERTIFICATION PTE LTD</option>
                        <option value="PT AFH DWI MITRA">PT AFH DWI MITRA</option>
                        <option value="PT AGUNG AUTOMALL">PT AGUNG AUTOMALL</option>
                        <option value="PT. AIK MOH CHEMICALS INDONESIA">PT. AIK MOH CHEMICALS INDONESIA</option>
                        <option value="AIR LIQUIDE SINGAPORE PRIVATE LIMITED">AIR LIQUIDE SINGAPORE PRIVATE LIMITED</option>
                        <option value="PANASONIC ASIA PACIFIC PTE LTD">PANASONIC ASIA PACIFIC PTE LTD</option>
                        <option value="CV. ANINDYATRANS">CV. ANINDYATRANS</option>
                        <option value="PT ALFA PERTAMA SUKSESINDO  ">PT ALFA PERTAMA SUKSESINDO </option>
                        <option value="PT ANSHUN JOYFUL TOUR AND TRAVEL">PT ANSHUN JOYFUL TOUR AND TRAVEL</option>
                        <option value="PT. APASES">PT. APASES</option>
                        <option value="PT APTA MANDIRI JAYA">PT APTA MANDIRI JAYA</option>
                        <option value="CV ARTHA TELNIC MANDIRI">CV ARTHA TELNIC MANDIRI</option>
                        <option value="PT ASMAYA BUANA NUSANTARA">PT ASMAYA BUANA NUSANTARA</option>
                        <option value="PT. ASTRA GRAPHIA TBK">PT. ASTRA GRAPHIA TBK</option>
                        <option value="PT ATINDO MITRA SURYA">PT ATINDO MITRA SURYA</option>
                        <option value="PT AUTHENTIK MANDIRI BATAM">PT AUTHENTIK MANDIRI BATAM</option>
                        <option value="PT AVECODE INTERNATIONAL">PT AVECODE INTERNATIONAL</option>
                        <option value="PT AYIN ABADI">PT AYIN ABADI</option>
                        <option value="PT BATAM KARYA HUSADA">PT BATAM KARYA HUSADA</option>
                        <option value="PT BATAM MASTER INDONESIA">PT BATAM MASTER INDONESIA</option>
                        <option value="PT BATIK KERIS">PT BATIK KERIS</option>
                        <option value="PT BALLYSON LESTARI SUKSES">PT BALLYSON LESTARI SUKSES</option>
                        <option value="PT BATAM NARITA INDAH">PT BATAM NARITA INDAH</option>
                        <option value="PT BANIAN INDO GLOBAL">PT BANIAN INDO GLOBAL</option>
                        <option value="PT BATAM RODA JAYA">PT BATAM RODA JAYA</option>
                        <option value="CV BATAMURA REKSA PERSADA">CV BATAMURA REKSA PERSADA</option>
                        <option value="PT BATAM TEKNOLOGI GAS">PT BATAM TEKNOLOGI GAS</option>
                        <option value="PT BATAM WAHANA ARTA">PT BATAM WAHANA ARTA</option>
                        <option value="CV BERKAH BERSAMA ">CV BERKAH BERSAMA </option>
                        <option value="PT. BENWIN INDONESIA">PT. BENWIN INDONESIA</option>
                        <option value="PT BERCA MANDIRI PERKASA">PT BERCA MANDIRI PERKASA</option>
                        <option value="PT BERCA HARDAYAPERKASA">PT BERCA HARDAYAPERKASA</option>
                        <option value="PT BERLIAN SURYA GEMILANG">PT BERLIAN SURYA GEMILANG</option>
                        <option value="PT BATAMFAST INDONESIA">PT BATAMFAST INDONESIA</option>
                        <option value="PT BRAVO ENGINEERING BATAM">PT BRAVO ENGINEERING BATAM</option>
                        <option value="PT BSI GROUP INDONESIA">PT BSI GROUP INDONESIA</option>
                        <option value="BSI GROUP SINGAPORE PTE LTD">BSI GROUP SINGAPORE PTE LTD</option>
                        <option value="PT. BATAM KARYA MANDIRI">PT. BATAM KARYA MANDIRI</option>
                        <option value="PT CALTEST ENGINEERS">PT CALTEST ENGINEERS</option>
                        <option value="PT CALTESYS INDONESIA">PT CALTESYS INDONESIA</option>
                        <option value="PT CAHAYA NANGA GALANG MUSTIKA">PT CAHAYA NANGA GALANG MUSTIKA</option>
                        <option value="PT CAMATHA SAHIDYA">PT CAMATHA SAHIDYA</option>
                        <option value="PT. CENTRAL GLOBAL">PT. CENTRAL GLOBAL</option>
                        <option value="CHRYSALLITE EDUCATION AND TRAINING HUB">CHRYSALLITE EDUCATION AND TRAINING HUB</option>
                        <option value="PT CINOVASI REKAPRIMA">PT CINOVASI REKAPRIMA</option>
                        <option value="PT CIPTA SATRIA INFORMATIKA">PT CIPTA SATRIA INFORMATIKA</option>
                        <option value="CREDIBLE COLLEGE">CREDIBLE COLLEGE</option>
                        <option value="PT. DESA AIR CARGO BATAM">PT. DESA AIR CARGO BATAM</option>
                        <option value="CV DIFA DIGITAL ">CV DIFA DIGITAL </option>
                        <option value="DNV GL BUSINESS ASSURANCE SINGAPORE PTE LTD">DNV GL BUSINESS ASSURANCE SINGAPORE PTE LTD</option>
                        <option value="DNV GL BUSINESS ASSURANCE JAPAN KK">DNV GL BUSINESS ASSURANCE JAPAN KK</option>
                        <option value="PT DOUYEE ENTERPRISES">PT DOUYEE ENTERPRISES</option>
                        <option value="PT. DHARMA PACIFIC ENGINEERING">PT. DHARMA PACIFIC ENGINEERING</option>
                        <option value="PT DITEK JAYA">PT DITEK JAYA</option>
                        <option value="PT DUTA DIMENSI">PT DUTA DIMENSI</option>
                        <option value="PT DUNAMIS INTERMASTER">PT DUNAMIS INTERMASTER</option>
                        <option value="PT. DUTA COMPUTER">PT. DUTA COMPUTER</option>
                        <option value="DYNASTY TRAVEL INTERNATIONAL PTE LTD">DYNASTY TRAVEL INTERNATIONAL PTE LTD</option>
                        <option value="PT EASTERN ASIA ENGINEERING">PT EASTERN ASIA ENGINEERING</option>
                        <option value="PT. EKASURYA MANDIRI">PT. EKASURYA MANDIRI</option>
                        <option value="PT ELECO TEKNOLOGI BATAM">PT ELECO TEKNOLOGI BATAM</option>
                        <option value="PT. ESCOTAMA HANDAL">PT. ESCOTAMA HANDAL</option>
                        <option value="PT EXAUDI BINA KARYA">PT EXAUDI BINA KARYA</option>
                        <option value="PT EXAUDI MITRA KARYA">PT EXAUDI MITRA KARYA</option>
                        <option value="PT. EXCELLENCE UTAMA ENGINEERING">PT. EXCELLENCE UTAMA ENGINEERING</option>
                        <option value="PT. FANINDO CHIPTRONIC">PT. FANINDO CHIPTRONIC</option>
                        <option value="FUJITSU ASIA PTE LTD">FUJITSU ASIA PTE LTD</option>
                        <option value="CV GABRIL MITRA PERKASA">CV GABRIL MITRA PERKASA</option>
                        <option value="CV GLOBAL SAFETY">CV GLOBAL SAFETY</option>
                        <option value="PT GML PERFORMANCE CONSULTING">PT GML PERFORMANCE CONSULTING</option>
                        <option value="PT GOLDEN BATAM RAYA">PT GOLDEN BATAM RAYA</option>
                        <option value="PT GRAHA RESIK">PT GRAHA RESIK</option>
                        <option value="PT HANDOBO ANUGERAH FAMILI (HAF)">PT HANDOBO ANUGERAH FAMILI (HAF)</option>
                        <option value="PT HAN-INDO MILLENNIUM">PT HAN-INDO MILLENNIUM</option>
                        <option value="PT. HAKKO PRODUCTSTAMA INDONESIA">PT. HAKKO PRODUCTSTAMA INDONESIA</option>
                        <option value="PT HALCOM INTEGRATED SOLUTION">PT HALCOM INTEGRATED SOLUTION</option>
                        <option value="PT. HARADA INDONESIA">PT. HARADA INDONESIA</option>
                        <option value="PT HIJRAH PRIMA UTAMA">PT HIJRAH PRIMA UTAMA</option>
                        <option value="PT. HOK SENG JAYAPERKASA">PT. HOK SENG JAYAPERKASA</option>
                        <option value="PT HOTEL PRIMA MITRA BARELANG">PT HOTEL PRIMA MITRA BARELANG</option>
                        <option value="PT HUNNINDO UNIVERSAL INDONESIA">PT HUNNINDO UNIVERSAL INDONESIA</option>
                        <option value="PT IKEUCHI INDONESIA">PT IKEUCHI INDONESIA</option>
                        <option value="PT INTI KENCANA PRIMA ">PT INTI KENCANA PRIMA </option>
                        <option value="PT INFINITI NUANSA INTERNASIONAL">PT INFINITI NUANSA INTERNASIONAL</option>
                        <option value="PT INDO SAHARI INDAH">PT INDO SAHARI INDAH</option>
                        <option value="CV INTERSYS CIPTA MANDIRI">CV INTERSYS CIPTA MANDIRI</option>
                        <option value="PT INTEC INSTRUMENTS">PT INTEC INSTRUMENTS</option>
                        <option value="ITSUWA (SINGAPORE) PTE LTD">ITSUWA (SINGAPORE) PTE LTD</option>
                        <option value="PT IVORY FORTUNER MAS">PT IVORY FORTUNER MAS</option>
                        <option value="CV JAYA MANDIRI BARU">CV JAYA MANDIRI BARU</option>
                        <option value="PT JAMEWIN TRADING">PT JAMEWIN TRADING</option>
                        <option value="PT JOBSTREET INDONESIA">PT JOBSTREET INDONESIA</option>
                        <option value="PT JUSTIKA SIAR PUBLIKA">PT JUSTIKA SIAR PUBLIKA</option>
                        <option value="PT KALTIMEX ENERGY ">PT KALTIMEX ENERGY </option>
                        <option value="KALTIMEX ENERGY (SINGAPORE) PTE LTD ">KALTIMEX ENERGY (SINGAPORE) PTE LTD </option>
                        <option value="PT. KARYA AGUNG KENCANA">PT. KARYA AGUNG KENCANA</option>
                        <option value="CV.KAWITA EDUCATION &amp; TRAINNING CENTER">CV.KAWITA EDUCATION &amp; TRAINNING CENTER</option>
                        <option value="PT KAWAN LAMA SEJAHTERA">PT KAWAN LAMA SEJAHTERA</option>
                        <option value="PT KAYU KREASI SEJAHTERA">PT KAYU KREASI SEJAHTERA</option>
                        <option value="PT KIAT GLOBAL BATAM SUKSES">PT KIAT GLOBAL BATAM SUKSES</option>
                        <option value="PT KINDEN INDONESIA">PT KINDEN INDONESIA</option>
                        <option value="PT KREASI CIPTA ASIA">PT KREASI CIPTA ASIA</option>
                        <option value="PT KRISTAL JAYA RAYA">PT KRISTAL JAYA RAYA</option>
                        <option value="CV. KT INTERNATIONAL">CV. KT INTERNATIONAL</option>
                        <option value="PT KURNIA SAFETY SUPPLIES">PT KURNIA SAFETY SUPPLIES</option>
                        <option value="CV LANGGENG KINANTHI UTAMA">CV LANGGENG KINANTHI UTAMA</option>
                        <option value="PT LAMBERT PERFORMA INDONESIA">PT LAMBERT PERFORMA INDONESIA</option>
                        <option value="PT LANCANG KUNING SUKSES">PT LANCANG KUNING SUKSES</option>
                        <option value="CV. LEADING SUKSES ABADI">CV. LEADING SUKSES ABADI</option>
                        <option value="PT MAXIS GLOBAL INDONESIA">PT MAXIS GLOBAL INDONESIA</option>
                        <option value="PT OSHINDO MEDIKA PRATAMA">PT OSHINDO MEDIKA PRATAMA</option>
                        <option value="PT. MITUTOYO INDONESIA">PT. MITUTOYO INDONESIA</option>
                        <option value="PT MITRA BATAMINDO UTAMA">PT MITRA BATAMINDO UTAMA</option>
                        <option value="KONICA MINOLTA BUSINESS SOLUTIONS ASIA PTE LTD">KONICA MINOLTA BUSINESS SOLUTIONS ASIA PTE LTD</option>
                        <option value="CV. MITRA DINAMIS">CV. MITRA DINAMIS</option>
                        <option value="PT.MITSUBISHI JAYA ELEVATOR AND ESCALATOR">PT.MITSUBISHI JAYA ELEVATOR AND ESCALATOR</option>
                        <option value="PT MOYA INDONESIA">PT MOYA INDONESIA</option>
                        <option value="CV MULTI KREASINDO MANDIRI">CV MULTI KREASINDO MANDIRI</option>
                        <option value="PT. MULIA MAKMUR LESTARI">PT. MULIA MAKMUR LESTARI</option>
                        <option value="PT. MULTI TECHNINDO">PT. MULTI TECHNINDO</option>
                        <option value="PT NAKITA BERSAMA ">PT NAKITA BERSAMA </option>
                        <option value="PT NDT INSTRUMENTS INDONESIA ">PT NDT INSTRUMENTS INDONESIA </option>
                        <option value="CV NOBEL OF VICTORY">CV NOBEL OF VICTORY</option>
                        <option value="PT NQA INDONESIA ">PT NQA INDONESIA </option>
                        <option value="PT PANASONIC GOBEL INDONESIA">PT PANASONIC GOBEL INDONESIA</option>
                        <option value="PT PANASONIC MANUFACTURING INDONESIA">PT PANASONIC MANUFACTURING INDONESIA</option>
                        <option value="PANASONIC INDUSTRIAL DEVICES AUTOMATION CONTROLS SALES ASIA PACIFIC">PANASONIC INDUSTRIAL DEVICES AUTOMATION CONTROLS SALES ASIA PACIFIC</option>
                        <option value="PERKUMPULAN BUDI KEMULIAAN ">PERKUMPULAN BUDI KEMULIAAN </option>
                        <option value="PT. DANKA HURECO">PT. DANKA HURECO</option>
                        <option value="PANASONIC INDUSTRIAL DEVICES SINGAPORE">PANASONIC INDUSTRIAL DEVICES SINGAPORE</option>
                        <option value="PEGASUS TRAVEL MANAGEMENT PTE LTD">PEGASUS TRAVEL MANAGEMENT PTE LTD</option>
                        <option value="PT PERDANA RAHARJA ABADI">PT PERDANA RAHARJA ABADI</option>
                        <option value="PT PIONEER">PT PIONEER</option>
                        <option value="PANASONIC MANUFACTURING AYUTHAYA CO LTD ">PANASONIC MANUFACTURING AYUTHAYA CO LTD </option>
                        <option value="PT.PRAWIRA UTAMA BAKTI">PT.PRAWIRA UTAMA BAKTI</option>
                        <option value="PT PRAKARSA ENVIRO INDONESIA">PT PRAKARSA ENVIRO INDONESIA</option>
                        <option value="PT PRISMACO MITRA SEJAHTERA ">PT PRISMACO MITRA SEJAHTERA </option>
                        <option value="PT PRIMA KARYA NUSA">PT PRIMA KARYA NUSA</option>
                        <option value="PT. PRIMA KREASI SEJATI">PT. PRIMA KREASI SEJATI</option>
                        <option value="PT. PROCHEM TRITAMA">PT. PROCHEM TRITAMA</option>
                        <option value="PT. PRO-PACK INDUSTRIES">PT. PRO-PACK INDUSTRIES</option>
                        <option value="PT. PRATAMA ENGINEERING SUPPLIES">PT. PRATAMA ENGINEERING SUPPLIES</option>
                        <option value="PT PUTRA TIDAR PERKASA">PT PUTRA TIDAR PERKASA</option>
                        <option value="PT. MAKRO JAYA">PT. MAKRO JAYA</option>
                        <option value="PT PUTRA BATAM JASA MANDIRI UTAMA">PT PUTRA BATAM JASA MANDIRI UTAMA</option>
                        <option value="PT QINTHAR INSPEKSINDO ">PT QINTHAR INSPEKSINDO </option>
                        <option value="PT QUEEN BERSAMA TUJUH">PT QUEEN BERSAMA TUJUH</option>
                        <option value="PT ADHYA GRAHA WISATA (RADISSON GOLF &amp; CONVENTION CENTRE BATAM)">PT ADHYA GRAHA WISATA (RADISSON GOLF &amp; CONVENTION CENTRE BATAM)</option>
                        <option value="PT RAFLESIA INTERNATIONAL">PT RAFLESIA INTERNATIONAL</option>
                        <option value="PT RAFLESIA NUSANTARA">PT RAFLESIA NUSANTARA</option>
                        <option value="PT RANCANG ADHYA SELARAS">PT RANCANG ADHYA SELARAS</option>
                        <option value="PT RETZAN INDONUSA">PT RETZAN INDONUSA</option>
                        <option value="PT REXINDO OTOTEKNIK ">PT REXINDO OTOTEKNIK </option>
                        <option value="PT RIFARIZ BATAM">PT RIFARIZ BATAM</option>
                        <option value="SATO ASIA PACIFIC PTE LTD">SATO ASIA PACIFIC PTE LTD</option>
                        <option value="SAKANOSHITA CO LTD">SAKANOSHITA CO LTD</option>
                        <option value="PT.SALAM JAYA LESTARI">PT.SALAM JAYA LESTARI</option>
                        <option value="PT SARANA RUSEL VICTORY">PT SARANA RUSEL VICTORY</option>
                        <option value="PT SARANA SOLUSINDO INFORMATIKA">PT SARANA SOLUSINDO INFORMATIKA</option>
                        <option value="PT. SAT NUSAPERSADA TBK">PT. SAT NUSAPERSADA TBK</option>
                        <option value="CV. SEJATI AUTO MOBIL">CV. SEJATI AUTO MOBIL</option>
                        <option value="SHOWA DENKO MATERIAL (ASIA-PACIFIC) PTE LTD">SHOWA DENKO MATERIAL (ASIA-PACIFIC) PTE LTD</option>
                        <option value="PT. SELTECHINDO SERVIS">PT. SELTECHINDO SERVIS</option>
                        <option value="PT. SENTRAL AGUNG HIMALAYA">PT. SENTRAL AGUNG HIMALAYA</option>
                        <option value="SIDHARTA WIDJAJA &amp; REKAN">SIDHARTA WIDJAJA &amp; REKAN</option>
                        <option value="PT SINDO AUTOMATION ENGINEERING">PT SINDO AUTOMATION ENGINEERING</option>
                        <option value="PT SINAR BERKAH ASIA">PT SINAR BERKAH ASIA</option>
                        <option value="CV.SIF FURNITURE">CV.SIF FURNITURE</option>
                        <option value="PT SINGALIFT INTERNATIONAL">PT SINGALIFT INTERNATIONAL</option>
                        <option value="PT SIJORI INTERBINTANA PERS">PT SIJORI INTERBINTANA PERS</option>
                        <option value="PT. SIMBEST">PT. SIMBEST</option>
                        <option value="UD. SINAR JAYA ANGKASA">UD. SINAR JAYA ANGKASA</option>
                        <option value="CV. SMART PAD TECHNOLOGY">CV. SMART PAD TECHNOLOGY</option>
                        <option value="PT SOXAL BATAMINDO INDUSTRIAL GASES">PT SOXAL BATAMINDO INDUSTRIAL GASES</option>
                        <option value="PT. STEEL ARTINDO">PT. STEEL ARTINDO</option>
                        <option value="LEMBAGA PENDIDIKAN STEP AHEAD BATAM">LEMBAGA PENDIDIKAN STEP AHEAD BATAM</option>
                        <option value="PT ST PRECISION">PT ST PRECISION</option>
                        <option value="PT.SUPERINTENDING CO OF INDONESIA">PT.SUPERINTENDING CO OF INDONESIA</option>
                        <option value="PT SUPRA PRIMATAMA NUSANTARA">PT SUPRA PRIMATAMA NUSANTARA</option>
                        <option value="PT. SYS-MAC INDONESIA">PT. SYS-MAC INDONESIA</option>
                        <option value="PT TAISEI PULAUINTAN CONSTRUCTION INTERNATIONAL">PT TAISEI PULAUINTAN CONSTRUCTION INTERNATIONAL</option>
                        <option value="PT.TECHCO INDO">PT.TECHCO INDO</option>
                        <option value="CV.TEGAS MANDIRI">CV.TEGAS MANDIRI</option>
                        <option value="PT TERANG INTI SEJAHTERA">PT TERANG INTI SEJAHTERA</option>
                        <option value="PT TELEKOMUNIKASI INDONESIA (PERSERO) TBK">PT TELEKOMUNIKASI INDONESIA (PERSERO) TBK</option>
                        <option value="PT TERANG ABADI BATAM">PT TERANG ABADI BATAM</option>
                        <option value="PT TERRA PASIFIK PROFILINDO">PT TERRA PASIFIK PROFILINDO</option>
                        <option value="CV TECHNOAIR SUNJAYA">CV TECHNOAIR SUNJAYA</option>
                        <option value="UD TIRTA KENCANA ABADI">UD TIRTA KENCANA ABADI</option>
                        <option value="PT TNT SKYPAK INTERNATIONAL EXPRESS">PT TNT SKYPAK INTERNATIONAL EXPRESS</option>
                        <option value="PT TROPOLIS JAYA ABADI">PT TROPOLIS JAYA ABADI</option>
                        <option value="TROPOLIS LOGISTICS (S) PTE LTD">TROPOLIS LOGISTICS (S) PTE LTD</option>
                        <option value="PT.TUNAS BATAM PERKASA">PT.TUNAS BATAM PERKASA</option>
                        <option value="PT TIRTA UTAMA RIANI INDAH">PT TIRTA UTAMA RIANI INDAH</option>
                        <option value="UNION SERVICE">UNION SERVICE</option>
                        <option value="PT UPAYA RIKSA PATRA">PT UPAYA RIKSA PATRA</option>
                        <option value="PT USAHA BERSAMA CEMERLANG">PT USAHA BERSAMA CEMERLANG</option>
                        <option value="P.T. VARIA SRI CENDANA">P.T. VARIA SRI CENDANA</option>
                        <option value="PT VORTEX ENERGY BATAM">PT VORTEX ENERGY BATAM</option>
                        <option value="WISSEN TECHNOLOGY PTE LTD">WISSEN TECHNOLOGY PTE LTD</option>
                        <option value="PT YESBOSS GROUP INDONESIA">PT YESBOSS GROUP INDONESIA</option>
                        <option value="PT.YUPITER BARU JAYA">PT.YUPITER BARU JAYA</option>
                        <option value="CV. ANINDYATRANS ">CV. ANINDYATRANS </option>
                        <option value="PT BSI GROUP INDONESIA">PT BSI GROUP INDONESIA</option>
                        <option value="PT CALTESYS INDONESIA">PT CALTESYS INDONESIA</option>
                        <option value="PT CINOVASI REKAPRIMA">PT CINOVASI REKAPRIMA</option>
                        <option value="PT CIPTA SATRIA INFORMATIKA">PT CIPTA SATRIA INFORMATIKA</option>
                        <option value="PT DITEK JAYA">PT DITEK JAYA</option>
                        <option value="PT DUNAMIS INTERMASTER">PT DUNAMIS INTERMASTER</option>
                        <option value="PT IKEUCHI INDONESIA">PT IKEUCHI INDONESIA</option>
                        <option value="CV INTERSYS CIPTA MANDIRI">CV INTERSYS CIPTA MANDIRI</option>
                        <option value="PT INTEC INSTRUMENTS">PT INTEC INSTRUMENTS</option>
                        <option value="PT JUSTIKA SIAR PUBLIKA">PT JUSTIKA SIAR PUBLIKA</option>
                        <option value="PT KALTIMEX ENERGY ">PT KALTIMEX ENERGY </option>
                        <option value="PT KREASI CIPTA ASIA">PT KREASI CIPTA ASIA</option>
                        <option value="PT LAMBERT PERFORMA INDONESIA">PT LAMBERT PERFORMA INDONESIA</option>
                        <option value="PT.MITSUBISHI JAYA ELEVATOR AND ESCALATOR">PT.MITSUBISHI JAYA ELEVATOR AND ESCALATOR</option>
                        <option value="PT NQA INDONESIA ">PT NQA INDONESIA </option>
                        <option value="PT PANASONIC MANUFACTURING INDONESIA">PT PANASONIC MANUFACTURING INDONESIA</option>
                        <option value="PT PIONEER">PT PIONEER</option>
                        <option value="PT QINTHAR INSPEKSINDO ">PT QINTHAR INSPEKSINDO </option>
                        <option value="PT REXINDO OTOTEKNIK ">PT REXINDO OTOTEKNIK </option>
                        <option value="PT SARANA SOLUSINDO INFORMATIKA">PT SARANA SOLUSINDO INFORMATIKA</option>
                        <option value="PT UPAYA RIKSA PATRA">PT UPAYA RIKSA PATRA</option>
                        <option value="DAINAN TECH">DAINAN TECH</option>
                        <option value="PT SUCOFINDO">PT SUCOFINDO</option>
                        <option value="RSBP BATAM">RSBP BATAM</option>
                        <option value="OTHER">OTHER</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="aPerusahaan" class="col-sm-3 col-form-label">Asal Perusahaan <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select required class="form-select" id="aPerusahaan" name="asalVendor">
                            <option  value="">Please Select</option>
                            <option value="Batam">Batam</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Singapore">Singapore</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <input required type="email" class="form-control" id="staticEmail" name="email" placeholder="email@example.com">
                    </div>
                </div>
                <h3 class="mt-3"><strong>Daftar Anggota Kerja</strong></h3>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input required type="text" id="nama" name="namaVisitor" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-3 col-form-label">Gender <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select  required id="gender" name="gender" class="form-select">
                            <option value="">Please Select</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="col-sm-3 col-form-label">NIK <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" required class="form-control" id="nik" name="nik" placeholder="ISI NO KTP..."/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control" id="jabatan" name="jabatan"/>
                    </div>
                </div>
                <h4 class="mt-3"><strong>Saya menyetujui pemberian data pribadi terkait untuk pendaftaran data pada Visitor Management System dan Deteksi Wajah</strong><hr/></h4>
                <p>Demi kesehatan dan keselamatan bersama di tempat kerja, Anda harus JUJUR dalam
                    menjawab pertanyaan-pertanyaan di bawah ini. Dalam 14 hari terakhir, apakah Anda
                    pernah mengalami hal hal berikut:</p>
                <ol>
                    <li>
                        <div class="form-group row">
                            <label for="jabatan"  class="col-sm-5 text-wrap col-form-label">Apakah pernah keluar rumah/tempat umum(pasar,fasyankes,kerumunan orang, dan lain-lain)? <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input required class="form-check-input" value="YA" type="radio" name="q1" id="q11">
                                    <label class="form-check-label" for="q11">
                                      Ya
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input required class="form-check-input" value="TIDAK" type="radio" name="q1" id="q12" checked>
                                    <label class="form-check-label" for="q12">
                                      Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-5 text-wrap col-form-label">Apakah pernah menggunakan transportasi umum? <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input required class="form-check-input" value="YA" type="radio" name="q2" id="q21">
                                    <label class="form-check-label" for="q21">
                                      Ya
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input required class="form-check-input" value="TIDAK" type="radio" name="q2" id="q22" checked>
                                    <label class="form-check-label" for="q22">
                                      Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-5 text-wrap col-form-label">Apakah pernah melakukan perjalanan keluar kota/internasional dalam 14 hari terakhir? (wilayah yang terjangkit/zona merah)<span class="text-danger">*</span> Wajib melampirkan copy hasil RapidTes/RT-PCR <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input required class="form-check-input" value="YA" type="radio" name="q3" id="q31">
                                    <label class="form-check-label" for="q31">
                                      Ya
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input required class="form-check-input" value="TIDAK" type="radio" name="q3" id="q32" checked>
                                    <label class="form-check-label" for="q32">
                                      Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-5 text-wrap col-form-label">Apakah anda mengikuti kegiatan yang melibatkan orang banyak? <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input required class="form-check-input" value="YA" type="radio" name="q4" id="q41">
                                    <label class="form-check-label" for="q41">
                                      Ya
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input required class="form-check-input" value="TIDAK" type="radio" name="q4" id="q42" checked>
                                    <label class="form-check-label" for="q42">
                                      Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-5 text-wrap col-form-label">
                                Apakah memiliki Riwayat kontak erat dengan orang yang dinyatakan suspek,probable atau terkonfirmasi COVID-19 (berjabat tangan,berbicara, berada dalam satu ruangan/satu rumah)
                                 <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input required class="form-check-input" value="YA" type="radio" name="q5" id="q51">
                                    <label class="form-check-label" for="q51">
                                      Ya
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input required class="form-check-input" value="TIDAK" type="radio" name="q5" id="q52" checked>
                                    <label class="form-check-label" for="q52">
                                      Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-5 text-wrap col-form-label">
                                Apakah pernah mengalami demam/batuk/pilek/sakit tenggorokan/sesak dalam 14 hari terakhir?
                                 <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input required class="form-check-input" value="YA" type="radio" name="q6" id="q61">
                                    <label class="form-check-label" for="q61">
                                      Ya
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input required class="form-check-input" value="TIDAK" type="radio" name="q6" id="q62" checked>
                                    <label class="form-check-label" for="q62">
                                      Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="list-style:none">
                      <div class="form-group row">
                        <label class="col-sm-5 text-wrap col-form-label">
                            Take Photo
                             <span class="text-danger">*</span></label>
                          <div class="col-sm-7">
                            <div class="d-flex flex-column gap-2 flex-grow-0 align-items-center justify-content-center border border-2 p-2 ">
                                <div class="d-flex flex-column gap-2">
                                  <div id="photoFrame"></div>
                                  <p class="text-center" id="lbl1"></p>
                                </div>
                                <input type="hidden" name="photo"  id="image-tag"/>
                                <button class="btn btn-secondary " id="capturePhoto"  type="button">Capture</button>
                            </div>
                          </div>
                      </div>
                    </li>
                    <li style="list-style: none">

                        <div class="form-group mt-2 row">
                            <label for="sig" class="col-sm-5 text-wrap col-form-label">
                                Signature
                                 <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <div class="d-flex flex-wrap align-items-center  ">
                                  <div class="border border-3">
                                    <canvas id="sig"   ></canvas>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ol>
                <div class="d-flex w-100 justify-content-center align-items-center">
                  <button class="btn btn-primary " type="button"  id="confirmBtn">Confirm</button>
                </div>
            </div>
        </form>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script><link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link type="text/css" href="css/jquery.signature.css" rel="stylesheet"> 
<script type="text/javascript" src="js/jquery.signature.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>

  <script src="assets/vendor/js/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js" integrity="sha512-he8U4ic6kf3kustvJfiERUpojM8barHoz0WYpAUDWQVn61efpm3aVAD8RWL8OloaDDzMZ1gZiubF9OSdYBqHfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

  <!--<script src="assets/vendor/js/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>-->
  <!--<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>-->
  <!-- Latest compiled and minified JavaScript -->
  <script src="assets/vendor/js/bootstrap-select.min.js"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>-->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="module">
    
    $(document).ready(function(){
      $("#frm1").validate({
          invalidHandler: function(event, validator) {
              var errors = validator.numberOfInvalids(); 
              console.log(errors);
              console.log(validator.errorList);
              if (errors)
              {
                validator.errorList[0].element.focus();
              }
          }
      });
      Webcam.set({
        width: 350,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90
      });
      Webcam.attach("#photoFrame");
     
      $('#capturePhoto').on('click',function(){
        Webcam.snap( function(data_uri) {
            $("#image-tag").val(data_uri);
            $("#photoFrame").html("<img src='"+data_uri+"'/>");
            $("#lbl1").html("Photo Taken");
        } );
      });
    });
    const cv  = document.getElementById("sig");
    const sign = new SignaturePad(cv);
    function getFormData(form){
      var unindexed_array = form.serializeArray();
      var indexed_array = {};

      $.map(unindexed_array, function(n, i)
      {
          indexed_array[n['name']] = n['value'];
      });

      return indexed_array;
    }
    $("#confirmBtn").on('click',function(e){
        if ($("#frm1").valid())
        {
          if ($("#image-tag").val() == null || $("#image-tag").val()=='')
          {
            Swal.fire({
              title: "Register Incomplete",
              text:"Photo haven't taken yet",
              icon:"info"
            }).then(x=>$("#photoFrame").focus());
            return;
          }
          let frm= getFormData($("#frm1"));
          frm.sign = sign.toDataURL();
          $.ajax({
            method: "POST",
            url: "/register",
            beforeSend: function(request) {
              request.setRequestHeader("X-CSRF-TOKEN","{{ csrf_token() }}");
            },  
            data: {visitor: frm},
            success:function(){
              Swal.fire({
                title:"Register Success",
                icon: "success",
                text:"Visitor have been successfuly registered",
                timer: 5000
              }).then(x=>location.reload());
            },
            error:function(error)
            {
              console.log({error:error});
              Swal.fire({
                text:"Something Wrong",
                title:"Register Failed",
                icon:'error'
              }) 
            }
          });
        }      
        else
        {
        }
    });
  </script>
</body>

</html>