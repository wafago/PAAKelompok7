<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css"> <!-- File CSS tambahan -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
    <title>Bolaraga</title>

    <style>
        h1 {
            margin-top: 20px;
            font-size: 50;
        }
        #semualapangan h2 {
            margin-top: 20px;
            /* Atur margin sesuai kebutuhan Anda */
            font-weight: 500px;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            display: inline-block;
            width: 350px;
            /* Adjust the width as needed */
            margin: 10px;
            padding: 10px;
            text-align: left;
        }

        .card .text {
            max-height: 20px;
            overflow: hidden;
            text-align: left;
        }

        #searchInput {
            align-items: center;
            width: 700px;
            /* Adjust the width as needed */
            margin: 20px 0 20px 200px ;
            /* Center the search bar and add margin for spacing */
            padding: 10px;
            /* Add padding for a better visual appearance */
            font-size: 16px;
            /* Adjust font size if needed */
            
        }

        

        
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                var searchText = $(this).val().toLowerCase().trim();
                if (searchText.length > 0) {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: { query: searchText },
                        success: function (response) {
                            $('.products').html(response);
                        }
                    });
                } else {
                    $('.products').load('get_produk.php');
                }
            });
        });
    </script>



</head>

<body>
    <div class="container text-center">
        <h1><strong>SEMUA PRODUK YANG TERSEDIA</strong></h1>
        <div class="row">
            <div class="bar col-md-3">
                <input type="text" id="searchInput" placeholder="Cari disinii.....">
            </div>
        </div>
        <div class="row products">
            <?php if(isset($_POST['search'])) {
                $search = $_POST['search'];
                $query = "SELECT nama_lapangan
                        FROM lapangan_cabor
                        WHERE nama_lapangan LIKE '%$search%'";

                $result = mysqli_query($koneksi, $query);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        // Tampilkan informasi produk dalam bentuk card
                        $imgSrc = $row['image'];
                        $cardTitle = $row['nama_lapangan'];
                        $cardDescription = $row['alamat'];
                        $cardPrice = number_format($row['harga'], 0, ',', '.');
                        $lapangan_id = $row['lapangan_id']; // Add this line to get the id
                        $cardLink = "detail_lapangan.php?lapangan_id=$lapangan_id";  // Replace with the actual link
                        $linkText = "Pesan Sekarang";
                        include '../card_template.php';
                    }
                } else {
                    echo "<p>Lapangan tidak ditemukan.</p>";
                }
            } ?>
        </div>
    </div>
</body>

</html>