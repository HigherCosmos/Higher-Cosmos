<?php
    include_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Higher Cosmos</title>
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
                    <li><a href="Cart.html">Cart</a></li>
                    <li><a href="#contact" onclick="scrollToContact()">Contact</a></li>
                    <li><a href="Info.html">Info</a></li>    
                    <li><a href="SigninLogout.html">Signin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home">
        <h2>Welcome to Higher Cosmos</h2>
        <p>Discover a higher level of beauty with our premium cosmetic products.</p>
        
        <!-- Update the search input and add an element for the sorry message -->
        <!--<input type="text" id="searchInput" placeholder="Search for products..." oninput="searchProducts(event)" onkeydown="searchProducts(event)">
        <p id="sorryMessage" style="display: none;">Sorry, no matching products found.</p>
    </section> -->

    <form id="searchForm" action="search.php" method="post">
    <input type="text" id="searchInput" name="query" placeholder="Search...">
    <button type="submit">Search</button>
</form>

    <section id="featured-products">
        <h2>Featured Products</h2>

        <?php
            $sql = "SELECT * FROM Product;";
            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_desc = $row['product_desc'];
                $product_image = $row['product_image'];
                $price = $row['price'];

                echo "<div class='product'>
                <img src='$product_image' alt='13in1' style='width: 150px; height: 150px;'>
                <h3>'$product_name'</h3>
                <p>'$product_desc'</p>
                <p>$'$price'</p>
                <button class='add_button' onclick='addToCart()'>Add to Cart</button>

                </div>";
            }

        ?>

        

        <div class="product">
            <img src="Dove Soap.jpg" alt="Dove Exfoliating Soap" style="width: 150px; height: 150px;">
            <h3>Dove Exfoliating Soap</h3>
            <p>An exfoliating bar of soap that gently cleanses the skin while diminishing bacteria and rough texture with the beads. </p>
            <p>$5.99</p>
            <button class="add_button" onclick="addToCart('Dove Exfoliating Soap', 5.99, 'Dove Soap.jpg')">Add to Cart</button>

        </div>

        <div class="product">
            <img src="Cool Menthol.jpg" alt="Head and Shoulders-Cool Menthol" style="width: 150px; height: 150px;">
            <h3>Head and Shoulders-Cool Menthol</h3>
            <p>Cleanse your scalp and free yourself of dandruff with the cooling effects of menthol. 
                Feel revitalized when you exit the shower with a clean head on your shoulders.</p>
            <p>$10.99</p>
            <button class="add_button" onclick="addToCart('Head and Shoulders-Cool Menthol', 10.99, 'Cool Menthol.jpg')">Add to Cart</button>
        </div>

        <div class="product">
            <img src="Coconut Clean.jpg" alt="Coconut Clean" style="width: 150px; height: 150px;">
            <h3>Head and Shoulders Conditioner-Coconut Clean</h3>
            <p>Spruce up your ends and freshen up your scalp with the moisture of coconuts. </p>
            <p>$4.99</p>
            <button class="add_button" onclick="addToCart('Coconut Clean', 4.99, 'Coconut Clean.jpg')">Add to Cart</button>
        </div>

        <div class="product">
            <img src="Salicyclic.jpg" alt="CeraVe-Salicylic Acid" style="width: 150px; height: 150px;">
            <h3>CeraVe-Salicylic Acid</h3>
            <p>This water based cleanser contains 2% salicylic acid. Formulated to reduce the appearance of blackheads
                and brighten up those blemishes for an even skin tone.
            </p>
            <p>$14.99</p>
            <button class="add_button" onclick="addToCart('CeraVe-Salicylic Acid', 14.99, 'Salicyclic.jpg')">Add to Cart</button>
        </div>

        <div class="product">
            <img src="HairClips.jpg" alt="Hair Clips" style="width: 100px; height: 100px;">
            <h3>Hair Clips (4Pack) </h3>
            <p>Hair Clips with a four pack variety for hair security with any style of your choice.</p>
            <p>$4.56</p>
            <button class="add_button" onclick="addToCart('Hair Clips', 4.56, 'HairClips.jpg')">Add to Cart</button>
        </div>

        <!-- Add more featured products as needed -->
    </section>

    <section id="cta">
        <h2>Transform Your Beauty Routine</h2>
        <p>Explore our premium cosmetic products and elevate your beauty experience.</p>
        <a href="shop.html" class="shop_now_button">Shop Now</a>
    </section>

    <section id="info">
        <h2>Our Mission to Reach Higher Cosmos</h2>
        <p>Explore our premium cosmetic products and elevate your beauty experience.</p>
        <a href="info.html" class="more_info_button">Our Information</a>
    </section>

 <!--   <section id="cart">
        <h2>Your Shopping Cart</h2>
        <div id="cart-items" class="cart-items">
             Cart items will be displayed here <comment here>
        </div>
        <div id="total-price"></div>
        <button onclick="checkout()">Proceed to Checkout</button>
    </section>
-->

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
        <p>&copy; 2024 Higher Cosmos. All rights reserved.</p>
    </footer>

    <script src="HigherCosmosCart.js"></script>
    <script src="script.js"></script>
    <!-- <script src="cookies.js"></script> -->
</body>
</html>


