<?php
    include('connection.php');

    if(isset($_POST["delete_from_db"])) {
        $user_id = $_POST['user_id'];
    
        $is_in_db = mysqli_query($conn, "SELECT user_id FROM users WHERE user_id = $user_id");
        $row = mysqli_fetch_assoc($is_in_db);
        

        if($row['user_id'] == $user_id){
            $delete = mysqli_query($conn, "DELETE FROM users WHERE `users`.`user_id` = $user_id");

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

        <table class="viewUsers">
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>User Type</th>
        <?php
        $sql = "SELECT * FROM users;";
        $result = mysqli_query($conn, $sql);

        
        while($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['user_id'];
            $user_name = $row['username'];
            $user_pass = $row['password'];
            $user_email = $row['email'];
            $user_type = $row['usertype'];
            ?>

            
                <form method="post" action="">
                    <div class='users'>
                        
                        <div class='user-details'>
                            <tr>
                                <td><h3><?php echo $user_name?></h3></td>
                                <td><p><?php echo $user_pass?></p></td>
                                <td><p><?php echo $user_email?></p></td>
                                <td><p><?php echo $user_type?></p></td>
                                <td><input class="delete_from_db" type="submit" value="Delete" name="delete_from_db"></td>
                            </tr>
                    
                
                            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                            <input type="hidden" name="username" value="<?php echo $user_name?>">
                            <input type="hidden" name="password" value="<?php echo $user_pass?>">
                            <input type="hidden" name="email" value="<?php echo $user_email?>">
                            <input type="hidden" name="usertype" value="<?php echo $user_type?>">
                        </div>
                    </div>
                </form>
            
            <?php
            
            
        }
        ?>
        </table>
        

</body>
</html>
