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

// Function to get the product category
function getProductCategory($product_id) {
    global $conn;
    $query = "SELECT product_category FROM Product WHERE product_id = $product_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['product_category'];
}

// Function to get the product gender
function getProductGender($product_id) {
    global $conn;
    $query = "SELECT product_MF FROM Product WHERE product_id = $product_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['product_MF'];
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

<div id="filters">
    <h3>Filter Products</h3>
    <form id="filterForm">
        <h4>Gender</h4>
        <label><input type="checkbox" name="gender" value="Male"> Male</label>
        <label><input type="checkbox" name="gender" value="Female"> Female</label>

        <h4>Category</h4>
        <div class="checkbox-container">
            <label><input type="checkbox" name="category" value="Shampoo">Shampoo</label>
            <label><input type="checkbox" name="category" value="Acne">Acne</label>
            <label><input type="checkbox" name="category" value="Conditioner">Conditioner</label>
            <label><input type="checkbox" name="category" value="Soap">Soap</label>
            <label><input type="checkbox" name="category" value="Razor">Razors</label>
            <label><input type="checkbox" name="category" value="Cologne">Cologne</label>
            <label><input type="checkbox" name="category" value="Perfume">Perfume</label>
            <label><input type="checkbox" name="category" value="Miscellaneous">Miscellaneous</label>
        </div>

        <input type="submit" value="Apply Filters">
    </form>
</div>


<section id="featured-products">
    <h2>Our Products</h2>
    <div class="product-grid">
        <?php
        $sql = "SELECT * FROM Product;";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_image = $row['product_image'];
            $product_desc = $row['product_desc'];
            $price = $row['price'];
            $category = getProductCategory($product_id);
            $gender = getProductGender($product_id);
        ?>
        <div class='product' data-gender="<?php echo $gender ?>" data-category="<?php echo $category ?>" onclick="showPopup('<?php echo $product_name ?>', '<?php echo $product_image ?>', '<?php echo $price ?>', '<?php echo $product_desc ?>', '<?php echo $category ?>')">
            <img src='images/<?php echo $product_image ?>' alt='<?php echo $product_name ?>' style="width: 100%; height: 200px;">
            <div class='product-details'>
                <h3><?php echo $product_name ?></h3>
                <p>$<?php echo $price ?></p>
                <form method="post" action="">
                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                    <input type="hidden" name="product_name" value="<?php echo $product_name ?>">
                    <input type="hidden" name="product_image" value="<?php echo $product_image ?>">
                    <input type="hidden" name="product_desc" value="<?php echo $product_desc ?>">
                    <input type="hidden" name="price" value="<?php echo $price ?>">
                    <input class="add_button" type="submit" value="Add to Cart" name="add_to_cart">
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>

<!-- Modal Popup -->
<div id="productModal" class="modal">
    <div class="modal-content" id="modalContent">
        <!-- Product details will be displayed here -->
    </div>
</div>

<div id="noProductsMessage">
    Sorry, no products found. Please check the filter. If problems persits, please <a href="#contact" onclick="scrollToContact()">contact</a> out support team.
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

    <script>
    function showPopup(name, image, price, description, category) {
        var modalContent = document.getElementById("modalContent");
        modalContent.innerHTML = `
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>${name}</h2>
            <img src="images/${image}" alt="${name}">
            <p>${description}</p>
            <p>Price: $${price} | Category: ${category}</p>
            <input class="add_button" type="submit" value="Add to Cart" name="add_to_cart">
            `;
        var modal = document.getElementById("productModal");
        modal.style.display = "block";
    }

        function closeModal() {
            var modal = document.getElementById("productModal");
            modal.style.display = "none";
        }
    </script>
    
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Initially show all products
        $('.product').show();
        
        // Hide the noProductsMessage initially
        $('#noProductsMessage').hide();

        // Function to filter products based on selected categories
        function filterProducts() {
            var genderFilters = $('input[name="gender"]:checked').map(function() {
                return this.value;
            }).get();
            var categoryFilters = $('input[name="category"]:checked').map(function() {
                return this.value;
            }).get();

            // If no checkboxes are checked, show all products
            if (genderFilters.length === 0 && categoryFilters.length === 0) {
                $('.product').show();
                $('#noProductsMessage').hide(); // Hide the message
                return;
            }

            // Perform filtering logic based on selected categories
            var productsToShow = $('.product').filter(function() {
                var gender = $(this).data('gender');
                var category = $(this).data('category');
                return (genderFilters.length === 0 || genderFilters.includes(gender)) &&
                       (categoryFilters.length === 0 || categoryFilters.includes(category));
            });

            // Hide all products and show only filtered ones
            $('.product').hide();
            productsToShow.show();

            // Display message if no products found
            if (productsToShow.length === 0) {
                $('#noProductsMessage').show();
            } else {
                $('#noProductsMessage').hide();
            }
        }

        // Update product grid when filter options are changed
        $('#filterForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission
            filterProducts();
        });
    });
</script>

</body>
</html>
