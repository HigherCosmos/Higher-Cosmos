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
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>
<body onload="loadCartFromLocalStorage()">

    <header>
        <div class="navbar">
            <nav class="navbar-container">
                <h1><a href="index.php" class="home-link">Higher Cosmos</a></h1>
                <ul>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="Cart.html">Cart</a></li>                    
                    <li><a href="#contact" onclick="scrollToContact()">Contact</a></li>
                    <li><a href="Info.html">Info</a></li>    
                    <li><a href="SigninLogout.html">Signin</a></li>
                </ul>
            </nav>
        </div>
    </header>    

    <section id="home">
        <h2>Welcome to Our Shop!</h2>
        <p>Shop our wide range of products!</p>
        <!-- Search bar -->
        <!--<input type="text" id="searchInput" placeholder="Search for products..." oninput="searchProducts(event)" onkeydown="searchProducts(event)">
        <p id="sorryMessage" style="display: none;">Sorry, no matching products found.</p> -->
    </section> 

    <form id="searchForm" action="search.php" method="post">
        <input type="text" id="searchInput" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <section id="featured-products">
        <h2>Our Products</h2>

        <div class="product-grid">
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
                    <img src='$product_image' alt='$product_name' style='width: 150px; height: 150px;'>
                    <h3>$product_name</h3>
                    <p>$product_desc</p>
                    <p>$$price</p>
                    <button class='add_button' onclick='addToCart(\"$product_name\", $price, \"$product_image\")'>Add to Cart</button>
                    </div>";
                }
            ?>
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
        <p>&copy; 2024 Higher Cosmos. All rights reserved.</p>
    </footer>

    <!-- <script src="HigherCosmosCart.js"></script> -->
    <script src="script.js"></script>
    <!-- <script src="cookies.js"></script> -->
</body>
</html>
