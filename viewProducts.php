<?php
    include('connection.php');

    if(isset($_POST["delete_from_db"])) {
        $product_id = $_POST['product_id'];
    
        $is_in_db = mysqli_query($conn, "SELECT product_id FROM Product WHERE product_id = $product_id");
        $row = mysqli_fetch_assoc($is_in_db);
        

        if($row['product_id'] == $product_id){
            $delete = mysqli_query($conn, "DELETE FROM Product WHERE `Product`.`product_id` = $product_id");

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Higher Cosmos</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
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

        
        <table class="viewProducts">
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
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
                        
                        <div class='product-details'>
                            <tr>
                                <td><h3><?php echo $product_name?></h3></td>
                                <td><p><?php echo $product_image?></p></td>
                                <td><p>$<?php echo $price?></p></td>
                                <td><input class="delete_from_db" type="submit" value="Delete" name="delete_from_db"></td>
                            </tr>
                    
                
                            <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                            <input type="hidden" name="product_name" value="<?php echo $product_name?>">
                            <input type="hidden" name="product_desc" value="<?php echo $product_desc?>">
                            <input type="hidden" name="product_image" value="<?php echo $product_image?>">
                            <input type="hidden" name="price" value="<?php echo $price?>">
                        </div>
                    </div>
                </form>
            
            <?php
            
            
        }
        ?>
        </table>
        

</body>
</html>
