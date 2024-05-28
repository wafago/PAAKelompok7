<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Booking</title>
    <!-- Add SweetAlert CSS -->
    <link rel="stylesheet" href="path/to/sweetalert2.min.css">
    <!-- Add your stylesheets, Bootstrap, or other dependencies here -->
</head>

<body>

<?php
// Include the database connection file
include '../config/conn.php';

if (isset($_GET["id"])) {
    $booking_id = $_GET["id"];
    ?>

    <!-- Add SweetAlert JS -->
    <script src="path/to/sweetalert2.all.min.js"></script>

    <script>
        // Wrap the script in document ready
        document.addEventListener('DOMContentLoaded', function() {
            // Show a SweetAlert confirmation popup
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    <?php
                    $query = "DELETE FROM booking WHERE booking_id = $booking_id";
                    if (mysqli_query($conn, $query)) {
                        // Use window.location.href directly in JavaScript
                        echo "Swal.fire('Deleted!', 'The record has been deleted.', 'success').then(() => window.location.href = 'sukseshapus.php');";
                    } else {
                        echo "Swal.fire('Error!', 'Error deleting record: " . mysqli_error($conn) . "', 'error').then(() => window.location.href = 'sukseshapus.php');";
                    }
                    ?>
                } else {
                    // If the user clicks "Cancel" or closes the popup
                    Swal.fire('Cancelled', 'The record deletion has been cancelled.', 'info').then(() => window.location.href = 'admin.php');
                }
            });
        });
    </script>

<?php
} else {
    header("Location: admin.php");
    exit();
}

mysqli_close($conn);
?>

</body>

</html>
