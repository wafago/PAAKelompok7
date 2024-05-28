<?php
session_start();
if (!isset($_SESSION['user_id'])|| empty($_SESSION['user_id'])){
    header('location: login.php');
    exit();
}
//jika status login $_session ==false maka, header ini akan memindahkan location nya di login.php(wajib login dulu)
$user_id = $_SESSION["user_id"];
?>