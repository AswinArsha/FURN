<?php
session_start();

if (isset($_POST['submit'])) {
  // Create a new mysqli instance
  $mysqli = new mysqli("localhost", "root", "", "furn");

  // Check if the connection was successful
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  // Escape the user input using mysqli_real_escape_string()
  $name = mysqli_real_escape_string($mysqli, $_POST['name']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
  $address = mysqli_real_escape_string($mysqli, $_POST['address']);


  // Insert order into orders table
  $query = "INSERT INTO orders (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
  mysqli_query($mysqli, $query);

  // Unset cart session and redirect to order success page

    unset($_SESSION['cart']);
    unset($_SESSION['cart_total']);
    header('Location: order-success.php');
    exit;

}
?>
