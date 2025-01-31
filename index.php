<?php
    include_once 'connection.php';

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
</head>
<body onload="loadCartFromLocalStorage()">
    
    <header>
        <div class="navbar">
            <nav class="navbar-container">
                <h1><a href="index.php" class="home-link">Higher Cosmos</a></h1>
                <ul>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="Cart.php">Cart</a></li>
                    <li><a href="#contact" onclick="scrollToContact()">Contact</a></li>
                    <li><a href="SigninLogout.html">Signin</a></li>
                </ul>
            </nav>
        </div>
    </header> 


    <!--<form id="searchForm" action="search.php" method="post">
    <input type="text" id="searchInput" name="query" placeholder="Search...">
    <button type="submit">Search</button>
</form> -->


    <section id="featured-products">
        <h2>Featured Products</h2>
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
                            <input  onclick="alert('Item added to cart')" class="add_button" type="submit" value="Add to Cart" name="add_to_cart">
                        </div>
                    </div>
                </form>
                <?php
                
                
            }
        ?>
                
    </section>
<?php
// search.php (process search when form submitted)
if (isset($_POST["search"])) {
    $searchTerm = $_POST["search"];
    
    //$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Search for matching records
    $sql = "SELECT * FROM product WHERE product_name ='CeraVe-Benzoyl Peroxide'"; /*title LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'*/
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
    
    /*if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>{$row['title']} - {$row['content']}</div>";
        }
    } else {
        echo "No results found";
    }*/
    
    mysqli_close($conn);
}
?>
    

    <section id="info">
		<img src = "images/HigherCosmosLogo.jpg" alt = "Higher Cosmos Logo" style="width: 500px; height: 400px;">
		<h1>Our Mission to reach Higher Cosmos:</h1>
		    <p>    
			    Higher Cosmos is a designated website for selling cosmetics and for guiding customers while selling a multitude of products . 
			    Although this is a general idea, I believe integrating this sort of database design will help many consumers to shop for all different cosmetic products. 
			    Higher Cosmetics goals consist of aiming for a more organizational and out of this world shopping experience offered online for all consumers of beauty care goods. 
			    With a unique web page design, the ultimate goal is to have an easy use environment for all potential customers.
		    </p>
    </section>

    <section id="cta">
        <h2>Transform Your Beauty Routine</h2>
        <p>Explore our premium cosmetic products and elevate your beauty experience.</p>
        <a href="shop.php" class="shop_now_button">Shop Now</a>
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

    <script src="HigherCosmosCart.js"></script>
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