<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $waktu_kegiatan = $_POST['waktu_kegiatan'];
    $proof = $_POST['proof'];

    $sql = "UPDATE portofolio SET nama_kegiatan='$nama_kegiatan', waktu_kegiatan='$waktu_kegiatan', proof='$proof' WHERE id=$id";
    
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

$db->close();
header("Location: index.php"); // Redirect back to the main page
exit();
?>
