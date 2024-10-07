<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengirimanbarang";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$nomerHp = $_POST['nomerHp'];
$status = $_POST['status'];
$jenisBarang = $_POST['jenisBarang'];


$sql = "UPDATE dataantrian SET nama = ?, kelas = ?, nomerHp = ?, jenisBarang = ? , 'status' = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssii", $nama, $kelas, $nomerHp, $jenisBarang, $status, $id);

if ($stmt->execute()) {
    echo "Data berhasil diperbaruiiii";
} else {
    echo "Error:";
}
?>