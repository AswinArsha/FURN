
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
  $username = mysqli_real_escape_string($mysqli, $_POST['username']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);

  // Query the database for the admin user
  $query = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($mysqli, $query);

  // Check if the admin user exists
  if (mysqli_num_rows($result) == 1) {
    // Set the session variables and redirect to the admin home page
    $_SESSION['admin_username'] = $username;
    header('Location: adminhome.php');
    exit;
  }

  // If the admin user doesn't exist or the password is incorrect, show an error message
  $error_message = "Invalid username or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Furn</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>



   
<!-- account page -->
<div class="account-page">
    <div class="container">
        
        <div class="row">
            <div class="col-2">
                <img src="images/chair-png-40524.png" width="300px" alt="">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span>Admin </span>
                    </div>
                    <?php if (isset($error_message)) { ?>
      <p><?php echo $error_message; ?></p>
    <?php } ?>
   
    <form action="admin.php" method="POST">
  <input type="text" name="username" id="username" placeholder="admin name" required>
  <input type="password" name="password" id="password" placeholder="Password" required>
  <button type="submit" name="submit" class="btn">Login</button>
</form>     
                    
                </div>
            </div>
        </div>
    </div>
</div>

  
   

  </body>
</html>
