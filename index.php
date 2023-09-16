<?php
    session_start();
    error_reporting(0);

    include "conn.php";
    include "func.php";
    $user = $_SESSION['user'];

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

    // //Tabel dan Chart-------------------------------------------------------------------------------------------------------------------
    // $nama_tabel = 'alat_izul';
    // $nama_tabel2 = 'alat_desi';
    // $nama_tabel4 = 'alat_caca';


    // $limit_table = 5;
    // if (isset($_GET['limit_table'])) {
    //     $limit_table = $_GET['limit_table'];
    // }

    // $limit_chart = 7;
    // if (isset($_GET['limit_chart'])) {
    //     $limit_chart = $_GET['limit_chart'];
    // }

    // //Izul
    // $result = detail_tabel($nama_tabel, $limit_table, $_GET['date_filter']);
    // $result2 = detail_tabel($nama_tabel, $limit_table, $_GET['date_filter']);
    // //Desi
    // $result3 = detail_tabel($nama_tabel2, $limit_table, $_GET['date_filter']);
    // $result4 = detail_tabel($nama_tabel2, $limit_table, $_GET['date_filter']);
    // //Afif
    // $result5 = detail_tabel($nama_tabel2, $limit_table, $_GET['date_filter']);
    // $result5 = detail_tabel($nama_tabel2, $limit_table, $_GET['date_filter']);
    // //Caca
    // $result7 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    // $result7 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);


    // //Chart
    // $chart = detail_chart($nama_tabel, 'ph', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    // $chart2 = detail_chart($nama_tabel, 'tds', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    // $chart3 = detail_chart($nama_tabel2, 'kelembaban', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    // $chart4 = detail_chart($nama_tabel2, 'suhu', $limit_chart, $_GET['from_date'], $_GET['to_date']);

    // $tgl = $chart['tgl'];
    // $tgl2 = $chart2['tgl'];
    // $ph = $chart['value'];
    // $tds = $chart2['value'];
    // $kelembaban = $chart3['value'];
    // $suhu = $chart4['value'];
?>

<?php include "head_html.php"; ?>

<!-- ROW-1 -->
<div class="page">
    <div class="page-main">
        <div class="landing-top-header overflow-hidden">
            <div class="demo-screen-headline main-demo main-demo-1 spacing-top overflow-hidden reveal" id="home">
                <div class="container px-sm-0">
                    <div class="row py-4">
                        <div class="col-xl-6 col-lg-6 my-3 py-3 animation-zidex pos-relative">
                            <h1 class="text-start fw-bold">Smart Hidroponik Refugia Magetan</h1>
                            <h6 class="pb-3">
                                <h6 style="text-align:justify;">
                                    Smart Hidroponik Kebun Refugia Magetan merupakan hasil kerjasama Pemkab Magetan dengan Hibah Riset Grup Fakultas Teknik UNS untuk mengembangkan sistem hidroponik yang <em>low-maintenance</em> dengan harapan mudah digunakan. Selain itu, sistem ini juga termasuk (Internet of Things) yang mana data-data dari sensor (pH, nutrisi, suhu dan kelembapan) bisa dipantau dan dikontrol dari jarak jauh. 
                                    Sistem ini juga menggunakan Energi Baru Terbarukan (Panel Surya) dan fitur interaktif dengan integrasi Google Voice Assistant, sehingga sangat cocok untuk media pembelajaran.
                                </h6>
                        </div>

                        <div class="col-xl-5 col-lg-5 my-auto">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="gambar/1.jpeg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="gambar/2.jpeg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="gambar/3.jpeg" alt="Third slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="gambar/4.jpeg" alt="Fourth slide">
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

    <!-- MONITORING SECTION -->
    <!-- ------------------ -->
    <!--app-content open-->
    <div class="main-content mt-2">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container">
                <div class="">
                    <!-- ROW-1 OPEN -->
                    <div class="section pb-0">
                        <div class="container">
                            <div class="row py-5 my-4">
                                <span class="landing-title"></span>
                                <h2 class="text-center fw-semibold">Monitoring Smartfarming Terkini</h2>
                            </div>
                            <div class="row text-center services-statistics landing-statistics mt-5 pt-5">
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body bg-secondary-transparent">
                                            <div class="counter-status">
                                                <div class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                                    <i class="fa-solid fa-temperature-half"></i>
                                                </div>
                                                <div class="test-body text-center">
                                                    <h1 class=" mb-0">
                                                        <span class="counter fw-semibold counter "><?php echo $data2['suhu'] ?></span>
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
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body bg-secondary-transparent">
                                            <div class="counter-status">
                                                <div class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                                    <i class="fa-solid fa-wind"></i>
                                                </div>
                                                <div class="test-body text-center">
                                                    <h1 class=" mb-0">
                                                        <span class="counter fw-semibold counter "><?php echo $data2['kelembaban'] ?></span>
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
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body bg-success-transparent">
                                            <div class="counter-status">
                                                <div class="counter-icon bg-success-transparent box-shadow-success">
                                                    <i class="fa-solid fa-water"></i>
                                                </div>
                                                <div class="test-body text-center">
                                                    <h1 class=" mb-0">
                                                        <span class="counter fw-semibold counter "><?php echo $data['tds'] ?></span>
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
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body bg-success-transparent">
                                            <div class="counter-status">
                                                <div class="counter-icon bg-success-transparent box-shadow-success">
                                                    <i class="fa-solid fa-flask-vial"></i>
                                                </div>
                                                <div class="test-body text-center">
                                                    <h1 class=" mb-0">
                                                        <span class="counter fw-semibold counter "><?php echo $data['ph'] ?>
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
                                <h5 class="text-center fw-semibold my-5 py-3"><a href="detail-ph-tds.php">Lihat Detail</a></h5>
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

<?php include "footer_html.php"; ?>