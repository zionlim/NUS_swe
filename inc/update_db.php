<?php
    include "db_connect.php";
    include "db_display.php";

	if(is_array($fetchData)){ 
		foreach($fetchData as $data){
			$id = $data['order_id'];
			if(isset($_POST[$id])) {	
					$val = $_POST['input'];
					$query = "UPDATE orders SET status = 'test4' WHERE order_id = $id ";
					mysqli_query($conn, $query);
					}
		}
	}















?>