<?php 
	  include "setup_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/stylesheets/style.css">
    <title>Primavera</title>
</head>

<body>
    <header class="header">
        <a href="index.php"><p id="site-name">PRIMAVERA</p></a>
        <nav class="nav-bar">
            <ul>
			
                <li><a href="menu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contacts</a></li>
                <li><a href="">Orders</a></li>
				<li>
                <a href="catalogue.php">
                    <div id="cart-button">
                        <div>
						<img id="shopping-cart-icon" src="./src/img/shopping_cart_FILL1_wght400_GRAD0_opsz24.svg" alt="">
                            <?php
                                $total = 0;
                                for($i = 0; $i < count($_SESSION['cart']); $i++){
                                    if($_SESSION['cart'][$i] > 0){
                                         $total += $_SESSION['cart'][$i];
                                     }
                                }
                                echo $total;
                            ?>
							<td>Items</td>
                        </div>
                    </div>
                </a>
				</li>
            </div>
            </ul>
        </nav>
    </header>
	

		
		
		