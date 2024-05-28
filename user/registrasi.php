<?php
    session_start(); //untuk menyimpan session_startnya untuk login
    require "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="../css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
    <title>Bolaraga</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Daftar Akun</h1>
            <div class="input-box">
                <input type="text" placeholder="Name" name="name" id="name" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Username" name="username" id="username" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="password" id="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="login-link">
                <p>Sudah memiliki akun? <a href="login.php">Masuk</a></p>
            </div>

            <button class="btn btn-success form form-control mt-3" type="submit" name="btnregister">Daftar</button>
        </form>
        <?php
    

    if(isset($_POST["btnregister"])){
        $name = htmlspecialchars($_POST['name']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        if($password !== $confirm_password){
            ?>
            <div class="alert alert-warning" role="alert">
                Kata sandi tidak sesuai.
            </div>
            <?php
        } else {
            $query_check_username = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
            $count_data = mysqli_num_rows($query_check_username);

            if($count_data > 0){
                ?>
                <div class="alert alert-warning" role="alert">
                    Username telah digunakan.
                </div>
                <?php
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query_insert_user = mysqli_query($con, "INSERT INTO users (nama_lengkap, username, password) VALUES ('$name', '$username', '$hashed_password')");

                if($query_insert_user){
                    ?>
                    <div class="alert alert-success" role="alert">
                        Berhasil daftar, anda dapat masuk sekarang <a href="login.php">Masuk</a>.
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Gagal mendaftar, silahkan ulangi lagi.
                    </div>
                    <?php
                }
            }
        }
    }
?>

    </div>
</body>
</html>