<?php
    include('connection.php');

    if(isset($_POST["add_to_cart"])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_image = $_POST['product_image'];
        $price = $_POST['price'];
        
        

        $is_in_cart = mysqli_query($conn, "SELECT product_id FROM cart WHERE product_id = $product_id");
        $row = mysqli_fetch_assoc($is_in_cart);
        

        if($row['product_id'] == $product_id){
            $get_quantity = mysqli_query($conn, "SELECT quantity FROM cart WHERE product_id = $product_id");
            $num = mysqli_fetch_assoc($get_quantity);
            $product_quantity = $num['quantity'] + 1;
            $update_quantity = mysqli_query($conn, "UPDATE `cart` SET `quantity` = '$product_quantity' WHERE `cart`.`product_id` = $product_id");
        }
        else{
            $product_quantity = 1;
            $insert_products = mysqli_query($conn, "INSERT INTO `cart` (`name`, `price`, `image`, quantity, product_id) VALUES ('$product_name', '$price', '$product_image', $product_quantity, $product_id)");


        }

        
        
    }

    
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
                    <li><a href="Cart.php">Cart</a></li>                    
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
        <p id="sorryMessage" style="display: none;">Sorry, no matching products found.</p>
    </section> -->

    <!-- HTML search form -->
    <form method="post" action="shop.php">
    <input type="text" name="search" placeholder="Search..." required>
    <input type="submit" value="Search">
</form>

<?php
// search.php (process search when form submitted)
if (isset($_POST["search"])) {
    $searchTerm = $_POST["search"];
    
    //$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Search for matching records
    $sql = "SELECT * FROM product WHERE LOWER(product_name) LIKE '%" . strtolower($searchTerm) . "%'";
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
    
    mysqli_close($conn);
}
?>


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
            ?>
            <form method="post" action="">
                <div class='product'>
                    <img src='images/<?php echo $product_image?>' alt='13in1'>
                    <div class='product-details'>
                        <h3><?php echo $product_name?></h3>
                        <p><?php echo $product_desc?></p>
                        <p>$<?php echo $price?></p>
                    
                    
                
                        <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                        <input type="hidden" name="product_name" value="<?php echo $product_name?>">
                        <input type="hidden" name="product_desc" value="<?php echo $product_desc?>">
                        <input type="hidden" name="product_image" value="<?php echo $product_image?>">
                        <input type="hidden" name="price" value="<?php echo $price?>">
                        <input class="add_button" type="submit" value="Add to Cart" name="add_to_cart">
                    </div>
                </div>
            </form>
            <?php
            
            
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
        <p>&copy; <?php echo date("Y"); ?> Higher Cosmos. All rights reserved.</p>
    </footer>

    <!-- <script src="HigherCosmosCart.js"></script> -->
    <script src="script.js"></script>
    <!-- <script src="cookies.js"></script> -->
</body>
</html>
