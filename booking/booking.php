<?php
session_start();
include '../config/conn.php';



// Check if the 'id' parameter is present in the URL
if(isset($_GET['id']) && $_SESSION['login']) {
    $lapangan_id = $_GET['id'];
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];


    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM lapangan_cabor WHERE lapangan_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $lapangan_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        // Fetch the data
        $row = $result->fetch_assoc();

        // Store lapangan_id in session for further use
        $_SESSION['lapangan_id'] = $lapangan_id;

        // Retrieve data for form
        $imgSrc = $row['image'];
        $cardTitle = $row['nama_lapangan'];
        $harga = $row['harga'];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form Pemesanan</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/pemesanan.css"> <!-- Additional CSS file -->
            <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
            <title>Bolaraga</title>
            <style>
                /* Add your custom styles if needed */
            </style>
        </head>

        <body>

            <div class="container mt-5">
                <h2>Booking Lapangan</h2>
                <form action="proces_booking.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="lapangan_id" value="<?php echo $lapangan_id; ?>">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Penyewa:</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $username ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="harga">Nama Lapangan:</label>
                        <input type="text" name="nama_lapangan" class="form-control" value="<?php echo $cardTitle; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Sewa:</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_mulai">Waktu Mulai:</label>
                        <select name="waktu_mulai" required>
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
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi (Jam):</label>
                        <input type="number" name="durasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga per Jam:</label>
                        <input type="text" name="harga" class="form-control" value="<?php echo $harga; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="total_harga">Total Harga:</label>
                        <input type="text" name="total_harga" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Booking</button>
                </form>
            </div>

            <script>
                // Assuming the hourly price is stored in the variable 'harga'
                var hargaPerJam = <?php echo $harga; ?>;

                // Function to calculate total price
                function calculateTotalPrice() {
                    var durasi = parseFloat(document.getElementsByName("durasi")[0].value);
                    var totalHarga = isNaN(durasi) ? 0 : durasi * hargaPerJam;

                    // Round down the totalHarga to the nearest integer
                    totalHarga = Math.floor(totalHarga);

                    // Update the 'total_harga' input field
                    document.getElementsByName("total_harga")[0].value = totalHarga;
                }

                // Attach the function to the 'durasi' input's change event
                document.getElementsByName("durasi")[0].addEventListener("input", calculateTotalPrice);

                // Initial calculation on page load
                calculateTotalPrice();
            </script>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </body>

        </html>
        <?php
    } else {
        echo "Venue not found";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Invalid parameter";
}

// Close the database connection
$conn->close();
?>