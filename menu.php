<?php include "./inc/header.php" ;
	  include "./inc/setup_session.php";
?>
    <main class="menu">
        <nav class="menu-nav">
            <ul>
                <li><button class="menu-nav-selected">Mains</button></li>
                <li><button>Appetizers</button></li>
                <li><button>Sides</button></li>
                <li><button>Dessert</button></li>
                <li><button>Drinks</button></li>
            </ul>
        </nav>
        <h1>Menu</h1>
        <div class="menu-container">
            <div class="menu-card">
                <div class="menu-item-name"><?php echo $products[0]["product_name"]; ?></div>
                <img src="./src/img/fooditems/food1.png" alt="">
                <div class="menu-item-price">$<?php echo $products[0]["product_price"]; ?></div>
                <div class="menu-item-footer">
				<form method="get" action="./inc/add_to_cart_hp_dotd.php">
                 <label><input type=submit value="Add to cart" name="menu1"></label>
                </form>
                </div>
            </div>
            <div class="menu-card">
                <div class="menu-item-name"><?php echo $products[1]["product_name"]; ?></div>
                <img src="./src/img/fooditems/food2.png" alt="">
                <div class="menu-item-price">$<?php echo $products[1]["product_price"]; ?></div>
                <div class="menu-item-footer">
				<form method="get" action="./inc/add_to_cart_hp_dotd.php">
                <label><input type=submit value="Add to cart" name="menu2"></label>
                </form>
                </div>
            </div>
            <div class="menu-card">
                <div class="menu-item-name"><?php echo $products[2]["product_name"]; ?></div>
                <img src="./src/img/fooditems/food3.png" alt="">
                <div class="menu-item-price">$<?php echo $products[2]["product_price"]; ?></div>
                <div class="menu-item-footer">
				<form method="get" action="./inc/add_to_cart_hp_dotd.php">
                <label><input type=submit value="Add to cart" name="menu3"></label>
                </form>
                </div>
            </div>
    

        </div>
    </main>
    <footer>
        Project for IE4717 by Zaw and Zion
    </footer>
</body>

</html>