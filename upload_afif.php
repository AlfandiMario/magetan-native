<?php
include('func.php');

if( isset($_GET['tegangan']) && isset($_GET['arus']) && isset($_GET['status']) ){
    $tegangan =  $_GET['tegangan'];
    $arus = $_GET['arus'];
    $status =  $_GET['status'];

    echo upload('alat_afif', $tegangan, $arus, $status);
}
?>