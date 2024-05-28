<?php
// Include the database connection file
include '../config/conn.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST["booking_id"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $tanggal = $_POST["tanggal"];
    $waktu_mulai = $_POST["waktu_mulai"];
    $durasi = $_POST["durasi"];
    $total_harga = $_POST["total_harga"];

    $query = "UPDATE booking
          SET nama_lengkap='$nama_lengkap', tanggal='$tanggal', waktu_mulai='$waktu_mulai', durasi='$durasi', total_harga='$total_harga'
          WHERE booking_id=$booking_id";


    if(mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error updating record: ".mysqli_error($conn);
    }
}

if(isset($_GET["id"])) {
    $booking_id = $_GET["id"];
    $query = "SELECT * FROM booking WHERE booking_id = $booking_id";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $bookingDetails = mysqli_fetch_assoc($result);
    } else {
        $bookingDetails = null;
    }
} else {
    header("Location: admin.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="../css/edit_booking.css">
    <!-- Add your stylesheets, Bootstrap, or other dependencies here -->
</head>

<body>
    <header>
        <h1>Edit Booking</h1>
        <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
        <title>Bolaraga</title>
    </header>

    <main>
        <?php if($bookingDetails): ?>
            <form action="edit_booking.php" method="post">
                <input type="hidden" name="booking_id" value="<?php echo $bookingDetails['booking_id']; ?>">
                <label for="nama_lengkap">Nama Penyewa:</label>
                <input type="text" name="nama_lengkap" value="<?php echo $bookingDetails['nama_lengkap']; ?>" required>
                <label for="tanggal">Tanggal Sewa:</label>
                <input type="date" name="tanggal" value="<?php echo $bookingDetails['tanggal']; ?>" required>
                <label for="waktu_mulai">Waktu Mulai:</label>
                <select name="waktu_mulai" value="<?php echo $bookingDetails['waktu_mulai']; ?>" required>
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                    <option value="21:00">21:00</option>
                    <option value="22:00">22:00</option>
                    <!-- Add more options as needed -->
                </select>
                <label for="durasi">Durasi (Jam):</label>
                <input type="text" name="durasi" value="<?php echo $bookingDetails['durasi']; ?>" required>
                <label for="total_harga">Total Harga:</label>
                <input type="text" name="total_harga" value="<?php echo $bookingDetails['total_harga']; ?>" required>

                <input type="submit" value="Update Booking">
            </form>
        <?php else: ?>
            <p>No booking details available.</p>
        <?php endif; ?>
    </main>

    <!-- Add your scripts or other dependencies here -->
</body>

</html>