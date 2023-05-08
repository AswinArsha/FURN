<?php
session_start();

if (isset($_POST['cart_id'])) {
    // Create a new mysqli instance
    $mysqli = new mysqli("localhost", "root", "", "furn");

    // Check if the connection was successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Get the ID of the item to delete
    $id = $_POST['cart_id'];

    // Delete the item from the cart table
    $query = "DELETE FROM cart WHERE id=$id";
    mysqli_query($mysqli, $query);

    // Redirect back to the admin page
    header('Location: adminhome.php');
    exit;
}

?>
