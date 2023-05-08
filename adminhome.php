<?php
// Start the session and check if the user is logged in
session_start();


// Create a new mysqli instance
$mysqli = new mysqli("localhost", "root", "", "furn");

// Check if the connection was successful
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Get all cart details
$cart_query = "SELECT c.id, c.item_name, c.price, c.created_at FROM cart c";
$cart_result = mysqli_query($mysqli, $cart_query);

// Get all order details
$order_query = "SELECT o.id, o.name, o.email, o.phone, o.address, o.created_at FROM orders o";
$order_result = mysqli_query($mysqli, $order_query);

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
    <h1>Hi Admin</h1>

    <form action="logout.php" method="POST" class="logout-form">
        <input type="hidden" name="logout" value="true">
        <button type="submit" class="logout-btn">Logout</button>
    </form>

    <h2>User Cart Details</h2>
    <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Item Name</th>
      <th>Price</th>
      <th>Created At</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while($cart_row = mysqli_fetch_assoc($cart_result)) { ?>
      <tr>
        <td><?php echo $cart_row['id']; ?></td>
        <td><?php echo $cart_row['item_name']; ?></td>
        <td><?php echo $cart_row['price']; ?></td>
        <td><?php echo $cart_row['created_at']; ?></td>
        <td>
          <form action="delete-cart-item.php" method="POST">
            <input type="hidden" name="cart_id" value="<?php echo $cart_row['id']; ?>">
            <button type="submit" class="delete-btn">Delete</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>



  <h2>User Order Details</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($order_row = mysqli_fetch_assoc($order_result)) { ?>
        <tr>
          <td><?php echo $order_row['id']; ?></td>
          <td><?php echo $order_row['name']; ?></td>
          <td><?php echo $order_row['email']; ?></td>
          <td><?php echo $order_row['phone']; ?></td>
          <td><?php echo $order_row['address']; ?></td>
          <td><?php echo $order_row['created_at']; ?></td>
          <td>
            <form action="delete-order.php" method="POST">
              <input type="hidden" name="id"  value="<?php echo $order_row['id']; ?>">
              <button type="submit" class="delete-btn">Delete</button>
            </form>
          </td>
         
        </tr>
      <?php } ?>
    </tbody>
  </table>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .delete-btn {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            cursor: pointer;
            border-radius: 3px;
        }
        .delete-btn:hover {
            background-color: #cc2e2e;
        }
    </style>
</body>

</html>