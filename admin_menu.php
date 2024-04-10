<?php
    include "./inc/header.php";
    include "./inc/db_connect.php";
    include "./inc/admin_table.php";
	
    if (isset($_GET['empty'])) {
    	unset($_SESSION['cart']);
    	header('location: ' . $_SERVER['PHP_SELF']);
    	exit();
    }


      if(is_array($fetchData)){  
      foreach($fetchData as $data){
			  $id = $data['order_id'];
				if(isset($_POST[$id]) && !empty($_POST["input"])) {
					$input = $_POST['input'];
					$query = "UPDATE orders SET status = '$input' WHERE order_id = $id ";
					mysqli_query($conn, $query);
					header("Refresh:0");
				}
			}
	  }
	  

	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>

</head>
<body>


    <div class="wrapper">
	<p class="centeredparagraph"><?php
	if (isset($_SESSION['valid_user']))
	{?>
		<?php echo 'You are logged in as :  <strong>'.$_SESSION['valid_user'].' <br />';?>
		<?php echo '<a href="admin_logout.php" style="color: black">Log out</a><br /><br />';?>
	
	
	   <table border='1' style="width:100%">
       <thead><tr>
         <th>Order ID</th>
         <th>Order Date</th>
		 <th>Items</th>
         <th>Status</th>
		 

    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){  	  
      foreach($fetchData as $data){
    ?>
		
      <tr>

      <td><?php echo $data['order_id']??''; ?></td>
      <td><?php echo $data['order_date']??''; ?></td>
	  <td><?php 
				$sql = "SELECT order_id, product_name, quantity FROM orders_items";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc())		  
				if ($data['order_id'] == $row['order_id']){
		        echo $row['product_name']. " x " . $row['quantity'] . "<br />";
	  }?></td>
	  <td><?php echo $data['status']??''; ?></td>
	  <td>		<form method="post" action="admin_menu.php">
				 <select list name="input">
						<option value="" disabled selected></option>
						<option>processing</option>
						<option>preparing</option>
						<option>delivering</option></select>
                 <label><input type=submit value="Update" name="<?php echo $data['order_id']??''; ?>"></label>
                </form></td>
     </tr>
     <?php
		}?>
      <tr>
        <td colspan="8">
  </td>
    <tr>
    <?php
    }}else{echo 'Not logged in' . "<br />";
			echo '<a href="admin_login.php" style="color: black"><b>Login</b></a>';
	}
	?>
    </tbody>
     </table>

	</div>

	
	

    <footer>
        Project for IE4717 by Zaw and Zion
    </footer>
</body>
</html>

