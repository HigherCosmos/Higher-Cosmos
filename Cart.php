<?php
    include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>   
    <link rel="stylesheet" type="text/css" href="HigherCosmosStyles.css">
</head>
<body onload="loadCartFromLocalStorage()">

    <header>
        <div class="navbar">
            <nav class="navbar-container">
                <h1>Higher Cosmos</h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="Cart.php">Cart</a></li>
                    <li><a href="#contact" onclick="scrollToContact()">Contact</a></li>
                    <li><a href="Info.html">Info</a></li>    
                    <li><a href="SigninLogout.html">Signin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    
    <section id="cart">
        <h1 class="title">Your Shopping Cart</h1>
        <div id="cart-items" class="cart-items">
            <!-- Cart items will be displayed here -->

            <?php
                $sql = "SELECT * FROM cart;";
                $result = mysqli_query($conn, $sql);
            
                while($row = mysqli_fetch_assoc($result)) {
                    $product_name = $row['name'];
                    $product_quantity = $row['quantity'];
                    $product_image = $row['image'];
                    $price = $row['price'];
            ?>
                    <img src=images/<?php echo $product_image?> alt='13in1' style='width: 150px; height: 150px;'>
                    <h3><?php echo $product_name?></h3>
                    <p>Quantity: <?php echo $product_quantity?></p>
                    <p>$<?php echo $price?></p>
            
            <?php
                }
            ?>
        </div>
        <div class="total">
            <div id="total-price"></div>
            <a href="checkout.php" class="checkout_button" onclick="checkout()">Proceed to Checkout</a>
            <button class="remove-button" id="remove-all-btn" onclick="clearCart()">Remove All</button>
        </div>
    </section>

    <div id="productModal" class="modal">
        <div class="modal-content" id="modalContent">
            <!-- Modal content goes here -->
        </div>
    </div>

    <div id="cookie" class="cookie-consent">
        <p>This website uses cookies to ensure you get the best experience on our website. <button id="cookies-btn">Accept</button></p>
    </div>

    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <p>Have questions? Reach out to us at <a href="mailto:HigherCosmosSupport@gmail.com">HigherCosmosSupport@gmail.com</a></p>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Higher Cosmos. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
    <!-- <script src="cookies.js"></script> -->    
</body>
</html>