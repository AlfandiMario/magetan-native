<?php
include('func.php');

if( isset($_GET['kelembaban']) && isset($_GET['suhu']) && isset($_GET['status']) ){
    $kelembaban =  $_GET['kelembaban'];
    $suhu = $_GET['suhu'];
    $status =  $_GET['status'];

    echo upload('alat_desi', $kelembaban, $suhu, $status);
}
echo "Halo"
?>