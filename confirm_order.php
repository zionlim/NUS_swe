<?php
	include "./inc/header.php";
    include "./inc/db_connect.php";
    include "./inc/setup_session.php";
	
    if (isset($_GET['empty'])) {
        unset($_SESSION['cart']);
        header('location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm order</title>
</head>


    <div class="wrapper">
        <?php
			
            include "./inc/db_connect.php";
            $to = 'dg01@localhost';
            $email = $_POST['email'];
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $streetAddress = $_POST['streetaddress'];
            $zip = $_POST['zipcode'];
            $payment_method = $_POST['payment_method'];
            $subject = "Order confirmation";
            $headers = 'From: dg0@localhost' . "\r\n" .
            'Reply-To: dg01@localhost' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            if($payment_method === 'creditcard'){
                $cc_number = $_POST['creditcard_number'];
            }

            do {
                $rand = rand();
            } while($rand === 0);
            $message = "Dear " . $firstName . " " . $lastName . ". Thank you for your order! <br> Your receipt number is $rand, please show this number to the delivery driver! <br><br>You ordered: <br><br>" ;
            $email_message = "Dear " . $firstName . " " . $lastName . ". Thank you for your order!\nYour receipt number is $rand, please show this number to the delivery driver!\n\nYou ordered:\n\n" ;
            $total = 0;
            $sql = "SELECT product_name, product_price FROM dg01.products";
            if(!$result = mysqli_query($conn, $sql)){
                echo "Something went wrong when fetching data from database: " . mysqli_error($conn);
            }
            $sql = "INSERT INTO dg01.orders (order_id, order_date, status) VALUES ($rand, CURDATE(), 'processing')";
            if(!$hejsan = mysqli_query($conn, $sql)){
                echo "Something went wrong when inserting data into order table: " . mysqli_error($conn);
            }
            for($i = 0; $i < count($_SESSION['cart']); $i++){
                 $row = mysqli_fetch_assoc($result);
                 if($_SESSION['cart'][$i] > 0){
                    $quan = $_SESSION['cart'][$i];
                    $message .= $_SESSION['cart'][$i] . "x " . $row['product_name'] . " for $" . ($_SESSION['cart'][$i] * $row['product_price']) . "<br>";
                    $email_message .= $_SESSION['cart'][$i] . "x " . $row['product_name'] . " for $" . ($_SESSION['cart'][$i] * $row['product_price']) . "\n";
                    $sql = "INSERT INTO dg01.orders_items (order_id, product_name, quantity) VALUES ($rand, '" . $row['product_name'] . "', $quan)";
                    if(!$hejsan = mysqli_query($conn, $sql)){
                        echo "Something went wrong when inserting data into database: " . mysqli_query($conn);
                    }
                    $_SESSION['cart'][$i] = 0; //Clears the cart.
                 }
             }
            $message .= "<br>The items will be delivered to:<br>" . $streetAddress . "<br>" . $zip . "<br>";
            $email_message .= "\nThe items will be delivered to:\n" . $streetAddress . "\n" . $zip . "\n\n";
            $message .= "<br>Your payment method was by " . $payment_method . ".";
            $email_message .= "Your payment method was by " . $payment_method . ".";
            if($payment_method === 'creditcard'){
                $message .= "<br>Credit card used: **** **** **** " . substr($cc_number, 12, 16) . "<br>";
                $email_message .= "\nCredit card used: **** **** **** " . substr($cc_number, 12, 16) . "\n";
            }
            $message .= "<br>Confirmation mail sent to " . $email . "<br>";
            echo '<span style="display:block;margin-top:30px;text-align:center;">' . $message . '</span>';
            mail($to, $subject,$email_message, $headers, 'dg01@localhost');
        ?>
    </div>
	
    <footer>
        Project for IE4717 by Zaw and Zion
    </footer>
</body>
</html>
	<?php
    function displayEmpty(){
        echo '<p class="centeredparagraph"><a href="index.php" class="cc_empty_links">Continue shopping</a>';
        echo '<footer>
            Project for IE4717 by Zaw and Ziom
			</footer>';
	}

	?>