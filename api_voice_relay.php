<?php
include 'conn.php';

// Data dari DB
$query = mysqli_query($conn, "SELECT * FROM `voice_penyiram` WHERE id = 1");
$result = mysqli_fetch_assoc($query);
$status = $result['status'];
$durasi = $result['durasi'];
$updated_at = $result['updated_at'];


$now = new DateTime(); // Waktu sekarang
$whenTriggered = new DateTime($updated_at); // Generate waktu as object dengan nilai = updated_at di DB
$diff = $now->diff($whenTriggered); // Hitung selisih waktu
$selisihDetik = $diff->s; // Selisih bagian detik (int)


/* 
    Jika selisih now_time dengan updated_at sudah > durasi maka Set variable status menjadi 0 dan update nilai updated_at 
*/
// if ($selisihDetik >= $durasi) {
//     $sql = "UPDATE `voice_penyiram` SET
//         `status` = 0
//     WHERE id = 1";

//     if ($conn->query($sql) === TRUE) {
//         echo "Succes update" . "<br>";
//     } else {
//         echo "Error updating record: " . $conn->error . "<br>";
//     }
//     // Close the connection
//     $conn->close();
// }

// echo "Interval : " . $selisihDetik . "<br>";
// echo $status;

/* Kalau pingin JSON pake ini, ntar echo nya dikomen semua */
$data = array(
    'durasi' => $durasi,
    'status' => $status
);
// Set the Content-Type header to JSON
header('Content-Type: application/json');
// Encode the data as JSON
$jsonData = json_encode($data);
// Output the JSON data
echo $jsonData;
