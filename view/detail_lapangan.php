<?php
include '../config/conn.php';

// Check if the 'id' parameter is present in the URL
if(isset($_GET['lapangan_id'])) {
    $id = $_GET['lapangan_id'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM lapangan_cabor WHERE lapangan_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        // Fetch the data and display it
        $row = $result->fetch_assoc();

        $imgSrc = $row['image'];
        $cardTitle = $row['nama_lapangan'];
        $cardDescription = $row['alamat'];
        $harga = $row['harga'];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detail Lapangan</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/styles.css"> <!-- File CSS tambahan -->
            <link rel="icon" href="../img/Group 30.png" type="image/x-icon">
            <style>
                /* Menambahkan aturan CSS untuk memperbesar ukuran teks */
                body {
                    font-size: 16px;
                    /* Ganti dengan ukuran teks yang diinginkan */
                }

                h4 {
                    font-size: 2em;
                    margin-bottom: 50px;
                    text-align: center;

                }

                h3 {
                    font-size: 3em;

                }

                p,
                strong {
                    font-size: 2em;
                    margin-bottom: 50px;
                    /* Ganti dengan ukuran teks yang diinginkan */
                }

                .detail {
                    width: 100%;
                    aspect-ratio: 16/9;
                    overflow: hidden;
                    /* Ensure the content does not overflow */
                }

                .detail img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    /* Maintain aspect ratio and cover the container */
                }
                
            </style>
        </head>

        <body>
            <div class="container mt-5">
                <h4 style="color:#ab4404"><strong>Detail Lapangan</strong></h4>
                <div class="row">
                    <div class="detail col-md-6 ratio-rate:200px">
                        <img src="<?php echo $imgSrc; ?>" class="rounded" alt="<?php echo $cardTitle; ?>">
                    </div>
                    <div class="deskripsi col-md-6">
                        <h3>
                            <?php echo $cardTitle; ?>
                        </h3>
                        <p>
                            <?php echo $cardDescription; ?>
                        </p>
                        <p>Rp.
                            <?php echo number_format($harga, 0, ',', '.'); ?> / jam
                        </p>

                        <a href="../booking/booking.php?id=<?php echo $row['lapangan_id']; ?>" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

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