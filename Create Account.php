<?php
include_once 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="HigherCosmosStyles.css">
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
                    <li><a href="SigninLogout.html">Signin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div align="center">
        <div class="container">
            <form action= "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <h1>Please fill in this form to create an account.</h1>
                <label> Create username: </label>
                <input type="text" name="user_name" id="username" /><br /><br />
                <label> Create password: </label>
                <input type="text" name="pass_word" id="password" /><br /><br />
                <label> Email: </label>
                <input type="text" name="email" id="emailaddress" /><br /><br />
                <input class="add_button" type="submit" value="Submit" /><br />

            </form>
        </div>
    </div>

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
    <script src="cookies.js"></script>
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
<?php



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_name = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $pass_word = filter_input(INPUT_POST, "pass_word", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $hash_pass_word = password_hash($pass_word, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, pass_word, email) 
    VALUES ('$user_name', '$hash_pass_word', '$email')";
    mysqli_query($conn, $sql);
}
mysqli_close($conn);
?>