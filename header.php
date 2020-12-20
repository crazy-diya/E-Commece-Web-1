
<?php 
        
        session_start();
        include('function.php');
        include('db.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SALE</title>
	<link rel="icon" href="img/bg-img/sales-.png">
	<link rel="stylesheet" href="my.css">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/jquery_3.4.1.js"></script>
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="result.php" method="get" enctype="multipart/form-data">
                            <input type="search" name="user_query" id="search" placeholder="Search a product...">
                            <button type="submit" name="search" value="search"><img src="img/core-img/search.png" alt="search"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="home.php"><img src="img/bg-img/sales-.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="home.php"><img src="img/bg-img/sales-.png" alt="" ></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active">
                    <a href="home.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="myaccount.php">My Account</a></li>
                    <li><a href="cart.php">Shopping Cart</a>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="checkout.php?action=login">Login</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="aboutus.php">About us</a>

                    </li>
                </ul>
            </nav>
            <!-- Button Group -->
<!--
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div>
-->
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">

                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(

                    <?php totalCartItem(); ?>

                )</span></a>
<!--               
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
-->
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search </a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->



        <?php if (!isset($_SESSION['user_id'])) { ?>

            <?php }else{ ?>

                <?php 

                $select_user = mysqli_query($con, "select * from users where user_id='$_SESSION[user_id] '");
                $data_user = mysqli_fetch_array($select_user);

                ?>

                <div class="dropdown">

                    <a class="scrolup" style="display: ; position: fixed; z-index: 2147483647;" href="myaccount.php">

                    <?php if ($data_user['image'] !='') { ?>

                        <img class="usimg" src="customer_image/<?php echo $data_user['image']; ?>">

                    <?php }else{ ?>

                <!-- <a class="scrolup" style="display: ; position: fixed; z-index: 2147483647;" href="my_account.php"> -->
                        <img class="usimg" src="img/core-img/usericon.png">

                    <?php } ?>

                    </a>
                </div>

            <?php } ?>