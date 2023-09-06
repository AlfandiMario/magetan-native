<?php
include('func.php');

if( isset($_GET['tegangan_dc']) && isset($_GET['arus_dc']) && isset($_GET['daya_dc']) && isset($_GET['energi_dc']) && isset($_GET['tegangan_ac']) && isset($_GET['arus_ac']) && isset($_GET['daya_ac']) && isset($_GET['energi_ac']) && isset($_GET['faktor_daya']) && isset($_GET['frekuensi']) && isset($_GET['suhu_pv1']) && isset($_GET['suhu_pv2']) && isset($_GET['suhu_pv3']) && isset($_GET['status']) ){
    $tegangan_dc =  $_GET['tegangan_dc'];
    $arus_dc = $_GET['arus_dc'];
    $daya_dc = $_GET['daya_dc'];
    $energi_dc = $_GET['energi_dc'];
    $tegangan_ac = $_GET['tegangan_ac'];
    $arus_ac = $_GET['arus_ac'];
    $daya_ac = $_GET['daya_ac'];
    $energi_ac = $_GET['energi_ac'];
    $faktor_daya = $_GET['faktor_daya'];
    $frekuensi = $_GET['frekuensi'];
    $suhu_pv1 = $_GET['suhu_pv1'];
    $suhu_pv2 = $_GET['suhu_pv2'];
    $suhu_pv3 = $_GET['suhu_pv3'];
    $status =  $_GET['status'];

    echo upload1('alat_caca', $tegangan_dc, $arus_dc, $daya_dc, $energi_dc, $tegangan_ac, $arus_ac, $daya_ac, $energi_ac, $faktor_daya, $frekuensi, $suhu_pv1, $suhu_pv2, $suhu_pv3, $status);
}
?>