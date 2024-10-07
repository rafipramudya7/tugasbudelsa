<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengirimanbarang";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form (pastikan input name pada form HTML sesuai dengan variabel di sini)
$nama = $_POST['nama'];
$nomerHp = $_POST['nomerHp'];
$kelasHuruf = $_POST['kelasHuruf'];
$kelasAngka = $_POST['kelasAngka'];
$tanggal = date('Y-m-d'); // Ambil tanggal saat ini

// Buat query untuk menambahkan data tanpa menyertakan kolom `gambar`
$sql = "INSERT INTO databasepusat (nama, nomerHp, kelasHuruf, kelasAngka, tanggal) 
VALUES ('$nama', '$nomerHp', '$kelasHuruf', '$kelasAngka', '$tanggal')";

// Jalankan query dan cek apakah berhasil
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan ke database.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();

// Redirect ke halaman tugasPengiriman.html setelah data berhasil ditambahkan
header("Location: tugasPengiriman.html");
exit();
?>
