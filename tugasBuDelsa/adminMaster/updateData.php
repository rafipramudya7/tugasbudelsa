<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengirimanbarang";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$namaBaru = $_POST['nama'];
$nomerHp = $_POST['nomerHp'];
$kelasHuruf = $_POST['kelasHuruf'];
$kelasAngka = $_POST['kelasAngka'];
$tanggal = $_POST['tanggal'];
$namaLama = $_POST['namaLama'];

// Query untuk update data
$sql = "UPDATE databasepusat SET nama = ?, nomerHp = ?, kelasHuruf = ?, kelasAngka = ?, tanggal = ? WHERE nama = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $namaBaru, $nomerHp, $kelasHuruf, $kelasAngka, $tanggal, $namaLama);

if ($stmt->execute()) {
    echo "Data berhasil diperbarui!";
} else {
    echo "Gagal memperbarui data: " . $conn->error;
}

$stmt->close();
$conn->close();

// Redirect kembali ke halaman utama setelah update
header("Location: tugasPengiriman.html");
exit;
?>
