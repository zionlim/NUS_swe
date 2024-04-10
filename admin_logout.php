<?php

	include "./inc/header.php";
    include "./inc/db_connect.php";
	
    if (isset($_GET['empty'])) {
    	unset($_SESSION['cart']);
    	header('location: ' . $_SERVER['PHP_SELF']);
    	exit();
    }
	
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
	

?>



<body>

	<div class="wrapper">
	<p class="centeredparagraph">
	<?php
	if(!empty($old_user))
	{
		echo 'Logged out.<br />';
        echo '<a href="admin_login.php" style="color: black"><b>Login</b></a>';
	}
	else
	{
		echo 'You were not logged in, and so have not been logged out.<br ?>';
        echo '<a href="admin_login.php" style="color: black"><b>Login</b></a>';
	}
	?>
	</div></p>
	
	

    <footer>
        Project for IE4717 by Zaw and Zion
    </footer>
</body>
</html>
