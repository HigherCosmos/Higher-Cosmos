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
                <h1><a href="index.php" class="home-link">Higher Cosmos</a></h1>
                <ul>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="Cart.php">Cart</a></li>
                    <li><a href="#contact" onclick="scrollToContact()">Contact</a></li>
                    <li><a href="Info.html">Info</a></li>    
                    <li><a href="SigninLogout.html">Signin</a></li>
                </ul>
            </nav>
        </div>
    </header> 

    <h2><a href="insertProduct.php">Insert Product</a></h2>
    <h2><a href="viewProducts.php">View Products</a></h2>
    <h2><a href="viewUsers.php">View Users</a></h2>
</body>
</html>