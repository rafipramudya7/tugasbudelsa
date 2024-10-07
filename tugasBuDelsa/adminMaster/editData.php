<?php
$conn = new mysqli('localhost', 'root', '', 'pengirimanbarang');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM databasepusat WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }
} else {
    echo "ID tidak valid!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengiriman Barang</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS sama seperti yang digunakan pada halaman tambah data */
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Pengiriman Barang</h2>
    <form action="updateData.php" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
        
        <label for="nomerHp">Nomor HP:</label>
        <input type="text" id="nomerHp" name="nomerHp" value="<?php echo $row['nomorHp']; ?>" required>
        
        <label for="kelasHuruf">Kelas Huruf:</label>
        <input type="text" id="kelasHuruf" name="kelasHuruf" value="<?php echo $row['kelasHuruf']; ?>" required>
        
        <label for="kelasAngka">Kelas Angka:</label>
        <input type="text" id="kelasAngka" name="kelasAngka" value="<?php echo $row['kelasAngka']; ?>" required>
        
        <input type="submit" value="Update Data">
    </form>
</div>

</body>
</html>
