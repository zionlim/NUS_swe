<?php
    include "setup_session.php";
	//Mains
    if(isset($_GET['menu1'])){
        $_SESSION['cart'][0]++;
        header("location:../menu.php");
    }elseif(isset($_GET['menu2'])){
        $_SESSION['cart'][1]++;
        header("location:../menu.php");	
    }elseif(isset($_GET['menu3'])){
        $_SESSION['cart'][2]++;
        header("location:../menu.php");	
			
		
    //Desserts	
    }elseif(isset($_GET['drink_homepage'])){
        $_SESSION['cart'][6]++;
        header("location:../index.php#drink_homepage");
    }elseif(isset($_GET['dessert_homepage'])){
        $_SESSION['cart'][11]++;
        header("location:../index.php#dessert_homepage");
    }elseif(isset($_GET['pizza_dotd'])){
        $_SESSION['cart'][2]++;
        header("location:../deals.php");
    }elseif(isset($_GET['drink_dotd'])){
        $_SESSION['cart'][8]++;
        header("location:../deals.php");
    }elseif(isset($_GET['dessert_dotd'])){
        $_SESSION['cart'][10]++;
        header("location:../deals.php");
    }
?>