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

$sql = "DELETE FROM databasepusat WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapuss";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
