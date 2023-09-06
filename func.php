<?php 

function get_user(){
    include('conn.php');
    $user = $_SESSION['user'];
    $sql_user = "SELECT * FROM user WHERE user='$user'";
    $result_user = $conn->query($sql_user);
    $data_user = mysqli_fetch_assoc($result_user);

    return $data_user;
}


function upload($tabel, $val1, $val2, $val3){
    include('conn.php');
    $status1 = FALSE;
    $msg    = "Terjadi kesalahan!!";
    $data   = [];

    if($tabel == 'alat_izul'){
        $sql = "INSERT INTO alat_izul (ph, tds, status) VALUES ('" . $val1 .  "', '" .$val2. "' , '". $val3 ."')";
        $name_val1 = "ph";
        $name_val2 = "tds";
    }
    
    if($tabel == 'alat_desi'){
        $sql = "INSERT INTO alat_desi (kelembaban, suhu, status) VALUES ('" . $val1 .  "', '" .$val2. "' , '". $val3 ."')";
        $name_val1 = "kelembaban";
        $name_val2 = "suhu";
    }

    if($tabel == 'alat_afif'){
        $sql = "INSERT INTO alat_afif (tegangan, arus, status) VALUES ('" . $val1 .  "', '" .$val2. "' , '". $val3 ."')";
        $name_val1 = "tegangan";
        $name_val2 = "arus";
    }
    
    if ($conn->query($sql) === TRUE) {
        $status1 = TRUE;
        $msg    = "Berhasil";
        $data   = [
            $name_val1   => $val1,
            $name_val2  => $val2,
            'status' => $val3
        ];
    } else {
        $msg    = $sql . " " . $conn->error;
    }
    $conn->close();

    
    $myArr = [
        'status' => $status1,
        'msg'    => $msg,
        'data'   => $data
    ];

    $myJSON = json_encode($myArr);

    return $myJSON;
}

function upload1($tabel, $val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9, $val10, $val11, $val12, $val13, $val14){
    include('conn.php');
    $status1 = FALSE;
    $msg    = "Terjadi kesalahan!!";
    $data   = [];

    if($tabel == 'alat_izul'){
        $sql = "INSERT INTO alat_izul (ph, tds, status) VALUES ('" . $val1 .  "', '" .$val2. "' , '". $val3 ."')";
        $name_val1 = "ph";
        $name_val2 = "tds";
    }
    
    if($tabel == 'alat_desi'){
        $sql = "INSERT INTO alat_desi (kelembaban, suhu, status) VALUES ('" . $val1 .  "', '" .$val2. "' , '". $val3 ."')";
        $name_val1 = "kelembaban";
        $name_val2 = "suhu";
    }

    if($tabel == 'alat_afif'){
        $sql = "INSERT INTO alat_afif (tegangan, arus, status) VALUES ('" . $val1 .  "', '" .$val2. "' , '". $val3 ."')";
        $name_val1 = "tegangan";
        $name_val2 = "arus";
    }
    
    if($tabel == 'alat_caca'){
        $sql = "INSERT INTO alat_caca (tegangan_dc, arus_dc, daya_dc, energi_dc, tegangan_ac, arus_ac, daya_ac, energi_ac, faktor_daya, frekuensi, suhu_pv1, suhu_pv2, suhu_pv3, status) VALUES ('" . $val1 .  "', '" .$val2. "', '". $val3 ."', '" .$val4. "', '" .$val5. "', '" .$val6. "', '" .$val7. "', '" .$val8. "', '" .$val9. "', '" .$val10. "', '" .$val11. "', '" .$val12. "', '" .$val13. "', '" .$val14. "')";
        $name_val1 = "tegangan_dc";
        $name_val2 = "arus_dc";
        $name_val3 = "daya_dc";
        $name_val4 = "energi_dc";
        $name_val5 = "tegangan_ac";
        $name_val6 = "arus_ac";
        $name_val7 = "daya_ac";
        $name_val8 = "energi_ac";
        $name_val9 = "faktor_daya";
        $name_val10 = "frekuensi";
        $name_val11 = "suhu_pv1";
        $name_val12 = "suhu_pv2";
        $name_val13 = "suhu_pv3";
    }

    if ($conn->query($sql) === TRUE) {
        $status1 = TRUE;
        $msg    = "Berhasil";
        $data   = [
            $name_val1   => $val1,
            $name_val2  => $val2,
            $name_val3  => $val3,
            $name_val4  => $val4,
            $name_val5  => $val5,
            $name_val6  => $val6,
            $name_val7  => $val7,
            $name_val8  => $val8,
            $name_val9  => $val9,
            $name_val10  => $val10,
            $name_val11  => $val11,
            $name_val12  => $val12,
            $name_val13  => $val13,
            'status' => $val14
        ];
    } else {
        $msg    = $sql . " " . $conn->error;
    }
    $conn->close();

    
    $myArr = [
        'status' => $status1,
        'msg'    => $msg,
        'data'   => $data
    ];

    $myJSON = json_encode($myArr);

    return $myJSON;
}

function detail_tabel($nama_tabel, $limit = 5, $date_filter = ''){
    include('conn.php');

    
    $sql = "SELECT * FROM $nama_tabel ORDER BY ID DESC LIMIT $limit";

    if($date_filter != ''){
        $sql = "SELECT * FROM $nama_tabel WHERE DATE(tgl) = '$date_filter' ORDER BY ID DESC LIMIT $limit";
    }   
    $result = $conn->query($sql);

    return $result;
}

function detail_chart($nama_tabel, $parameter, $limit, $start_date = '', $end_date = ''){
    include('conn.php');

    //Chart
    if($start_date != '' && $end_date != ''){
        $sqlChart = "SELECT date(tgl) as tgl, AVG($parameter) as $parameter FROM $nama_tabel WHERE DATE(tgl) >= '$start_date' AND DATE(tgl) <= '$end_date' GROUP BY DATE_FORMAT(tgl, '%Y%m%d') 
                 ORDER BY tgl DESC LIMIT $limit";
    }else{
        $sqlChart = "SELECT date(tgl) as tgl, AVG($parameter) as $parameter FROM $nama_tabel GROUP BY DATE_FORMAT(tgl, '%Y%m%d') 
                 ORDER BY tgl DESC LIMIT $limit";
    }
    $resultChart = $conn->query($sqlChart);
    
    $tgl = [];
    $value  = [];
    while ($r = mysqli_fetch_assoc($resultChart)){
  
    array_push($tgl, $r['tgl']); //memasukan data ke array
    array_push($value, $r[$parameter]);
    }

    $tgl = array_reverse($tgl); //membaik urutan data
    $value = array_reverse($value);
    //End Chart

    return ['tgl' => $tgl, 'value' => $value];
}


?>