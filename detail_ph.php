<?php
session_start();

error_reporting(0);

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}else{
    include('conn.php');
    include "func.php";
    $data_user = get_user();
    $nama_tabel = 'alat_izul';

    $result = detail_tabel($nama_tabel, 5);

    //Chart
    $chart = detail_chart($nama_tabel, 'ph', 7, $_GET['from_date'], $_GET['to_date']);
    $tgl = $chart ['tgl'];
    $ph = $chart ['value'];
    //End Chart

    
//==============================================================================================================================================
?>

<?php include "head_html.php"; ?>


<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Detail Level PH</h1>

    <a href="index.php">
        <h5>Home</h5>
    </a>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Level PH Terakhir</h3>
                <div class="card-options">
                    <form action="" class="form" method="get">
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>

                            <div class="form-group col-md-2 mb-0">
                                <div class="form-group">
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
                                <th>PH</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM alat_izul WHERE tgl BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['tgl'] ?></td>
                                                <td><?php echo $row['ph'] ?></td>
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
                                            <?php
                                        }
                                    }
                                    else{echo "Tidak ada data";}} ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Rata-rata PH Harian</h3>
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
        label: 'PH',
        backgroundColor: 'green',
        borderColor: 'green',
        data: <?php echo json_encode($ph); ?>,
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