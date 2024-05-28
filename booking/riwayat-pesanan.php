<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include '../config/conn.php';

$username = $_SESSION['username'];
$query = "SELECT * FROM booking
          WHERE nama_lengkap = ?   
          ORDER BY booking_id DESC";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Riwayat Pesanan - Bolaraga</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="fw-bold"><span class="fw-bold" style="color:#ab4404">RIWAYAT PESANAN</span></h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Booking ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['booking_id']}</td>";
                    echo "<td>{$row['nama_lengkap']}</td>";
                    echo "<td>{$row['nama_lapangan']}</td>";
                    echo "<td>{$row['tanggal']}</td>";
                    echo "<td>{$row['waktu_mulai']}</td>";
                    echo "<td>{$row['durasi']}</td>";
                    $formattedTotalHarga = "Rp. " . number_format($row['total_harga'], 0, ',', '.');
                    echo "<td>{$formattedTotalHarga}</td>";                    
                    echo "</tr>";
                }

                if (mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='7'>Tidak ada data pesanan.</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"></script>
</body>

</html>
