<?php
session_start();
error_reporting(0);

    include "conn.php";
    include "func.php";
    $user = $_SESSION['user'];
    var_dump($_SESSION);

    $data_user = get_user();
     //Data tampilan---------------------------------------------------------------------------------------------------------------------
     $sql = "SELECT * FROM alat_izul ORDER BY ID DESC LIMIT 1";
     $result = $conn->query($sql);
     $data = mysqli_fetch_assoc($result);
    
     $sql2 = "SELECT * FROM alat_desi ORDER BY ID DESC LIMIT 1";
     $result2 = $conn->query($sql2);
     $data2 = mysqli_fetch_assoc($result2);

     $sql3 = "SELECT * FROM alat_afif ORDER BY ID DESC LIMIT 1";
     $result3 = $conn->query($sql3);
     $data3 = mysqli_fetch_assoc($result3);
 
     $sql7 = "SELECT * FROM alat_caca ORDER BY ID DESC LIMIT 1";
     $result7 = $conn->query($sql7);
     $data7 = mysqli_fetch_assoc($result7);

    //Tabel dan Chart-------------------------------------------------------------------------------------------------------------------
    $nama_tabel = 'alat_izul';
    $nama_tabel2 = 'alat_desi';
    $nama_tabel4 = 'alat_caca';


    $limit_table = 5;
    if(isset($_GET['limit_table'])){
        $limit_table = $_GET['limit_table'];
    }

    $limit_chart = 7;
    if(isset($_GET['limit_chart'])){
        $limit_chart = $_GET['limit_chart'];
    }

    //Izul
    $result = detail_tabel($nama_tabel, $limit_table, $_GET['date_filter']);
    $result2 = detail_tabel($nama_tabel, $limit_table, $_GET['date_filter']);
    //Desi
    $result3 = detail_tabel($nama_tabel2, $limit_table, $_GET['date_filter']);
    $result4 = detail_tabel($nama_tabel2, $limit_table, $_GET['date_filter']);
    //Afif
    $result5 = detail_tabel($nama_tabel2, $limit_table, $_GET['date_filter']);
    $result5 = detail_tabel($nama_tabel2, $limit_table, $_GET['date_filter']);
    //Caca
    $result7 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result7 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);

    
    //Chart
    $chart = detail_chart($nama_tabel, 'ph', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chart2 = detail_chart($nama_tabel, 'tds', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chart3 = detail_chart($nama_tabel2, 'kelembaban', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chart4 = detail_chart($nama_tabel2, 'suhu', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca1 = detail_chart($nama_tabel4, 'tegangan_dc', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca2 = detail_chart($nama_tabel4, 'arus_dc', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca3 = detail_chart($nama_tabel4, 'daya_dc', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca4 = detail_chart($nama_tabel4, 'energi_dc', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca5 = detail_chart($nama_tabel4, 'tegangan_ac', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca6 = detail_chart($nama_tabel4, 'arus_ac', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca7 = detail_chart($nama_tabel4, 'daya_ac', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca8 = detail_chart($nama_tabel4, 'energi_ac', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca9 = detail_chart($nama_tabel4, 'faktor_daya', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca10 = detail_chart($nama_tabel4, 'frekuensi', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca11 = detail_chart($nama_tabel4, 'suhu_pv1', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca12 = detail_chart($nama_tabel4, 'suhu_pv2', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chartcaca13 = detail_chart($nama_tabel4, 'suhu_pv3', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $tgl = $chart ['tgl'];
    $tgl2 = $chart2 ['tgl'];
    $ph = $chart ['value'];
    $tds = $chart2 ['value'];
    $kelembaban = $chart3 ['value'];
    $suhu = $chart4 ['value'];
    $tegangan_dc = $chartcaca1 ['value'];
    $arus_dc = $chartcaca2 ['value'];
    $daya_dc = $chartcaca3 ['value'];
    $energi_dc = $chartcaca4 ['value'];
    $tegangan_ac = $chartcaca5 ['value'];
    $arus_ac = $chartcaca6 ['value'];
    $daya_ac = $chartcaca7 ['value'];
    $energi_ac = $chartcaca8 ['value'];
    $faktor_daya = $chartcaca9 ['value'];
    $frekuensi = $chartcaca10 ['value'];
    $suhu_pv1 = $chartcaca11 ['value'];
    $suhu_pv2 = $chartcaca12 ['value'];
    $suhu_pv3 = $chartcaca13 ['value'];
    //End Chart
//==============================================================================================================================================
?>

<?php include "head_html.php"; ?>

<!-- ROW-1 -->
<div class="page">
    <div class="page-main">
        <div class="landing-top-header overflow-hidden">
            <div class="demo-screen-headline main-demo main-demo-1 spacing-top overflow-hidden reveal" id="home">
                <div class="container px-sm-0">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 mb-5 pb-5 animation-zidex pos-relative">
                            <h1 class="text-start fw-bold">Smartfarming FT UNS</h1>
                            <h6 class="pb-3">
                            <h6 style="text-align:justify;">
                                Smartfarming FT UNS merupakan pengembangan sistem IoT atau Internet of Things yang
                                diaplikasikan pada hidroponik. Saat ini sistem smartfarming mendapatkan supply energi dari 
                                Panel Surya. Pengguna mampu memonitor berbagai macam parameter berupa keasaman, 
                                TDS, suhu, kelembaban dari budidaya hidroponik. Selain itu, pengguna juga dapat 
                                memonitor tegangan, arus, daya, energi, dan suhu dari Panel Surya. Sehingga budidaya 
                                hidroponik dapat terpantau secara daring.
                                </h6>
                        </div>
                        
                        <div class="col-xl-5 col-lg-5 my-auto">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="gambar/5.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="gambar/2.jpeg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="gambar/1.png" alt="Third slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="gambar/1.jpeg" alt="Fourth slide">
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--app-content open-->
        <div class="main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container">
                    <div class="">

                        <!-- ROW-1 OPEN -->
                        <div class="section pb-0">
                            <div class="container">
                                <div class="row">
                                    <span class="landing-title"></span>
                                    <h2 class="text-center fw-semibold mb-7">Monitoring Smartfarming Terkini</h2>
                                </div>
                                <div class="row text-center services-statistics landing-statistics">
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-secondary-transparent">
                                                <div class="counter-status">
                                                    <div
                                                        class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                                        <i class="fa-solid fa-temperature-half"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data2['suhu'] ?></span>
                                                            °C
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Suhu</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-secondary-transparent">
                                                <div class="counter-status">
                                                    <div
                                                        class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                                        <i class="fa-solid fa-wind"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data2['kelembaban'] ?></span>
                                                            RH
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Kelembaban</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-success-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-success-transparent box-shadow-success">
                                                        <i class="fa-solid fa-water"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data['tds'] ?></span>
                                                            ppm
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">TDS</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-success-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-success-transparent box-shadow-success">
                                                        <i class="fa-solid fa-flask-vial"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data['ph'] ?>
                                                            </span> PH
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">PH</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-danger-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-danger-transparent box-shadow-danger">
                                                        <i class="fa-solid fa-bolt"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data3['tegangan'] ?>
                                                            </span> V
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Tegangan</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-danger-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-danger-transparent box-shadow-danger">
                                                        <i class="fa-solid fa-battery-half"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data3['arus'] ?>
                                                            </span> A
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Arus</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h5 class="text-center fw-semibold mb-7"><a href="index4.php">Lihat Detail</a></h5>
                                </div>
                                <div class="row text-center services-statistics landing-statistics">
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 CLOSED -->
                    </div>
                </div>
                <!-- CONTAINER CLOSED-->
            </div>
        </div>
        <!--app-content closed-->
    </div>
</div>
<!-- ROW-1 END -->
<!-- ROW-2 -->

        <!--app-content open-->
        <div class="main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container">
                    <div class="">

                        <!-- ROW-1 OPEN -->
                        <div class="section pb-0">
                            <div class="container">
                                <div class="row">
                                    <span class="landing-title"></span>
                                    <h2 class="text-center fw-semibold mb-7">Monitoring PV dan Penggunaan Beban</h2>
                                </div>
                                <div class="row text-center services-statistics landing-statistics">
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-warning-transparent">
                                                <div class="counter-status">
                                                    <div
                                                        class="counter-icon bg-warning-transparent box-shadow-light">
                                                        <i class="fa-solid fa-bolt"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['tegangan_ac'] ?></span>
                                                            V
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Tegangan AC</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-warning-transparent">
                                                <div class="counter-status">
                                                    <div
                                                        class="counter-icon bg-warning-transparent box-shadow-light">
                                                        <i class="fa-solid fa-bolt"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['arus_ac'] ?></span>
                                                            A
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Arus AC</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-warning-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-warning-transparent box-shadow-light">
                                                        <i class="fa-solid fa-lightbulb"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['daya_ac'] ?></span>
                                                            W
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Daya AC</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-warning-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-warning-transparent box-shadow-light">
                                                        <i class="fa-solid fa-house"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['energi_ac'] ?>
                                                            </span> kWh
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Energi AC</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-warning-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-warning-transparent box-shadow-light">
                                                        <i class="fa-solid fa-heart-circle-bolt"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['faktor_daya'] ?>
                                                            </span> PF
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Faktor Daya</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-warning-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-warning-transparent box-shadow-light">
                                                        <i class="fa-solid fa-wave-square"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['frekuensi'] ?>
                                                            </span> Hz
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Frekuensi</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- ROW-2 END -->
                                    <!-- ROW-3 -->
                                    <div class="col-md-2">
                                        <div class="card">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-secondary-transparent">
                                                <div class="counter-status">
                                                    <div
                                                        class="counter-icon bg-secondary-transparent box-shadow-light">
                                                        <i class="fa-solid fa-solar-panel"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['tegangan_dc'] ?></span>
                                                            V
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Tegangan PV</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-secondary-transparent">
                                                <div class="counter-status">
                                                    <div
                                                        class="counter-icon bg-secondary-transparent box-shadow-light">
                                                        <i class="fa-solid fa-solar-panel"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['arus_dc'] ?></span>
                                                            A
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Arus PV</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-secondary-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-secondary-transparent box-shadow-light">
                                                        <i class="fa-solid fa-lightbulb"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['daya_dc'] ?></span>
                                                            W
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Daya PV</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-secondary-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-secondary-transparent box-shadow-light">
                                                        <i class="fa-solid fa-house"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['energi_dc'] ?>
                                                            </span> kWh
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Energi PV</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-danger-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-danger-transparent box-shadow-light">
                                                        <i class="fa-solid fa-temperature-half"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['suhu_pv1'] ?>
                                                            </span> °C
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Suhu PV 1</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-danger-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-danger-transparent box-shadow-light">
                                                        <i class="fa-solid fa-temperature-half"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['suhu_pv2'] ?>
                                                            </span> °C
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Suhu PV 2</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body bg-danger-transparent">
                                                <div class="counter-status">
                                                    <div class="counter-icon bg-danger-transparent box-shadow-light">
                                                        <i class="fa-solid fa-temperature-half"></i>
                                                    </div>
                                                    <div class="test-body text-center">
                                                        <h1 class=" mb-0">
                                                            <span
                                                                class="counter fw-semibold counter "><?php echo $data7['suhu_pv3'] ?>
                                                            </span> °C
                                                        </h1>
                                                        <div class="counter-text">
                                                            <h5 class="font-weight-normal mb-0 ">Suhu PV 3</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>

                                    <h5 class="text-center fw-semibold mb-7"><a href="index5.php">Lihat Detail</a></h5>
                                </div>
                                <div class="row text-center services-statistics landing-statistics">
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 CLOSED -->
                    </div>
                </div>
                <!-- CONTAINER CLOSED-->
            </div>
        </div>
        <!--app-content closed-->
    </div>
</div>
<!-- ROW-2 END -->





<?php include "footer_html.php"; ?>










<?php
//================================================================================================================================================


?>