<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css"> <!-- File CSS tambahan -->
    <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
    <title>Bolaraga</title>
    <style>
        #rekomendasi h2 {
            margin-top: 20px;
            /* Atur margin sesuai kebutuhan Anda */
            font-weight: 500px;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <section id="rekomendasi">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="font-weight-bold">SEMUA LAPANGAN <span class="font-weight-bold"
                            style="color:#ab4404">BASKET</span></h2>
                </div>
            </div>
            <div class="mx-auto my-3 px-4">
                <div class="row d-flex w-100 px-5 mx-auto ">
                    <?php
                    include '../config/conn.php';

                    // Fetch data from the database
                    $query = "SELECT * FROM lapangan_cabor where kategori_id = 2";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $imgSrc = $row['image'];
                            $cardTitle = $row['nama_lapangan'];
                            $cardDescription = $row['alamat'];
                            $cardPrice = number_format($row['harga'], 0, ',', '.');
                            $lapangan_id = $row['lapangan_id']; // Add this line to get the id
                            $cardLink = "detail_lapangan.php?lapangan_id=$lapangan_id";  // Replace with the actual link
                            $linkText = "Lihat";
                            include '../card_template.php';

                        }
                    } else {
                        echo "No venues found";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php

