<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-fixed w-100">
    <div class="container">
        <a class="navbar-brand" href="#">

            <img src="uploads/logo/image.png" alt="" width="30" class="d-inline-block align-text-top">
            <span style="margin-left: 10px;">COZYROOM</span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link active" aria-current="page" href="#hero">BERANDA</a>
                <a class="nav-link" href="#VENUE">KATEGORI</a>
                <a class="nav-link" href="#footer">TENTANG KAMI</a>
            </div>
            <div class="d-flex">
                <form action="user/registrasi.php" method="POST">
                    <button class="button-primary">Daftar</button>
                </form>
                <form action="user/login.php" method="POST">
                    <button class="button-secondary" style="color:#fff">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</nav>