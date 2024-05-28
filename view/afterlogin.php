<?php
session_start(); // Start the session

// Check if the user is logged in
if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
    // Access the username from the session
    $username = $_SESSION['username'];

    // The rest of your code for the afterlogin.php page
    // You can use $username as needed
} else {
    // If the user is not logged in, redirect them to the login page
    header('location: login.php');
    exit(); // Make sure to exit after a header redirect
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <!-- My Style-->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Logo Title Bar -->
    <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
    <title>Bolaraga</title>
    <style>


    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-fixed w-100">
        <div class="container">
            <a class="navbar-brand" href="#">

                <img src="../img/Group 30.png" alt="" width="30" class="d-inline-block align-text-top">
                <span style="margin-left: 10px;">BOLARAGA</span>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link active" aria-current="page" href="#hero">BERANDA</a>
                        <a class="nav-link" href="#VENUE">KATEGORI</a>
                        <a class="nav-link" href="#rekomendasi">REKOMENDASI</a>
                        <a class="nav-link" href="../booking/riwayat-pesanan.php">RIWAYAT</a>
                        <a class="nav-link" href="#footer">TENTANG KAMI</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php
                        echo '<span class="text-white me-3">Selamat datang, <strong>'.$_SESSION['username'].'</strong></span>';
                        echo '<a href="../user/logout.php" class="btn btn-danger">Logout</a>';



                        ?>
                        <!-- <img src="../img/user.png" alt="Profile" width="30" class="d-inline-block align-text-top"> -->

                    </div>
                </div>
        </div>
    </nav>


    <!-- Hero Section -->
    <section id="hero">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-6 hero-tagline my-auto">
                    <h1>Membantu Menemukan Tempat Olahraga Terbaik</h1>
                    <p><span class="fw-bold color:">BOLARAGA </span>hadir untuk memudahkan anda dalam menemukan tempat
                        olahraga terbaik yang sesuai dengan kebutuhan dan keinginan anda</p>
                    <button onclick="location.href='semua_lapangan.php'" class="button-lg-secondary"style="color:#fff">Temukan Venue</button>
                    <a href="semua_lapangan.php">
                        <img src="../img/button arrow.png" alt="">
                    </a>
                </div>
            </div>
            <!-- <img src="../img/3588-removebg 1.png" alt="" class="position-absolute end-0 bottom-0 img-hero"> -->
        </div>
    </section>
    <!-- Venue Section -->
    <section id="VENUE">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" style="color:#ab4404">
                    <h1>PILIH CABANG OLAHRAGA</h1>
                    <span class="sub-title" style="color:#000">Pilih Cabang Olahraga Yang Ingin Anda Cari</span>
                </div>
            </div>
            <div class="mx-auto my-3 px-4">
                <div class="row d-flex w-100 px-5 mx-auto ">
                    <div class=" mx-3 ms-4" style="width: 17rem;">
                        <img src="../img/basket.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <a href="lapangan_basket.php" style="text-decoration: none;">
                                <h2 class="card-text1 text-center" style="color:#333">BASKET</h2>
                            </a>
                        </div>
                    </div>
                    <div class=" mx-4" style="width: 17rem;">
                        <img src="../img/bultang.png" class="card-img-top" alt="...">
                        <div class="card-body text-left">
                            <a href="lapangan_badminton.php" style="text-decoration: none;">
                                <h2 class="card-text1 text-left" style="color:#333">BADMINTON </h2>
                            </a>
                        </div>
                    </div>
                    <div class=" mx-3" style="width: 17rem;">
                        <img src="../img/sepak.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <a href="lapangan_futsal.php" style="text-decoration: none;">
                                <h2 class="card-text1 text-center" style="color:#333">FUTSAL</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5" id="rekomendasi">
        <h2 class="fw-bold"><span class="fw-bold" style="color:#ab4404">REKOMENDASI</span> LAPANGAN</h2>
        <div class="row">
            <!-- Produk akan ditampilkan di sini -->
            <div class="mx-auto my-3 px-4">
                <div class="row d-flex w-100 px-5 mx-auto ">
                    <?php
                    include '../config/conn.php';

                    // Fetch data from the database
                    $query = "SELECT * FROM lapangan_cabor LIMIT 3";
                    $result = $conn->query($query);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $imgSrc = $row['image'];
                            $cardTitle = $row['nama_lapangan'];
                            $cardDescription = $row['alamat'];
                            $cardPrice = number_format($row['harga'], 0, ',', '.');
                            $id = $row['lapangan_id']; // Add this line to get the id
                            $cardLink = "detail_lapangan.php?lapangan_id=$id";  // Replace with the actual link
                            $linkText = "Pesan Sekarang";
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"></script>

    <div id="footer">
        <?php include 'footer-after-login.php'; ?>
    </div>


</body>

</html>