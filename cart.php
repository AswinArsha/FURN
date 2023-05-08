


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart | Furn</title>
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
    <div class="container">
      <div class="navbar">
        <div class="logo">
        <a href="index.php"
            ><img src="images/OIP.jfif" width="80px" alt=""
          /></a>
        </div>
        <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="#footer">About</a></li>
              <li><a href="admin.php">Admin</a></li>
              <li><a href="cart.php">
                <img src="images/cart.png" width="30px " height="30px" alt="" /></a></li>
               
            </ul>
          </nav>
      </div>
    </div>

    <!-- cart item details -->
    <div class="small-container cart-page">
  <table id="cart-table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th></th>
      </tr>
    </thead>
    <tbody></tbody>
    <tfoot>
      <tr>
        <td colspan="3">Total:</td>
        <td id="cart-total"></td>
      
        
      </tr>
    </tfoot>
    
  </table>
  
   
</div>


<!-- User details form -->
<form id="user-details-form" action="add-to-orders.php" method="POST">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" required>
  
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required>
  
  <label for="phone">Phone:</label>
  <input type="text" name="phone" id="phone" required>
  
  <label for="address">Address:</label>
  <textarea name="address" id="address" required></textarea>
  <p>Payment Method</p>
    <label for="paypal">
      
      <img src="\Furn\images\IMG-20230418-WA0032.jpg" alt="qr" width="500">
    </label>
  <button type="submit" name="submit" id="buy-button" >      <i class="fas fa-shopping-cart"></i>Place order</button>
</form>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  <button type="submit" name="buy" id="buy-buttons" style="display: none;">
    <i class="fas fa-shopping-cart"></i> Buy
  </button>
</form>

    <!-- footer -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-4">
            <h3>Follow Us</h3>
            <ul>
              <li>Facebook</li>
              <li>Twitter</li>
              <li>Instagram</li>
            </ul>
          </div>
          <div class="footer-col-4">
            <h3>Contact Us</h3>
            <ul>
              <li>Email: info@yourcompany.com</li>
              <li>Phone:</li>
              <li>Address:</li>
            </ul>
          </div>
          <div class="footer-col-4">
          <h3>Our Team</h3>
                <ul>
                    <li>Krishnendhu T S</li>
                    <li>Aswathy K S</li>
                    <li>Archa A</li>
                    <li>Anagha Rajeev</li>
                    <li>Amrutha Ashokan</li>
                </ul>
          </div>
          <div class="footer-col-4">
            <h3>Legal</h3>
            <ul>
              <li>Privacy Policy</li>
              <li>Terms and Conditions</li>
              <li>Cookie Policy</li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="text-center">
          &copy; 2023 Your Company. All Rights Reserved.
        </p>
      </div>
    </div>

    <script>
function displayCart() {
  const cart = JSON.parse(localStorage.getItem("cart") || "[]");
  const table = document.querySelector("#cart-table");

  // Clear the table
  table.innerHTML = `
    <tr>
      <th>Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Subtotal</th>
      <th></th>
    </tr>
  `;

  // Add each product to the table
  cart.forEach(product => {
    const row = table.insertRow(-1);
    const imageCell = row.insertCell(0);
    const infoCell = row.insertCell(1);
    const quantityCell = row.insertCell(2);
    const subtotalCell = row.insertCell(3);
    const removeCell = row.insertCell(4);
    const removeButton = document.createElement("button");

    imageCell.innerHTML = `<img src="${product.image}" alt="${product.name}" />`;
    infoCell.innerHTML = `<p>${product.name}</p><small>Price: ${product.price}</small>`;
    quantityCell.innerHTML = `
  <button class="btn-quantity" onclick="decrementQuantity('${product.name}')">-</button>
  <span>${product.quantity}</span>
  <button class="btn-quantity" onclick="incrementQuantity('${product.name}')">+</button>
`;
    subtotalCell.textContent = `₹${product.subtotal.toFixed(2)}`;
    removeButton.textContent = "Remove";
    removeButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
removeButton.classList.add("btn-remove");
    removeButton.addEventListener("click", () => {
      removeFromCart(product.name);
      displayCart();
    });
    removeCell.appendChild(removeButton);
  });

  // Add total row to the table
  const totalRow = table.insertRow(-1);
  totalRow.innerHTML = `
    <td colspan="3">Total:</td>
    <td colspan="2" class="bold">₹${cart.reduce((total, product) => total + product.subtotal, 0).toFixed(2)}</td>
  `;
}


function removeFromCart(name) {
  const cart = JSON.parse(localStorage.getItem("cart") || "[]");
  for (let i = 0; i < cart.length; i++) {
    if (cart[i].name === name) {
      cart.splice(i, 1);
      break;
    }
  }
  localStorage.setItem("cart", JSON.stringify(cart));
}

function incrementQuantity(name) {
  const cart = JSON.parse(localStorage.getItem("cart") || "[]");
  for (let i = 0; i < cart.length; i++) {
    if (cart[i].name === name) {
      cart[i].quantity++;
      cart[i].subtotal =
        cart[i].quantity *
        parseFloat(cart[i].price.replace(/[^0-9\.]/g, ""));
      break;
    }
  }
  localStorage.setItem("cart", JSON.stringify(cart));
  displayCart();
}

function decrementQuantity(name) {
  const cart = JSON.parse(localStorage.getItem("cart") || "[]");
  for (let i = 0; i < cart.length; i++) {
    if (cart[i].name === name) {
      if (cart[i].quantity === 1) {
        cart.splice(i, 1);
      } else {
        cart[i].quantity--;
        cart[i].subtotal =
          cart[i].quantity *
          parseFloat(cart[i].price.replace(/[^0-9\.]/g, ""));
      }
      break;
    }
  }
  localStorage.setItem("cart", JSON.stringify(cart));
  displayCart();
};
const buyButton = document.getElementById("buy-buttons");
if (buyButton) {
  buyButton.addEventListener("click", () => {
    alert("Your order has been placed!");
    localStorage.removeItem("cart");
    displayCart();
  });
} else {
  console.error("Could not find element with ID 'buy-button'");
}

window.onload = () => {
  displayCart();


};



    </script>
  </body>
</html>
