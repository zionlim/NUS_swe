<?php

	include "./inc/header.php";
    include "./inc/db_connect.php";
	
    if (isset($_GET['empty'])) {
    	unset($_SESSION['cart']);
    	header('location: ' . $_SERVER['PHP_SELF']);
    	exit();
    }

	if (isset($_POST['userid']) && isset($_POST['password']))
{
	//user login
	$userid = $_POST['userid'];
	$password = $_POST['password'];
	
	$query = 'select * from users ' 
			."where userid='$userid' " 
			." and password='$password' ";
			
	$result = $conn->query($query);
	if ($result->num_rows>0)
	{
		$_SESSION['valid_user'] = $userid;
	}
	$conn->close();
}
?>



<body>

    <div class="wrapper">
     

        
	<p class="centeredparagraph"><?php
	if (isset($_SESSION['valid_user']))
	{
		echo 'You are logged in as :  <strong>'.$_SESSION['valid_user'].' <br />';
		echo '<a href="admin_logout.php" style="color: black">Log out</a><br />';
		echo '	<a href="admin_menu.php" style="color: black">Admin menu</a>';
	}
	else
	{
		if (isset($userid))
		{
		// if they've tried and failed to log in
		echo 'Could not log you in.<br />';
		}
		else 
		
		// they have not tried to log in yet or have logged out

		

		// provide form to log in 
				echo '<form action="admin_login.php" method=POST align="center">';
				echo 'Username: <br />';
				echo'<input type=text name=userid><br /><br />';
				echo'Password:<br />';
				echo'<input type=password name=password><br /><br />';
		
				
				echo'<input type=submit name=submit value=submit> ';
				echo'<input type=reset name=reset value="Reset">';
				echo'</form>';
	}
	?>			
    </div>
    <footer>
        Project for IE4717 by Zaw and Zion
    </footer>
</body>
</html>
