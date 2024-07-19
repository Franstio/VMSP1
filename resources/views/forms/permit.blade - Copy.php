<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register - Permit</title>
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
                    <label for="purpose" class="col-sm-3 col-form-label">Purpose <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select required class="form-select" id="purpose" name="purpose">
                            <option  value="">Please Select</option>
                            <option value="WORKING">WORKING</option>
                            <option value="MEETING">MEETING</option>
                            <option value="SUPPLY">SUPPLY</option>
                        </select>
                    </div>
                </div>
                <section class="gap-2 d-flex flex-column d-none" id="working">
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Working Type <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <select id='wType' class="form-control">
                        <option value="1">Working With Permit</option>
                        <option value="0">Working Without Permit</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Permit No <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <input id='permitNo' type="text" name="permitNo" class="form-control"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Deskripsi Pekerjaan <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <textarea id='desk' type="text" name="desk" class="form-control" row="3"></textarea>
                    </div>
                  </div>
                </section>
                <div class="form-group row">
                  <label  class="col-sm-3 col-form-label">Range Duration Work <span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <div class="d-flex align-items-center flex-row gap-2">
                      <input type="datetime-local" value="<?= date("Y-m-d\TH:i",time()) ?>" class="form-control" name='startDate'/>
                      <p class="mb-0">To</p>
                      <input type="datetime-local" class="form-control" name='endDate'/>
                    </div>
                  </div>
              </div>
              <section class="gap-2 d-flex d-none  flex-column" id="supply">
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">LOCATION <span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <input required type="text" class="form-control" id="location" name="nameLocation" >
                  </div>
                </div>
                <section  >
                <div class="d-flex flex-row gap-3 justify-content-around w-100">
                  <label>Item Description <span class="text-danger">*</span></label>
                  <label>Quantity <span class="text-danger">*</span></label>
                  <label>Unit <span class="text-danger">*</span></label>
                </div>
                <div id="supply_item" class="d-flex flex-column gap-2">  
                  <div tag="supplyItem" class="gap-3 w-100 d-flex flex-row">
                    <div class="form-group">
                      <input type="text" tag="itemDesc" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <input type="number" tag="Quantity" class="form-control"/>
                    </div>
                    <div class="form-group flex-grow-1">
                      <select class="form-control w-100"  tag="Unit">
                        <option value="PCS">PCS</option>
                        <option value="UNIT">UNIT</option>
                        <option value="SET">SET</option>
                        <option value="KG">KG</option>
                        <option value="MTR">MTR</option>
                      </select>
                    </div>
                  </div>
                </div>
                <button class="btn mt-2 align-self-start text-white btn-info" type="button" id="btnAdd">Add</button>
                </section>
              </section>
                <h3 class="mt-3"><strong>Masukkan Nama Pengunjung</strong></h3>
                <section class="d-flex flex-column" id="visitorSect">
                  <div class="d-flex flex-row gap-3 justify-content-around w-100">
                    <label>NIK <span class="text-danger">*</span></label>
                    <label>Nama <span class="text-danger">*</span></label>
                    <label>Jabatan <span class="text-danger">*</span></label>
                  </div>
                  <div class="d-flex flex-column gap-2" id="visitorList">
                    <div id="visitorItem1" class="d-flex flex-row gap-3">
                      <input type="number" count="1" tag="nik" class="form-control"/>
                      <input type="text" readonly tag="nama" class="form-control"/>
                      <input type="text" readonly tag="jabatan" class="form-control"/>
                    </div>
                  </div>
                  <button class="align-self-start mt-2 btn btn-primary text-white" type="button"  id="visitorBtn">Add</button>
                </section>
                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label">Email Pengirim <span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <input type="email" name="email" id="email" class="form-control"/>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="host" class="col-sm-3 col-form-label">Nama HOST <span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <select name="host" required id="host" class="form-select">
                      <option value="">Please Select</option>
                    </select>
                  </div>
                </div>
                <div class="form-group align-items-center row">
                  <label for="host" class="col-sm-3 col-form-label">Apakah Membawa Media Penyimpanan? <span class="text-danger">*</span></label>
                  <div class="col-sm-9">
                    <select name="bawaBarang" required id="bawaBarang" class="form-select">
                      <option value="">Please Select</option>
                      <option value="YA">YA</option>
                      <option value="TIDAK">TIDAK</option>
                    </select>
                  </div>
                </div>
                <section id="bawaan" class="d-none">
                  <div id="bawaanList" class="d-flex flex-column gap-2">
                    <div tag="bawaanItem" class="d-flex flex-row gap-3">
                      <div class="form-group">
                        <label>Nama Pemilik <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" tag="nama"/>
                      </div>
                      <div class="form-group">
                        <label><i class="fas fa-network-wired    "></i> NIK <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" tag="NIK"/>
                      </div>
                      <div class="form-group">
                        <label>SN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" tag="SN"/>
                      </div>
                      <div class="form-group">
                        <label>Jenis Media <span class="text-danger">*</span></label>
                        <select class="form-select" tag="Jenis_Media">
                          <option value="">Please Select</option>
                          <option value="Personal Computer / Laptop">Personal Computer / Laptop</option>
                          <option value="Camera (Digital or analogue)">Camera (Digital or analogue)</option>
                          <option value="Mobilephone with camera / video">Mobilephone with camera / video</option>
                          <option value="Tablet with camera / video" >Tablet with camera / video</option>
                          <option value="Digital Video Recorder" >Digital Video Recorder</option>
                          <option value="Thumbdrive / Pendrive storage unit" class="translatable _lg5eywycw _uidset">Thumbdrive / Pendrive storage unit</option>
                          <option value="Memory Cards (SD/CF/MMC etc.)" >Memory Cards (SD/CF/MMC etc.)</option>
                          <option value="Audio Tape Recorder" >Audio Tape Recorder</option>
                          <option value="Others (pls state)" >Others (pls state)</option>
                          <option value="CDRW / CDR / HDD" >CDRW / CDR / HDD</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tujuan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" tag="Tujuan "/>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary mt-2 align-self-start" id="bawaanBtn">Add</button>
                </section>
                <p><strong>SAYA YANG BERTANDA TANGAN BENAR SUDAH MEMBACA SUBCON SAFETY MANUAL DAN APABILA SAYA MELANGGAR PROSEDUR TERSEBUT SAYA SIAP MENERIMA SANKSI YANG DIBERIKAN OLEH PIHAK PANASONIC</strong></p>
                <div class="form-group  row">
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
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

  @vite([ 'resources/js/app.js'])
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script><link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link type="text/css" href="css/jquery.signature.css" rel="stylesheet"> 
<script type="text/javascript" src="js/jquery.signature.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

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
    let SupplyItem = [];
    let Visitors = [];
    let VisitorCount = 1;
    function SearchVisitor($nik)
    {
      console.log($nik.val());
      $.ajax({
        method:"GET",
        url: "/waiting/visitor/"+$nik.val(),
        success:function(data){
          if (data.length < 1)
          {
            $nik.val("");
            return;
          }
          $("#visitorItem"+$nik.attr("count") + " input[tag='nama']").val(data[0].namaVisitor);
          $("#visitorItem"+$nik.attr("count") + " input[tag='jabatan']").val(data[0].jabatan);
        },
        error: function(){
          $nik.val("");
        }
      });
    }
    $("#visitorItem1 input[tag='nik']").on('change',function(x)
    {
          SearchVisitor($(this));
    });
    $("#bawaBarang").on('change',function(){
      let r = $(this).val();
      if (r=="YA")
        $("#bawaan").removeClass("d-none");
      else 
        $("#bawaan").addClass("d-none");
    });
    $(document).ready(function(){
      let itm = $("#visitorItem1").clone();
      let supItem = $("div[tag='supplyItem']").clone();
      let bawaanItem = $("div[tag='bawaanItem']").clone();

      $.ajax({
        url: "/hosts",
        method:"GET",
        success:function(data)
        {
          for(let i=0;i<data.length;i++)
          {
            $("#host").append("<option value='"+data[i].empid+"'>"+data[i].name+"</option>");
          }
        }
      })

      $("#bawaanBtn").on('click',function(){
        bawaanItem.clone().appendTo("#bawaanList");
      });
      
      $("#visitorBtn").on('click',function(){
        VisitorCount = VisitorCount+1;
        $(itm).clone().attr("id","visitorItem"+VisitorCount).appendTo("#visitorList");
        $("#visitorItem"+VisitorCount + " input[tag='nik']").attr("count",VisitorCount).on('change',function(){
          SearchVisitor($(this));
        });
      });
      $("#wType").on("change",function(){
        $("#permitNo").val("");
        if ($(this).val()=="0")
        {
          $("#permitNo").val("Pekerjaan Tidak Memerlukan Permit (Service)");
        }
        $("#desk").val("Method Kerja: ");
      });
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
      $("#btnAdd").on('click',function(){

        supItem.clone().appendTo("#supply_item");
      });
      $("#purpose").on('change',function()
      {
        $("section#working").addClass("d-none");
        $("section#supply").addClass("d-none");
        $("#location").val("");
        $("#desk").val("");
        $("#wType").val("");
        $("#permitNo").val("");
        if ($(this).val() == "WORKING")
        {
          $("section#working").removeClass("d-none").addClass("d-flex");
        }
        else if ($(this).val()=="SUPPLY")
        {
          $("section#supply").removeClass("d-none").addClass("d-flex");
        }
      });
    });
    const cv  = document.getElementById("sig");
    const sign = new SignaturePad(cv);
    function getFormData(form){
    var unindexed_array = form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
    } 
    $("#confirmBtn").on('click',function(e){
        let frm = getFormData($("#frm1"));
        frm.permitNo = "";
        frm.desk = "";
        frm.supplyBarang = "";
        frm.nameLocation = "";
        if ($("#purpose").val()=="WORKING")
        {
          frm.permitNo = $("#permitNo").val();
          frm.desk = $("#desk").val();
        }
        else if ($("#purpose").val() =="SUPPLY")
        {
          frm.nameLocation = $("#location").val();
          frm.supplyBarang = [];
          $("div[tag='supplyItem']").each( ( key,val)=>{
          let t = $(val);
            frm.supplyBarang.push({"Item Description": t.find("input[tag='itemDesc']").val(),Quantity: t.find("input[tag='Quantity']").val(),Unit:t.find("select[tag='Unit']").val()});
          });          
          frm.supplyBarang = JSON.stringify(frm.supplyBarang);
        }
        if ($("#bawaBarang").val()=="YA")
        {
          frm.barangBawaan  = [];
          $("div[tag='bawaanItem']").each( ( key,val)=>{
          let t = $(val);
            frm.barangBawaan.push({namaPemilik: t.find("input[tag='nama']").val(),NIK: t.find("input[tag='NIK']").val(),SN:t.find("input[tag='SN']").val(),JenisMedia: t.find("select[tag='Jenis_Media']").val(),tujuan: t.find("input[tag='Tujuan']").val()});
          });
          frm.barangBawaan = JSON.stringify(frm.barangBawaan);
        }
        else
        {
          frm.barangBawaan = "";
        }
        frm.anggota = [];
        frm.name = $("#host option:selected").html() + ":" +  $("#host").val();
        for (let i=1;i<=VisitorCount;i++)
        {
            frm.anggota.push({
              Nama: $("#visitorItem"+i + " input[tag='nama']").val(),
              Jabatan : $("#visitorItem"+i+ " input[tag='jabatan']").val(),
              NIK: $("#visitorItem"+i + " input[tag='nik']").val()
            });
        }
        frm.anggota = JSON.stringify(frm.anggota);
        console.log({Form: frm});
        if ($("#frm1").valid() )
        { 
          frm.sign = sign.toDataURL();
          $.ajax({
            method: "POST",
            url: "/register-permit",
            beforeSend: function(request) {
              request.setRequestHeader("X-CSRF-TOKEN","{{ csrf_token() }}");
            },  
            data: {permit: frm},
            success:function(){
              Swal.fire({
                title:"Register Success",
                icon: "success",
                text:"Permit have been successfuly registered",
                timer: 5000
              }).then(x=>{
                location.reload();
              });
            },
            error:function(error)
            {
              console.log({error:error});
              Swal.fire({
                title:"Register Failed",
                text:"Someting Wrong",
                icon:"error"
              });
              return;
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