<?php
session_start();



if (isset($_POST['buy'])) {
  // Create a new mysqli instance
  $mysqli = new mysqli("localhost", "root", "", "furn");

  // Check if the connection was successful
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  // Escape the user input using mysqli_real_escape_string()
  $item_name = mysqli_real_escape_string($mysqli, $_POST['name']);
  $price = mysqli_real_escape_string($mysqli, $_POST['price']);
  // Insert item into cart table
  $query = "INSERT INTO cart (item_name, price) VALUES ('$item_name', '$price')";
  mysqli_query($mysqli, $query);

  // Set success message and redirect to cart page
  $_SESSION['success'] = "Item added to cart!";
  header('Location: cart.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products | Furn</title>
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

    <div class="small-container">
      <h2>All products</h2>

      <h2 class="title">Beds</h2>
      <div class="row">
        <div class="col-4">
          <img
            src="images/pexels-naim-benjelloun-2029731.jpg"
            alt="Bed"
            data-image="images/pexels-naim-benjelloun-2029731.jpg"
            data-name="Bed"
            data-price="₹5000.00"
          />
          <h4>Bed 2</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <div class="price-cart">
            <p>₹5000.00</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="hidden" name="name" value="Bed 2">
      <input type="hidden" name="price" value="₹5000.00">
      <button type="submit" class="btn"  name="buy" onclick="addToCart(event)">
     Add to Cart
</button>

    </form>
  </div>
</div>

        <div class="col-4">
          <img
            src="images/pexels-jean-van-der-meulen-1543439.jpg"
            alt="Bed3"
            data-image="images/pexels-jean-van-der-meulen-1543439.jpg"
            data-name="Bed3"
            data-price="₹6500.00"
          />
          <h4>Bed 3</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <div class="price-cart">
            <p>₹6500.00</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="hidden" name="name" value="Bed 3">
      <input type="hidden" name="price" value="₹6500.00">
      <button type="submit" class="btn"  name="buy" onclick="addToCart(event)">
     Add to Cart
</button>

    </form>
  </div>
</div>
        <div class="col-4">
          <img
            src="
          images/pexels-vecislavas-popa-1571450.jpg"
            alt="Bed"
            data-image="images/pexels-vecislavas-popa-1571450.jpg"
            data-name="Bed4"
            data-price="₹3700.00"
          />
          <h4>Bed 4</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <div class="price-cart">
            <p>₹6300.00</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="hidden" name="name" value="Bed 4">
      <input type="hidden" name="price" value="₹6300.00">
      <button type="submit" class="btn"  name="buy" onclick="addToCart(event)">
     Add to Cart
</button>

    </form>
  </div>
</div>
        <div class="col-4">
          <img
            src="images/pexels-vecislavas-popa-1743231.jpg"
            alt="Bed"
            data-image="images/pexels-vecislavas-popa-1743231.jpg"
            data-name="Bed2"
            data-price="₹6300.00"
          />
          <h4>Bed</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <div class="price-cart">
            <p>₹6300.00</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="hidden" name="name" value="Ned">
      <input type="hidden" name="price" value="₹6300.00">
      <button type="submit" class="btn"  name="buy" onclick="addToCart(event)">
     Add to Cart
</button>

    </form>
  </div>
</div>
      </div>
    </div>

    <div class="small-container">
      <h2 class="title">Sofa</h2>
      <div class="row">
        <div class="col-4">
          <img
            src="
          images/pexels-martin-péchy-1866149.jpg"
            alt="sofa"
            data-image="images/pexels-martin-péchy-1866149.jpg"
            data-name="sofa"
            data-price="₹3700.00"
          />
          <h4>sofa</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <div class="price-cart">
            <p>₹6300.00</p>
            <a href="#" class="btn" onclick="addToCart(event)">Add To Cart</a>
          </div>
        </div>
        <div class="col-4">
          <img
            src="
          images/pexels-andrea-piacquadio-3757055.jpg"
            alt="sofa2"
            data-image="images/pexels-andrea-piacquadio-3757055.jpg"
            data-name="sofa 2"
            data-price="₹5700.00"
          />
          <h4>sofa 2</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <div class="price-cart">
            <p>₹5700.00</p>
            <a href="#" class="btn" onclick="addToCart(event)">Add To Cart</a>
          </div>
        </div>
        <div class="col-4">
          <img
            src="images/pexels-rachel-claire-4846097.jpg"
            alt="sofa"
            data-image="images/pexels-rachel-claire-4846097.jpg"
            data-name="Lounge Chair 1"
            data-price="₹6900.00"
          />
          <h4>sofa 3</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <div class="price-cart">
            <p>₹6900.00</p>
            <a href="#" class="btn" onclick="addToCart(event)">Add To Cart</a>
          </div>
        </div>
        <div class="col-4">
          <img
            src="images/pexels-pixabay-276566.jpg"
            alt="sofa 4"
            data-image="images/pexels-pixabay-276566.jpg"
            data-name="sofa 4"
            data-price="₹9700.00"
          />
          <h4>sofa</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <div class="price-cart">
            <p>₹9700.00</p>
            <a href="#" class="btn" onclick="addToCart(event)">Add To Cart</a>
          </div>
        </div>
      
      </div>
      <h2 class="title">Lounge Chairs</h2>
      <div class="row">
      <div class="col-4">
  <img src="images/pexels-pixabay-276534.jpg" alt="sofa"
  data-image="images/pexels-pixabay-276534.jpg"
  data-name="Lounge Chair 1"
  data-price="₹5000.00"
  />
  <h4>Lounge Chair 1</h4>
  <div class="rating">
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-solid fa-star"></i>
    <i class="fa-regular fa-star"></i>
  </div>
  <div class="price-cart">
    <p>₹5000.00</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="hidden" name="name" value="Lounge Chair 1">
      <input type="hidden" name="price" value="₹5000.00">
      <button type="submit" class="btn"  name="buy" onclick="addToCart(event)">
     Add to Cart
</button>

    </form>
  </div>
</div>
        <div class="col-4">
          <img src="images/pexels-alexander-zvir-3705539.jpg" alt="sofa"
          data-image="images/pexels-alexander-zvir-3705539.jpg"
          data-name="Lounge Chair 2"
          data-price="₹5800.00"
        />
          <h4>Lounge Chair 2</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <div class="price-cart">
            <p>₹5800.00</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="hidden" name="name" value="Lounge Chair 2">
      <input type="hidden" name="price" value="₹5800.00">
      <button type="submit" class="btn"  name="buy" onclick="addToCart(event)">
     Add to Cart
</button>

    </form>
  </div>
</div>
        <div class="col-4">
          <img src="images/pexels-houzlook-com-3356416.jpg" alt="sofa"
          data-image="images/pexels-houzlook-com-3356416.jpg"
          data-name="Lounge Chair 3"
          data-price="₹2300.00"
        />
          <h4>Lounge Chair 3</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <div class="price-cart">
            <p>₹2300.00</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="hidden" name="name" value="Lounge Chair 3">
      <input type="hidden" name="price" value="₹2300.00">
      <button type="submit" class="btn"  name="buy" onclick="addToCart(event)">
     Add to Cart
</button>

    </form>
  </div>
</div>
        <div class="col-4">
          <img src="images/pexels-pixabay-276534.jpg" alt="sofa"
          data-image="images/pexels-pixabay-276534.jpg"
          data-name="Lounge Chair 4"
          data-price="₹4300.00"
        />
          <h4>Lounge Chair 4</h4>
          <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <div class="price-cart">
            <p>₹4300.00</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="hidden" name="name" value="Lounge Chair 4">
      <input type="hidden" name="price" value="₹4300.00">
      <button type="submit" class="btn"  name="buy" onclick="addToCart(event)">
     Add to Cart
</button>

    </form>
  </div>
</div>
        
        </div>
      </div>
    </div>

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
      function addToCart(event) {
        // Get the product information from the data attributes of the clicked element
        const image = event.target.closest(".col-4").querySelector("img")
          .dataset.image;
        const name = event.target.closest(".col-4").querySelector("img")
          .dataset.name;
        const price = event.target.closest(".col-4").querySelector("img")
          .dataset.price;

        // Calculate the subtotal
        const subtotal = parseFloat(price.replace(/[^0-9\.]/g, ""));

        // Add the product to the cart
        const cart = JSON.parse(localStorage.getItem("cart") || "[]");
        let found = false;
        for (let i = 0; i < cart.length; i++) {
          if (cart[i].name === name) {
            cart[i].quantity++;
            cart[i].subtotal = cart[i].quantity * subtotal;
            found = true;
            break;
          }
        }
        if (!found) {
          cart.push({
            image: image,
            name: name,
            price: price,
            quantity: 1,
            subtotal: subtotal,
          });
        }
        localStorage.setItem("cart", JSON.stringify(cart));

        // Redirect to cart page
        window.location.href = "cart.php";
      }
    </script>
  </body>
</html>
