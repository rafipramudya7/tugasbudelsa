<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengirimanbarang";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$jenisBarang = $_POST['jenisbarang'];
$tanggal = date("Y-m-d H:i:s");

// Cari data di tabel databasepusat berdasarkan nama yang diinputkan
$sql = "SELECT * FROM databasepusat WHERE nama = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nama);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Data ditemukan di databasepusat
    $row = $result->fetch_assoc();
$kelasAngka = $row['kelasAngka'] . $row['kelasHuruf'];
// $kelasAngka = strval($kelasAngka);
    $kelas = $kelasAngka ;


    $nomerHp = $row['nomerHp'];
    
    // Insert ke tabel dataantrian
    $insertSql = "INSERT INTO dataantrian (nama, kelas, nomerHp, status, jenisBarang, tanggal) VALUES (?, ?, ?, 0, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("sssss", $nama, $kelas, $nomerHp, $jenisBarang, $tanggal);

    if ($insertStmt->execute()) {
        echo "Data berhasil ditambahkan ke tabel dataantrian.";
    } else {
        echo "Gagal menambahkan data: " . $conn->error;
    }

} else {
    echo "Nama tidak ditemukan di databasepusat.";
}
if ($stmt->execute()) {
    // Redirect ke halaman moderator.html setelah berhasil
    header("Location: moderator.html");
    exit();
} else {
    echo "Gagal menambahkan data: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
