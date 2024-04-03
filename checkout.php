<?php

    include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>

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
    <div class="container"> 
  
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"> 
  
            <div class="row"> 
  
                <div class="col"> 
                    <h3 class="title"> 
                        Billing Address 
                    </h3> 
  
                    <div class="inputBox"> 
                        Full Name: 
                        <input type="text" name="customer_name" id="name" 
                               placeholder="Enter your full name" 
                               required> 
                    </div> 
  
                    <div class="inputBox"> 
                        Address:  
                        <input type="text" name="address" id="address" 
                               placeholder="Enter address" 
                               required> 
                    </div> 
  
                    <div class="inputBox">  
                        City: 
                        <input type="text" name="city" id="city" 
                               placeholder="Enter city" 
                               required> 
                    </div> 
  
                    <div class="flex"> 
  
                        <div class="inputBox"> 
                            State: 
                            <input type="text" name="state" id="state" placeholder="Enter state" required minlength="2" maxlength="2"> 
                        </div> 
  
                        <div class="inputBox"> 
                            Zip Code: 
                            <input type="text" name="zip" id="zip" placeholder="12345" minlength="5" maxlength="5" required> 
                        </div> 
  
                    </div> 
  
                </div> 
                <div class="col"> 
                    <h3 class="title">Card Information</h3> 
                    <div class="inputBox"> 
                        Name On Card: 
                        <input type="text" name="name_on_card" id="cardName" placeholder="Enter card name" required> 
                    </div> 
  
                    <div class="inputBox"> 
                        Credit Card Number: 
                        <input type="text" name="card_number" placeholder="#### #### #### ####" minlength="16" maxlength="16" required> 
                    </div> 
  
                    <div class="inputBox"> 
                        Month:
                        <select name="exp_month" id="expMonth"> 
                            <option value="">Choose month</option> 
                            <option value="January">January</option> 
                            <option value="February">February</option> 
                            <option value="March">March</option> 
                            <option value="April">April</option> 
                            <option value="May">May</option> 
                            <option value="June">June</option> 
                            <option value="July">July</option> 
                            <option value="August">August</option> 
                            <option value="September">September</option> 
                            <option value="October">October</option> 
                            <option value="November">November</option> 
                            <option value="December">December</option> 
                        </select> 
                    </div> 
  
                    
                    <div class="flex"> 
                        <div class="inputBox"> 
                            Exp Year:
                            <select name="exp_year" id="expYear"> 
                                <option value="">Choose Year</option> 
                                <option value="2024">2024</option> 
                                <option value="2025">2025</option> 
                                <option value="2026">2026</option> 
                                <option value="2027">2027</option> 
                                <option value="2028">2028</option> 
                            </select> 
                        </div> 
  
                        <div class="inputBox"> 
                            CVV
                            <input type="text" name="cvv" id="cvv" placeholder="123" minlength="3" maxlength="3" required> 
                        </div> 
                    </div> 
  
                </div> 
  
            </div> 
  
            <input type="submit" value="Submit" class="submit_btn" onclick="confirmPayment()"> 
        </form> 
  
    </div> 

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

    
    <script type="text/javascript" src="checkout.js"></script>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_name = filter_input(INPUT_POST, "customer_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
        $state = filter_input(INPUT_POST, "state", FILTER_SANITIZE_SPECIAL_CHARS);
        $zip = filter_input(INPUT_POST, "zip", FILTER_SANITIZE_SPECIAL_CHARS);
        $name_on_card = filter_input(INPUT_POST, "name_on_card", FILTER_SANITIZE_SPECIAL_CHARS);
        $card_number = filter_input(INPUT_POST, "card_number", FILTER_SANITIZE_SPECIAL_CHARS);
        $exp_month = filter_input(INPUT_POST, "exp_month", FILTER_SANITIZE_SPECIAL_CHARS);
        $exp_year = filter_input(INPUT_POST, "exp_year", FILTER_SANITIZE_SPECIAL_CHARS);
        $cvv = filter_input(INPUT_POST, "cvv", FILTER_SANITIZE_SPECIAL_CHARS);

        $hash_card_number = password_hash($card_number, PASSWORD_DEFAULT);
        $hash_cvv = password_hash($cvv, PASSWORD_DEFAULT);

        $sql = "INSERT INTO customer (customer_id, customer_name, address, city, state, zip, name_on_card, card_number, exp_month, exp_year, cvv) 
                VALUES (NULL, '$customer_name', '$address', '$city', '$state', '$zip', '$name_on_card', '$hash_card_number', '$exp_month', '$exp_year', '$hash_cvv')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo '<script language="javascript" type="text/javascript">';
        echo 'window.location.replace("Cart.php")';
        echo '</script>';
        
    }
        
    
    
    
?>