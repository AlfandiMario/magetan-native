<?php
include('func.php');

if( isset($_GET['ph']) && isset($_GET['tds']) && isset($_GET['status']) ){
    $ph =  $_GET['ph'];
    $tds = $_GET['tds'];
    $status =  $_GET['status'];

    echo upload('alat_izul', $ph, $tds, $status);
}
echo "Halo";
?>