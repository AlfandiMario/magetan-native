<?php
include 'conn.php';
ini_set('date.timezone', 'Asia/Jakarta');
$now = new DateTime();

if (isset($_POST['durasi']) && isset($_POST['state'])) {
    // Set variable status menjadi 1 dan update durasi sesuai post request
    $status = $_POST['state'];
    $durasi = $_POST['durasi'];
    $updated = $now->format('Y-m-d H:i:s');

    $sql = "UPDATE `voice_penyiram` SET
        `status` = $status,
        `durasi` = $durasi,
        `updated_at` = '$updated' 
    WHERE id = 1;";


    if ($conn->query($sql) === TRUE) {
        echo "Succes update";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else if (isset($_POST['state'])) {
    // Set variable status menjadi 1 dan updated timestamp
    $status = $_POST['state'];
    $updated = $now->format('Y-m-d H:i:s');

    $sql = "UPDATE `voice_penyiram` SET
        `status` = $status,
        `updated_at` = '$updated' 
    WHERE id = 1;";


    if ($conn->query($sql) === TRUE) {
        echo "Succes update";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
