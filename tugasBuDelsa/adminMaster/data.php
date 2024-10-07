<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengirimanbarang";
$i = 1;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM databasepusat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>nomer HP</th>
                    <th>Kelas Huruf</th>
                    <th>Kelas Angka</th>
                    <th>Tanggal</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $i. "</td>
                <td>" . $row["nama"] . "</td>
                <td>" . $row["nomerHp"] . "</td>
                <td>" . $row["kelasHuruf"] . "</td>
                <td>" . $row["kelasAngka"] . "</td>
                <td>" . $row["tanggal"] . "</td>
                <td><a href='edit.html?nama=" . $row["nama"] . "' class='edit-btn'>Edit</a></td>
                <td><button class='delete-btn' data-id='" . $row["id"] . "'>Delete</button></td>
              </tr>";
        $i++;
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada data ditemukan</p>";
}

$conn->close();
?>
