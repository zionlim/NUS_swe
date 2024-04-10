<?php

	include "./inc/header.php";
    include "./inc/db_connect.php";
    include "./inc/setup_session.php";
	
    if (isset($_GET['empty'])) {
    	unset($_SESSION['cart']);
    	header('location: ' . $_SERVER['PHP_SELF']);
    	exit();
    }
    if(isset($_GET['plus'])){
		$_SESSION['cart'][$_GET['plus']]++;
    }
    if(isset($_GET['minus'])){
     		$_SESSION['cart'][$_GET['minus']]--;
     }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product catalog</title>
</head>
<body>

    <div class="wrapper">
        <p class="centeredparagraph">
            <?php
            $total = 0;
                echo '<span class="cc_cart_items">';
                    for($i = 0; $i < count($_SESSION['cart']); $i++){
                        $total += $_SESSION['cart'][$i];
                     }
					 
                     if($total > 0){
                        echo 'Your shopping cart contains ' . $total . " item.";
                     } elseif($total > 1){
                        echo 'Your shopping cart contains ' . $total . " items.";
                     } else {
                        echo 'Your shopping cart is empty.';
                        displayEmpty();
                        return;
                     }
                 echo '</span>';
            ?>
        </p>
        <div class="cc_menu_wrapper">
            <table class="cc_table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $total = 0;
                        $sql = "SELECT product_name, product_price FROM dg01.products";
                        if(!$result = mysqli_query($conn, $sql)){
                            echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
                        }
                        for($i = 0; $i < count($_SESSION['cart']); $i++){
                             $row = mysqli_fetch_assoc($result);
                             if($_SESSION['cart'][$i] > 0){
                                echo "<tr>";
                                echo "<td align='center'>" .$row['product_name']. "</td>";
                                echo '<td align="center"><a href="'. "?minus=" .$i. '"><img src="src/img/minus_symbol.png" class="cc_minus"></a>';
                                echo $_SESSION["cart"][$i];
                                echo '<a href="'. "?plus=" .$i. '"><img src="src/img/plus_symbol.png" class="cc_plus"></a>';
                                echo "<td align='center'>$" .$row['product_price']. "</td>";
                                echo "</tr>";
                                $total = $total + (double)$row['product_price'] * (int)$_SESSION['cart'][$i];
                             }
                         }
                        echo "<tr>";
                        echo "<td colspan=2 align='left' style='padding-left:35px;font-size:20px; font-weight:bold;'>Total price </td>";
                        echo "<td align='center' style='font-size:20px;font-weight:bold;'>$" . number_format($total, 2) . "</td>";
                        echo "</tr>";
                    ?>
                </tbody>
            </table>
            <p class="centeredparagraph"><a href="cart.php" class="cc_links" style="margin-right:13%;">Continue to checkout</a>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1" class="cc_links">Empty your cart</a></p>
        </div>
    </div>
	<?php
    function displayEmpty(){
        echo '<p class="centeredparagraph"><a href="index.php" class="cc_empty_links">Continue shopping</a>';
        echo '<footer>
            Project for IE4717 by Zaw and Ziom
			</footer>';
	}

	?>
    <footer>
        Project for IE4717 by Zaw and Zion
    </footer>
</body>
</html>
