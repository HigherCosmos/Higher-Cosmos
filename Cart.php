<?php
    include('connection.php');

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $is_in_cart = mysqli_query($conn, "SELECT quantity FROM cart WHERE product_id = $product_id");
        $row = mysqli_fetch_assoc($is_in_cart);
        
        $product_quantity = $row['quantity'];
        
        if($product_quantity == 1){
            $delete = mysqli_query($conn, "DELETE FROM cart WHERE `cart`.`product_id` = $product_id");
            
        }
        else {
            $product_quantity -= 1;
            $delete_one = mysqli_query($conn, "UPDATE `cart` SET `quantity` = '$product_quantity' WHERE product_id = $product_id");
        }
        
    }

    $sql = "SELECT * FROM cart where name = 'test1'";
    $result = mysqli_query($conn, $sql);

    

    
    $total = mysqli_query($conn, "SELECT SUM(price * quantity) as total FROM cart");
    $sum_row = mysqli_fetch_assoc($total);
    $sum = $sum_row['total'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>   
    <link rel="stylesheet" href="HigherCosmosStyles.css">
</head>
<body onload="loadCartFromLocalStorage()">

    <header>
        <div class="navbar">
            <nav class="navbar-container">
                <h1><a href="index.php" class="home-link">Higher Cosmos</a></h1>
                <ul>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="Cart.php">Cart</a></li>
                    <li><a href="#contact" onclick="scrollToContact()">Contact</a></li>
                    <li><a href="SigninLogout.html">Signin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    
    <section id="cart">
        <h1 class="title">Your Shopping Cart</h1>
        <div id="cart-items" class="cart-items">
            <!-- Cart items will be displayed here -->
        
            <!--
                <div class="item1">
                <img class="item-image" src="images/13in1shampoo.jpg" alt="image">
                <div class="item-info">
                    <h3>Name</h3>
                    <p>Quantity: 1</p>
                    <p>Price</p>
                </div>
                <input href="Cart.php?remove=" type="submit" value="Remove" class="remove-button" id="remove-all-btn" name="remove">

            </div>
-->
            <?php
                $select_from_cart = "SELECT * FROM cart;";
                $result = mysqli_query($conn, $select_from_cart);
            
                while($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $product_name = $row['name'];
                    $product_quantity = $row['quantity'];
                    $product_image = $row['image'];
                    $price = $row['price'];
            ?>
            <div class="cart-item">
                    <img class="item-image" src=images/<?php echo $product_image?> alt='image'>
                    <div class="item-info">
                        <h3><?php echo $product_name?></h3>
                        <p>Quantity: <?php echo $product_quantity?></p>
                        <p>$<?php echo $price?></p>
                    </div>
                    <a href='Cart.php?product_id=<?php echo $row['product_id'];?>' class="remove-button" id="remove-all-btn" name="remove_cart">Remove</a>
            </div>        
             
            <?php
                }
                mysqli_close($conn);
            ?>
        </div>
        <div class="total">
            <a href="checkout.php" class="checkout_button" onclick="checkout()">Proceed to Checkout</a>
            <!--<button class="remove-button" id="remove-all-btn" onclick="clearCart()">Remove All</button>-->
            <div id="total-price">Total:$
                <?php 
                    if ($sum == 0) {
                        echo "0.00";
                    } else {
                        echo $sum;
                    }
                ?>
    </div>
        </div>
        
    </section>
    
    <!--
    <div id="productModal" class="modal">
        <div class="modal-content" id="modalContent">
             
        </div>
    </div>

    <div id="cookie" class="cookie-consent">
        <p>This website uses cookies to ensure you get the best experience on our website. <button id="cookies-btn">Accept</button></p>
    </div>
-->

    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <p>Have questions? Reach out to us at <a href="mailto:HigherCosmosSupport@gmail.com">HigherCosmosSupport@gmail.com</a></p>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Higher Cosmos. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
    <!-- <script src="cookies.js"></script> -->    
    <script>
        function scrollToContact() {
            const contactSection = document.getElementById('contact');
            const offsetTop = contactSection.offsetTop;

            // Smoothly scroll to the contact section
            window.scroll({
                top: offsetTop,
                behavior: 'smooth'
            });

            // Add pulse animation
            contactSection.classList.add('pulse');

            // Remove pulse animation
            setTimeout(() => {
                contactSection.classList.remove('pulse');
            }, 1000); // 1500 milliseconds = 1.5 seconds
        }
    </script>
</body>
</html>