<?php
session_start();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: ../user/login.php");
exit;
?>
