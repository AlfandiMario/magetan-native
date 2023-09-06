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
    $sql = "SELECT * FROM alat_afif ORDER BY ID DESC LIMIT 1";
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    
    
    //Tabel dan Chart Lembab------------------------------------------------------------------------------------------------------------
    $nama_tabel = 'alat_afif';
    $limit_table = 5;
    if(isset($_GET['limit_table'])){
        $limit_table = $_GET['limit_table'];
    }

    $limit_chart = 7;
    if(isset($_GET['limit_chart'])){
        $limit_chart = $_GET['limit_chart'];
    }

    $result = detail_tabel($nama_tabel, $limit_table, $_GET['date_filter']);
    $result2 = detail_tabel($nama_tabel, $limit_table, $_GET['date_filter']);

    //Chart
    $chart = detail_chart($nama_tabel, 'tegangan', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $chart2 = detail_chart($nama_tabel, 'arus', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $tgl = $chart ['tgl'];
    $tgl2 = $chart2 ['tgl'];
    $tegangan = $chart ['value'];
    $arus = $chart2 ['value'];
    //End Chart

//==============================================================================================================================================
?>

<?php include "head_html.php"; ?>

<!-- PAGE-HEADER -->
<br>
<!-- PAGE-HEADER END -->

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
                                <li><a href="index2.php" ><i class="fa-solid fa-temperature-half"></i> Monitor Suhu dan Kelembaban</a></li>
                                <li><a href="index3.php" class="active"><i class="fa-solid fa-battery-full"></i> Monitor Tegangan dan Arus</a></li>
                                <li><a href="index5.php"><i class="fa-solid fa-solar-panel"></i> Monitor Panel Surya dan Penggunaan Beban</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="row">
                                    <!-- Detail PH -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Tegangan
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Tegangan Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data['tegangan'] ?>
                                                            V</h1>
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartTegangan" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Suhu -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Tegangan</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row['tgl'] ?></td>
                                                                <td><?php echo $row['tegangan'] ?></td>
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
                                                <!-- Tabeel Suhu -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail PH -->

                                    <!-- Detail TDS -->
                                    <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Arus
                                                </h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h3 class="">Arus Terakhir</h3>
                                                        <h1 class="mb-0 number-font"><?php echo $data['arus'] ?> A
                                                    </div>
                                                </div>
                                                <!-- Chart -->
                                                <div class="chart-container">
                                                    <canvas id="chartArus" class="h-275"></canvas>
                                                </div>
                                                <!-- Chart -->

                                                <!-- Tabel Suhu -->
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap text-md-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Arus</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if($result2->num_rows>0){
                                while($row1=$result2->fetch_assoc()){
                            ?>
                                                            <tr>
                                                                <td><?php echo $row1['tgl'] ?></td>
                                                                <td><?php echo $row1['arus'] ?></td>
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
                                                <!-- Tabel Suhu -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail TDS -->
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

//Data ChartLembab
const dataTegangan = {
    labels: labels,
    datasets: [{
        label: 'Tegangan',
        backgroundColor: 'grey',
        borderColor: 'grey',
        data: <?php echo json_encode($tegangan); ?>,
    }, ]
};
const configTegangan = {
    type: 'line',
    data: dataTegangan,
    options: {}
};
const chartTegangan = new Chart(
    document.getElementById('chartTegangan'),
    configTegangan
);

//Data Chart Suhu
const dataArus = {
    labels: labels,
    datasets: [{
        label: 'Arus',
        backgroundColor: 'red',
        borderColor: 'red',
        data: <?php echo json_encode($arus); ?>,
    }, ]
};
const configArus = {
    type: 'line',
    data: dataArus,
    options: {}
};
const chartArus = new Chart(
    document.getElementById('chartArus'),
    configArus
);
</script>

<?php include "footer_html.php"; ?>










<?php
//================================================================================================================================================


//}
?>