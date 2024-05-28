<?php
session_start();
require "../config/conn.php";

if(isset($_POST['query'])) {
    $searchText = $_POST['query'];

    $query = "SELECT * FROM lapangan_cabor WHERE nama_lapangan LIKE '%$searchText%'";
    $result = mysqli_query($conn, $query);

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
}
?>