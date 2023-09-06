<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}else{
    include "conn.php";
    $user = $_SESSION['user'];
    $sql_user = "SELECT * FROM user WHERE user='$user'";
    $result_user = $conn->query($sql_user);
    $data_user = mysqli_fetch_assoc($result_user);
    
    $sql = "SELECT * FROM alat_izul ORDER BY ID DESC LIMIT 5";
    $result = $conn->query($sql);

    //Chart
    $sqlChart = "SELECT date(tgl) as tgl, AVG(tds) as tds FROM alat_izul GROUP BY DATE_FORMAT(tgl, '%Y%m%d') 
                 ORDER BY tgl DESC LIMIT 7";
    $resultChart = $conn->query($sqlChart);
    
    $tgl = [];
    $tds  = [];
    while ($r = mysqli_fetch_assoc($resultChart)){
  
    array_push($tgl, $r['tgl']); //memasukan data ke array
    array_push($tds, $r['tds']);
    }

    $tgl = array_reverse($tgl); //membaik urutan data
    $tds = array_reverse($tds);
    //End Chart
    
//==============================================================================================================================================
?>

<?php include "head_html.php"; ?>


<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Detail Level TDS</h1>

    <a href="index.php">
        <h5>Home</h5>
    </a>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Level TDS Terakhir</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap text-md-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>TDS</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['tgl'] ?></td>
                                <td><?php echo $row['tds'] ?></td>
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
                <h3 class="card-title">Rata-rata TDS Harian</h3>
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
        label: 'TDS',
        backgroundColor: 'cyan',
        borderColor: 'cyan',
        data: <?php echo json_encode($tds); ?>,
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