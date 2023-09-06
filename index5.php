<?php
session_start();
error_reporting(0);

//if (!isset($_SESSION['user'])) {
    //header("Location: login.php");
    //}else{
    include('conn.php');
    include "func.php";

    $data_user = get_user();
    //Data tampilan---------------------------------------------------------------------------------------------------------------------

    $sql7 = "SELECT * FROM alat_caca ORDER BY ID DESC LIMIT 1";
    $result7 = $conn->query($sql7);
    $result8 = $conn->query($sql7);
    $result9 = $conn->query($sql7);
    $result10 = $conn->query($sql7);
    $result11 = $conn->query($sql7);
    $result12 = $conn->query($sql7);
    $result13 = $conn->query($sql7);
    $result14 = $conn->query($sql7);
    $result15 = $conn->query($sql7);
    $result16 = $conn->query($sql7);
    $result17 = $conn->query($sql7);
    $result18 = $conn->query($sql7);
    $result19 = $conn->query($sql7);
    $data7 = mysqli_fetch_assoc($result7);

    //Tabel dan Chart Tegangan------------------------------------------------------------------------------------------------------------
    $nama_tabel4 = 'alat_caca';
    $limit_table = 5;
    if(isset($_GET['limit_table'])){
        $limit_table = $_GET['limit_table'];
    }

    $limit_chart = 7;
    if(isset($_GET['limit_chart'])){
        $limit_chart = $_GET['limit_chart'];
    }

    $result7 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result8 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result9 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result10 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result11 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result12 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result13 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result14 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result15 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result16 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result17 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result18 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);
    $result19 = detail_tabel($nama_tabel4, $limit_table, $_GET['date_filter']);

    //Chart
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
    $tgl = $chartcaca1 ['tgl'];
    $tgl2 = $chartcaca2 ['tgl'];
    $tgl3 = $chartcaca3 ['tgl'];
    $tgl4 = $chartcaca4 ['tgl'];
    $tgl5 = $chartcaca5 ['tgl'];
    $tgl6 = $chartcaca6 ['tgl'];
    $tgl7 = $chartcaca7 ['tgl'];
    $tgl8 = $chartcaca8 ['tgl'];
    $tgl9 = $chartcaca9 ['tgl'];
    $tgl10 = $chartcaca10 ['tgl'];
    $tgl11 = $chartcaca11 ['tgl'];
    $tgl12 = $chartcaca12 ['tgl'];
    $tgl13 = $chartcaca13 ['tgl'];
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

    //Tabel dan Chart Tegangan-----------------------------------------------------------------------------------------------------------

//==============================================================================================================================================
?>

<?php include "head_html.php"; ?>

<!-- ROW-1 -->

<!-- ROW-1 END -->

<!-- ROW-2 -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-primary">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li><a href="index4.php"><i class="fa-solid fa-flask-vial"></i> Monitor PH & TDS</a></li>
                                <li><a href="index2.php"><i class="fa-solid fa-temperature-half"></i>Monitor Suhu dan Kelembaban</a></li>
                                <li><a href="index3.php"><i class="fa-solid fa-battery-full"></i> Monitor Tegangan dan Arus</a></li>
                                <li><a href="index2.php" class="active"><i class="fa-solid fa-temperature-half"></i>Monitor Panel Surya dan Penggunaan Beban</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="row">
                                    <!-- Detail Tegangan DC -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Tegangan DC
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Tegangan DC Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['tegangan_dc'] ?>
                                                            V</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartTegangandc" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Tegangan DC -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Tegangan DC</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result7->num_rows>0){
                                while($row=$result7->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['tegangan_dc'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Tegangan DC -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Tegangan DC -->

                                    <!-- Detail Arus DC -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Arus DC
                                                </h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Arus DC Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['arus_dc'] ?> A
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartArusdc" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Arus DC -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Arus DC</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result8->num_rows>0){
                                while($row1=$result8->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row1['tgl'] ?></td>
                                                                <td><?php echo $row1['arus_dc'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row1['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabel Arus DC -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Arus DC -->
                                  
                                    <!-- Detail Daya DC -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Daya DC
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Daya DC Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['daya_dc'] ?>
                                                            W</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartDayadc" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Daya DC -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Daya DC</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result9->num_rows>0){
                                while($row=$result9->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['daya_dc'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Daya DC -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Daya DC -->

                                    <!-- Detail Energi DC -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Energi DC
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Energi DC Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['energi_dc'] ?>
                                                            kWh</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartEnergidc" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Energi DC -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Energi DC</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result10->num_rows>0){
                                while($row=$result10->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['energi_dc'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Energi DC -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Energi DC -->

                                    <!-- Detail Tegangan AC -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Tegangan AC
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Tegangan AC Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['tegangan_ac'] ?>
                                                            V</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartTeganganac" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                    <!-- Tabel Tegangan AC -->
                                    <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Tegangan AC</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result11->num_rows>0){
                                while($row=$result11->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['tegangan_ac'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Tegangan AC -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Tegangan AC -->

                                    <!-- Detail Arus AC -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Arus AC
                                                </h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Arus AC Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['arus_ac'] ?> A
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartArusac" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Arus AC -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Arus AC</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result12->num_rows>0){
                                while($row1=$result12->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row1['tgl'] ?></td>
                                                                <td><?php echo $row1['arus_ac'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row1['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabel Arus AC -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Arus AC -->

                                    <!-- Detail Daya AC -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Daya AC
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Daya AC Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['daya_ac'] ?>
                                                            W</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartDayaac" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Daya AC -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Daya AC</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result13->num_rows>0){
                                while($row=$result13->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['daya_ac'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Daya AC -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Daya AC -->

                                    <!-- Detail Energi AC -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Energi AC
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Energi AC Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['energi_ac'] ?>
                                                            kWh</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartEnergiac" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Energi AC -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Energi AC</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result14->num_rows>0){
                                while($row=$result14->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['energi_ac'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Energi AC -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Energi AC -->

                                    <!-- Detail Faktor Daya -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Faktor Daya
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Faktor Daya Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['faktor_daya'] ?>
                                                            PF</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartFaktordaya" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Faktor Daya -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Faktor Daya</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result15->num_rows>0){
                                while($row=$result15->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['faktor_daya'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Faktor Daya -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Faktor Daya -->

                                    <!-- Detail Frekuensi -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Frekuensi
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Frekuensi Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['frekuensi'] ?>
                                                            Hz</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartFrekuensi" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Frekuensi -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Frekuensi</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result16->num_rows>0){
                                while($row=$result16->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['frekuensi'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Frekuensi -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Frekuensi -->

                                    <!-- Detail Suhu PV 1 -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Suhu PV 1
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Suhu PV 1 Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['suhu_pv1'] ?>
                                                            °C</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartSuhupv1" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Suhu PV 1 -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Suhu PV 1</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result17->num_rows>0){
                                while($row=$result17->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['suhu_pv1'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Suhu PV 1 -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Suhu PV 1 -->

                                    <!-- Detail Suhu PV 2 -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Suhu PV 2
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Suhu PV 2 Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['suhu_pv2'] ?>
                                                            °C</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartSuhupv2" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Suhu PV 2 -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Suhu PV 2</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result18->num_rows>0){
                                while($row=$result18->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['suhu_pv2'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Suhu PV 2 -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Suhu PV 2 -->

                                    <!-- Detail Suhu PV 3 -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Suhu PV 3
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Suhu PV 3 Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data7['suhu_pv3'] ?>
                                                            °C</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartSuhupv3" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Suhu PV 3 -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Suhu PV 3</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result19->num_rows>0){
                                while($row=$result19->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['suhu_pv3'] ?></td>
                                                                <td>
                                                                    <?php 
                                        if($row['status'] == '1'){
                                            echo '<span class="badge rounded-pill bg-success badge-sm me-1 mb-1 mt-1">ON</span>';
                                        }else{
                                            echo '<span class="badge rounded-pill bg-danger badge-sm me-1 mb-1 mt-1">OFF</span>';
                                        } 
                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php }}else{echo "Tidak ada data";} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Tabeel Suhu PV 3 -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Suhu PV 3 -->



                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-options">
                                                <form action="" class="form" method="get">
                                                    <div class="row">
                                                        <h3 class="card-title">
                                                            Filter
                                                        </h3>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Limit Tabel</label>
                                                                <input type="number" name="limit_table" min="1"
                                                                    value="<?php echo $limit_table; ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Date Tabel</label>
                                                                <input type="date" name="date_filter"
                                                                    value="<?php if(isset($_GET['date_filter'])){ echo $_GET['date_filter']; } ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Limit Chart</label>
                                                                <input type="number" name="limit_chart" min="1"
                                                                    value="<?php echo $limit_chart; ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>From Date Chart</label>
                                                                <input type="date" name="from_date"
                                                                    value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>To Date Chart</label>
                                                                <input type="date" name="to_date"
                                                                    value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group">
                                                                <label>-</label>
                                                                <button class="btn btn-info form-control"
                                                                    type="submit">Cari</button>
                                                            </div>
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
            </div>
        </div>

    </div>
    <!-- COL END -->

</div>
<!-- ROW-2 END -->

<!-- CHARTS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
//myChart
const labels = <?php echo json_encode($tgl); ?>;
Chart.defaults.color = '#57acdc';
Chart.defaults.borderColor = '#276bb0';
Chart.defaults.font.weight = 'bold';

 
//Data ChartTegangandc
const dataTegangandc = {
    labels: labels,
    datasets: [{
        label: 'Tegangan DC',
        backgroundColor: '#e91363',
        borderColor: '#e91363',
        data: <?php echo json_encode($tegangan_dc); ?>,
    }, ]
};
const configTegangandc = {
    type: 'line',
    data: dataTegangandc,
    options: {}
};
const chartTegangandc = new Chart(
    document.getElementById('chartTegangandc'),
    configTegangandc
);

//Data ChartArusdc
const dataArusdc = {
    labels: labels,
    datasets: [{
        label: 'Arus DC',
        backgroundColor: '#e99713',
        borderColor: '#e99713',
        data: <?php echo json_encode($arus_dc); ?>,
    }, ]
};
const configArusdc = {
    type: 'line',
    data: dataArusdc,
    options: {}
};
const chartArusdc = new Chart(
    document.getElementById('chartArusdc'),
    configArusdc
);

//Data ChartDayadc
const dataDayadc = {
    labels: labels,
    datasets: [{
        label: 'Daya DC',
        backgroundColor: '#e91363',
        borderColor: '#e91363',
        data: <?php echo json_encode($daya_dc); ?>,
    }, ]
};
const configDayadc = {
    type: 'line',
    data: dataDayadc,
    options: {}
};
const chartDayadc = new Chart(
    document.getElementById('chartDayadc'),
    configDayadc
);

//Data ChartEnergidc
const dataEnergidc = {
    labels: labels,
    datasets: [{
        label: 'Energi DC',
        backgroundColor: '#e99713',
        borderColor: '#e99713',
        data: <?php echo json_encode($energi_dc); ?>,
    }, ]
};
const configEnergidc = {
    type: 'line',
    data: dataEnergidc,
    options: {}
};
const chartEnergidc = new Chart(
    document.getElementById('chartEnergidc'),
    configEnergidc
);

//Data ChartTeganganac
const dataTeganganac = {
    labels: labels,
    datasets: [{
        label: 'Tegangan AC',
        backgroundColor: '#e91363',
        borderColor: '#e91363',
        data: <?php echo json_encode($tegangan_ac); ?>,
    }, ]
};
const configTeganganac = {
    type: 'line',
    data: dataTeganganac,
    options: {}
};
const chartTeganganac = new Chart(
    document.getElementById('chartTeganganac'),
    configTeganganac
);

//Data ChartArusac
const dataArusac = {
    labels: labels,
    datasets: [{
        label: 'Arus AC',
        backgroundColor: '#e99713',
        borderColor: '#e99713',
        data: <?php echo json_encode($arus_ac); ?>,
    }, ]
};
const configArusac = {
    type: 'line',
    data: dataArusac,
    options: {}
};
const chartArusac = new Chart(
    document.getElementById('chartArusac'),
    configArusac
);

//Data ChartDayaac
const dataDayaac = {
    labels: labels,
    datasets: [{
        label: 'Daya AC',
        backgroundColor: '#e91363',
        borderColor: '#e91363',
        data: <?php echo json_encode($daya_ac); ?>,
    }, ]
};
const configDayaac = {
    type: 'line',
    data: dataDayaac,
    options: {}
};
const chartDayaac = new Chart(
    document.getElementById('chartDayaac'),
    configDayaac
);

//Data ChartEnergiac
const dataEnergiac = {
    labels: labels,
    datasets: [{
        label: 'Energi AC',
        backgroundColor: '#e99713',
        borderColor: '#e99713',
        data: <?php echo json_encode($energi_ac); ?>,
    }, ]
};
const configEnergiac = {
    type: 'line',
    data: dataEnergiac,
    options: {}
};
const chartEnergiac = new Chart(
    document.getElementById('chartEnergiac'),
    configEnergiac
);

//Data ChartFaktordaya
const dataFaktordaya = {
    labels: labels,
    datasets: [{
        label: 'Faktor Daya',
        backgroundColor: '#e91363',
        borderColor: '#e91363',
        data: <?php echo json_encode($faktor_daya); ?>,
    }, ]
};
const configFaktordaya = {
    type: 'line',
    data: dataFaktordaya,
    options: {}
};
const chartFaktordaya = new Chart(
    document.getElementById('chartFaktordaya'),
    configFaktordaya
);

//Data ChartFrekuensi
const dataFrekuensi = {
    labels: labels,
    datasets: [{
        label: 'Frekuensi',
        backgroundColor: '#e99713',
        borderColor: '#e99713',
        data: <?php echo json_encode($frekuensi); ?>,
    }, ]
};
const configFrekuensi = {
    type: 'line',
    data: dataFrekuensi,
    options: {}
};
const chartFrekuensi = new Chart(
    document.getElementById('chartFrekuensi'),
    configFrekuensi
);

//Data ChartSuhupv1
const dataSuhupv1 = {
    labels: labels,
    datasets: [{
        label: 'Suhu PV 1',
        backgroundColor: '#e91363',
        borderColor: '#e91363',
        data: <?php echo json_encode($suhu_pv1); ?>,
    }, ]
};
const configSuhupv1 = {
    type: 'line',
    data: dataSuhupv1,
    options: {}
};
const chartSuhupv1 = new Chart(
    document.getElementById('chartSuhupv1'),
    configSuhupv1
);

//Data ChartSuhupv2
const dataSuhupv2 = {
    labels: labels,
    datasets: [{
        label: 'Suhu PV 2',
        backgroundColor: '#e99713',
        borderColor: '#e99713',
        data: <?php echo json_encode($suhu_pv2); ?>,
    }, ]
};
const configSuhupv2 = {
    type: 'line',
    data: dataSuhupv2,
    options: {}
};
const ChartSuhupv2 = new Chart(
    document.getElementById('chartSuhupv2'),
    configSuhupv2
);

//Data ChartSuhupv3
const dataSuhupv3 = {
    labels: labels,
    datasets: [{
        label: 'Suhu PV 3',
        backgroundColor: '#e91363',
        borderColor: '#e91363',
        data: <?php echo json_encode($suhu_pv3); ?>,
    }, ]
};
const configSuhupv3 = {
    type: 'line',
    data: dataSuhupv3,
    options: {}
};
const ChartSuhupv3 = new Chart(
    document.getElementById('chartSuhupv3'),
    configSuhupv3
);

</script>

<?php include "footer_html.php"; ?>










<?php
//================================================================================================================================================



?>