<?php
// Include the database connection file
include '../config/conn.php';

// Fetch the most recent booking details
$query = "SELECT * FROM booking ORDER BY booking_id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

// Check if there is a result
if ($result && mysqli_num_rows($result) > 0) {
    $bookingDetails = mysqli_fetch_assoc($result);
} else {
    $bookingDetails = null;
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking Successful</title>
    <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
    <title>Bolaraga</title>
    <!-- Add your stylesheets, Bootstrap, or other dependencies here -->
</head>

<body>
    <header>
        <h1>Booking Successful</h1>
        <link rel="stylesheet" href="../css/halaman_berhasil.css">
    </header>

    <main>
        <?php if ($bookingDetails) : ?>
            <h2>Booking Details</h2>
            <p><strong>Nama Penyewa:</strong> <?php echo $bookingDetails['nama_lengkap']; ?></p>
            <p><strong>Lapangan:</strong> <?php echo $bookingDetails['nama_lapangan']; ?></p>
            <p><strong>Tanggal Sewa:</strong> <?php echo date('d F Y', strtotime($bookingDetails['tanggal'])); ?></p>
            <p><strong>Waktu Mulai:</strong> <?php echo $bookingDetails['waktu_mulai']; ?></p>
            <p><strong>Durasi:</strong> <?php echo $bookingDetails['durasi']; ?></p>
            <p><strong>Total Harga:  </strong> Rp.<?php echo $bookingDetails['total_harga']; ?></p>
            <a href="../index.php">HOME</a>
            <!-- Add more details as needed -->

            <!-- You can provide links or buttons to navigate to other pages if necessary -->
        <?php else : ?>
            <p>No booking details available.</p>
        <?php endif; ?>
    </main>

    <!-- Add your scripts or other dependencies here -->
</body>

</html>
