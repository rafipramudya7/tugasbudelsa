<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengirimanbarang";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id, nama, kelas, nomerHp, status, jenisBarang, tanggal FROM dataantrian";
$result = $conn->query($sql);
$id = 1;

if ($result->num_rows > 0) {
echo '<table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nomor HP</th>
                <th>Status</th>
                <th>Jenis Barang</th>
                <th>Tanggal</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>';
        
while ($row = $result->fetch_assoc()) {
    $nomer = $row['nomerHp'];
    $nomerHp = substr($nomer, 1);
    $whatsappUrl = "https://api.whatsapp.com/send/?phone=%2B62" . urlencode($nomerHp) . "&type=phone_number&app_absent=0&text=barangem ndang dijukuk bro!!";
    $status = $row['status'];
    $rowId = $row['id'];
    
    // Tentukan kelas status
    switch ($status) {
        case 0:
            $statusClass = 'status status-red';
            $statusText = 'Belum';
            break;
        case 1:
            $statusClass = 'status status-yellow';
            $statusText = 'Pending';
            break;
        case 2:
            $statusClass = 'status status-green';
            $statusText = 'Valid';
            break;
        default:
            $statusClass = 'status status-grey';
            $statusText = 'Unknown';
            break;
    }

    echo '<tr>
            <td>' . $id. '</td>
            <td>' . htmlspecialchars($row['nama']) . '</td>
            <td>' . htmlspecialchars($row['kelas']) . '</td>
            <td><a href="' . $whatsappUrl . '" class="whatsapp-button" data-id="' . $rowId . '" target="_blank">Chat</a></td>
            <td class="' . $statusClass . '">' . htmlspecialchars($statusText) . '</td>
            <td>' . htmlspecialchars($row['jenisBarang']) . '</td>
            <td>' . htmlspecialchars($row['tanggal']) . '</td>
            <td><a href="edit.html?id=' . $rowId . '" class="edit-button whatsapp-button">Edit</a></td>
          </tr>';
        $id++;
}

echo '</tbody></table>';

} else {
    echo "<p>Tidak ada data.</p>";
}

$conn->close();
?>
