<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}else{
    
    include('conn.php');
    include "func.php";
    $data_user = get_user();
    $nama_tabel = 'alat_desi';
    $limit_table = 5;
    if(isset($_GET['limit_table'])){
        $limit_table = $_GET['limit_table'];
    }

    $limit_chart = 7;
    if(isset($_GET['limit_chart'])){
        $limit_chart = $_GET['limit_chart'];
    }

    $result = detail_tabel($nama_tabel, $limit_table, $_GET['date_filter']);

    //Chart
    $chart = detail_chart($nama_tabel, 'kelembaban', $limit_chart, $_GET['from_date'], $_GET['to_date']);
    $tgl = $chart ['tgl'];
    $kelembaban = $chart ['value'];
    //End Chart
    
//==============================================================================================================================================
?>

<?php include "head_html.php"; ?>


<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Detail Kelembaban</h1>

    <a href="index.php">
        <h5>Home</h5>
    </a>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Level Kelembaban Terakhir</h3>
                <div class="card-options">
                    <form action="" class="form" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Limit</label>
                                    <input type="number" name="limit_table" min="1" value="<?php echo $limit_table; ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date_filter"
                                        value="<?php if(isset($_GET['date_filter'])){ echo $_GET['date_filter']; } ?>"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group col-md-2 mb-0">
                                <div class="form-group">
                                    <label>-</label>
                                    <button class="btn btn-info" type="submit">Cari</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap text-md-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kelembaban</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['tgl'] ?></td>
                                <td><?php echo $row['kelembaban'] ?></td>
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
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kelembaban Harian</h3>
                <div class="card-options">
                    <form action="" class="form" method="get">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Limit</label>
                                    <input type="number" name="limit_chart" min="1" value="<?php echo $limit_chart; ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>From Date</label>
                                    <input type="date" name="from_date"
                                        value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>To Date</label>
                                    <input type="date" name="to_date"
                                        value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group col-md-2 mb-0">
                                <div class="form-group">
                                    <label>-</label>
                                    <button class="btn btn-info form-control" type="submit">Cari</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="myChart" class="h-275"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- COL END -->

</div>


<!-- CHARTS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
//myChart
const labels = <?php echo json_encode($tgl); ?>;

//Data Chart
const data = {
    labels: labels,
    datasets: [{
        label: 'Kelembaban',
        backgroundColor: 'grey',
        borderColor: 'grey',
        data: <?php echo json_encode($kelembaban); ?>,
    }, ]
};

//Pengaturan tipe dan data chart Izul
const config = {
    type: 'line',
    data: data,
    options: {}
};

//Membuat chart Izul
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
</script>





<?php include "footer_html.php"; ?>










<?php
//================================================================================================================================================


}
?>