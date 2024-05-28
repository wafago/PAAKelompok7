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
    <link rel="stylesheet" href="css/styles.css">
    <!-- Logo Title Bar -->
    <link rel="icon" href="img/Group 31.png" type="image/x-icon">
    <title>Staywithme</title>
    
    <?php include('header.php');?>
    
</head>

<body>
    <!-- Navbar -->
    


    <!-- Hero Section -->
    <section id="hero">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-6 hero-tagline my-auto">
                    <h1>Membantu Menemukan Rumah Terbaik</h1>
                    <p><span class="fw-bold color:">RUMAHKU </span>hadir untuk memudahkan anda dalam menemukan tempat
                        menginap terbaik yang sesuai dengan kebutuhan dan keinginan anda</p>
                    <button onclick="location.href='before-login/semua_lapangan.php'" class="button-lg-secondary"style="color:#fff">Temukan Venue</button>
                    <a href="before-login/semua_lapangan.php">
                        <img src="img/button arrow.png" alt="">
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
                    <h1>APA YANG MAU ANDA CARI</h1>
                    <span class="sub-title" style="color:#000">Pilih sesuai kebutuhan anda</span>
                </div>
            </div>
            <div class="mx-auto my-3 px-4">
                <div class="row d-flex w-100 px-5 mx-auto ">
                    <div class=" mx-3 ms-4" style="width: 17rem;">
                        <img src="uploads/bg/kost.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <a href="before-login/lapangan_basket.php" style="text-decoration: none;">
                                <h2 class="card-text1 text-center" style="color:#333">KOST</h2>
                            </a>
                        </div>
                    </div>
                    <div class=" mx-4" style="width: 17rem;">
                        <img src="uploads/bg/homestay.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-left">
                            <a href="before-login/lapangan_badminton.php" style="text-decoration: none;">
                                <h2 class="card-text1 text-left" style="color:#333">HOMESTAY </h2>
                            </a>
                        </div>
                    </div>
                    <div class=" mx-3" style="width: 17rem;">
                        <img src="uploads/bg/vila.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <a href="before-login/lapangan_futsal.php" style="text-decoration: none;">
                                <h2 class="card-text1 text-center" style="color:#333">Vila</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"></script>

    <div id="footer">
        <?php include 'footer.php'; ?>
    </div>


</body>

</html>