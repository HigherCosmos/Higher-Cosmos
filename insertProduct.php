<?php

    include("connection.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <title>Insert Product</title>
</head>
<body>

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

    <h1>Insert Product Form</h1>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        Product Name: <br>
        <input type="text" name="product_name"> <br>
        Product Image: <br>
        <input type="text" name="product_image"> <br>
        Product Description: <br>
        <input type="text" name="product_desc"> <br>
        Product Price: <br>
        <input type="text" name="price"> <br>
        <input type="submit" name="submit" value="submit">
        
    </form>
</body>
</html>
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_name = filter_input(INPUT_POST, "product_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $product_image = filter_input(INPUT_POST, "product_image", FILTER_SANITIZE_SPECIAL_CHARS);
        $product_desc = filter_input(INPUT_POST, "product_desc", FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($product_name)){
            echo "Please enter a product name";
        }
        elseif(empty($product_image)){
            echo "Please enter a product image filename";
        }
        elseif(empty($product_desc)){
            echo "Please enter a product description";
        }
        elseif(empty($price)) {
            echo "Please enter a price";
        }
        else{
            $sql = "INSERT INTO Product (product_id, product_name, product_image, product_desc, price)
                    VALUES (NULL, '$product_name', '$product_image', '$product_desc', '$price')";
            mysqli_query($conn, $sql);
            echo "Product inserted";
        }
    }

    
mysqli_close($conn);
    

?>

