<?php
// Include the database connection file
session_start();
include '../config/conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $lapangan_id = $_POST["lapangan_id"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $nama_lapangan = $_POST["nama_lapangan"];
    $tanggal = $_POST["tanggal"];
    $waktu_mulai = $_POST["waktu_mulai"];
    $durasi = $_POST["durasi"];
    $total_harga = $_POST["total_harga"];

    // Sanitize and validate input (you might want to add more validation)
    $lapangan_id = mysqli_real_escape_string($conn, $lapangan_id);
    $nama_lengkap = mysqli_real_escape_string($conn, $nama_lengkap);
    $nama_lapangan = mysqli_real_escape_string($conn, $nama_lapangan);
    $tanggal = mysqli_real_escape_string($conn, $tanggal);
    $waktu_mulai = mysqli_real_escape_string($conn, $waktu_mulai);
    $durasi = mysqli_real_escape_string($conn, $durasi);
    $total_harga = mysqli_real_escape_string($conn, $total_harga);

    // Insert the data into the database
    $query = "INSERT INTO booking (lapangan_id, nama_lengkap, nama_lapangan, tanggal, waktu_mulai, durasi, total_harga)
              VALUES ('$lapangan_id', '$nama_lengkap', '$nama_lapangan', '$tanggal', '$waktu_mulai', $durasi, $total_harga)";

    if (mysqli_query($conn, $query)) {
        // Booking successful, redirect to another page
        header("Location: halaman_sukses.php");
        exit(); // Important to ensure no further output is sent
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
