<?php
// Include the database connection file
include '../config/conn.php';

// Fetch all booking data
$query = "SELECT * FROM booking";
$result = mysqli_query($conn, $query);

// Check if there is a result
if ($result && mysqli_num_rows($result) > 0) {
    $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $bookings = [];
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
    <title>Bolaraga</title>
    <!-- Add your stylesheets, Bootstrap, or other dependencies here -->
</head>

<body>
    <header>
        <h1>Admin Page</h1>
    </header>

    <main>
        <?php if (!empty($bookings)) : ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nama Penyewa</th>
                        <th>Tanggal Sewa</th>
                        <th>Waktu Mulai</th>
                        <th>Durasi</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking) : ?>
                        <tr>
                            <td><?php echo $booking['nama_lengkap']; ?></td>
                            <td><?php echo date('d F Y', strtotime($booking['tanggal'])); ?></td>
                            <td><?php echo $booking['waktu_mulai']; ?></td>
                            <td><?php echo $booking['durasi']; ?> Jam</td>
                            <td>Rp. <?php echo number_format($booking['total_harga'], 0, ',', '.'); ?></td>
                            <td>
                                <a href="edit_booking.php?id=<?php echo $booking['booking_id']; ?>">Edit</a>
                                |
                                <a href="delete_booking.php?id=<?php echo $booking['booking_id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No booking data available.</p>
        <?php endif; ?>
    </main>

    <!-- Add your scripts or other dependencies here -->
</body>

</html>
