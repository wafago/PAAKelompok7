<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    session_start(); // untuk menyimpan session_startnya untuk login
    require "../config/koneksi.php"; // menggunakan relative path
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/Group 31.png" type="image/x-icon">
    <title>Bolaraga</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Masuk Bolaraga</h1>
            <div class="input-box">
                <input type="text" placeholder="username" name="username" id="username"
                required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="password" name="password" id="password"
                required>
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <button class="btn btn-success form form-control mt-3" type="submit" name="btnlogin">Masuk</button>

            <div class="register-link">
                <p>Belum memiliki akun? <a href="registrasi.php">Daftar sekarang</a></p>
            </div>
        </form>
        <!-- backend -->
        <div class="mt-3">
            <?php
                if(isset($_POST["btnlogin"])){
                    $username =htmlspecialchars($_POST['username']);
                    $password =htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'"); //untuk menampung di dalam $query, yang didalamnya dikonekkan kedalam $con trs dimasukkan querynya untuk memastikan apakah username yang dimasukkan sama dengan db
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);

                    if($countdata> 0){
                        if (password_verify($password, $data['password'])) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['user_id'] = $row['user_id'];
                            $_SESSION['login'] = true;
                            if ($username === "admin" && $password === "admin123") {
                                // Jika login sebagai admin, arahkan ke halaman admin
                                header('location: ../admin/admin.php');
                            } else {
                                // Jika login sebagai pengguna biasa, arahkan ke halaman landing
                                header('location: ../view/afterlogin.php');
                            }
                        }

                        else{
                            ?>
                            <div class="alert alert-warning" role="alert">
                                    Password Salah
                            </div>
                            <?php
                        }
                    }
                    else{
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Akun tidak Tersedia
                    </div>
                    <?php
                    }
                }
                
            ?>
        </div>
    </div>
</body>
</html>
