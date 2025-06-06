<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $waktu_kegiatan = $_POST['waktu_kegiatan'];
    $proof = $_POST['proof'];

    $sql = "INSERT INTO portofolio (nama_kegiatan, waktu_kegiatan, proof) VALUES ('$nama_kegiatan', '$waktu_kegiatan', '$proof')";
    
    if ($db->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

$db->close();
header("Location: index.php"); // Redirect back to the main page
exit();
?>
