<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../uploads/logo/image.png" type="image/x-icon">
    <title>Staywithme</title>
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Masuk CozyRoom</h1>
            <div class="input-box">
                <input type="text" placeholder="username" name="username" id="username" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="password" name="password" id="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <button class="btn btn-success form form-control mt-3" type="submit" name="btnlogin">Masuk</button>

            <div class="register-link">
                <p>Belum memiliki akun? <a href="registrasi.php">Daftar sekarang</a></p>
            </div>
        </form>
    </div>
</body>

</html>