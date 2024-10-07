<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengirimanbarang";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil nama-nama dari databasepusat
$sql = "SELECT nama FROM databasepusat";
$result = $conn->query($sql);

$data = [];

if ($result === FALSE) {
    $data['error'] = $conn->error;
} else {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row['nama'];
        }
    } else {
        $data['message'] = 'Tidak ada data';
    }
}

$conn->close();

// Mengembalikan data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
