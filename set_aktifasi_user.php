<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}else{
    include "conn.php";
    $user = $_SESSION['user'];
    $sql_user = "SELECT * FROM user WHERE user='$user' AND level='1'";
    $result_user = $conn->query($sql_user);
    $data_user = mysqli_fetch_assoc($result_user);

    if($data_user['level'] == '1'){
        $id = $_GET['id'];
        $sql_aktifasi = "UPDATE user SET status='1' WHERE id='$id'";
        $result = mysqli_query($conn, $sql_aktifasi);
        if($result){
            header("Location: admin.php");
        }else{
            echo "<script>alert('Terjadi kesalahan!')</script>";
        }
    }else{
        header("Location: index.php");
    }
}
?>