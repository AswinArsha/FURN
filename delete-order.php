<?php
session_start();

if (isset($_POST['id'])) {
  // Create a new mysqli instance
  $mysqli = new mysqli("localhost", "root", "", "furn");

  // Check if the connection was successful
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  // Escape the user input using mysqli_real_escape_string()
  $id = mysqli_real_escape_string($mysqli, $_POST['id']);

  // Delete order from orders table
  $query = "DELETE FROM orders WHERE id='$id'";
  mysqli_query($mysqli, $query);

  // Redirect to admin page
  header('Location: adminhome.php');
  exit;
}
?>
