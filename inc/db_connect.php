<?php

	$conn = mysqli_init();
	mysqli_ssl_set($conn,NULL,NULL, "", NULL, NULL);
	mysqli_real_connect($conn, "swe5006svr.mysql.database.azure.com", "swe5006", "P@ssw0rd", "dg01", 3306, MYSQLI_CLIENT_SSL);
    // Checking the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>