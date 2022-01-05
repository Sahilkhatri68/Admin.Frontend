<?php include 'connect.php';
 session_start();
$conn=mysqli_connect("localhost","root","","admindb");

$select="SELECT * FROM user ";
    $query=mysqli_query($conn,$select);
    $data=mysqli_fetch_assoc($query);
   
    if(isset($_SESSION['email']))
    {
            // echo "done";
            
    }
    else{
        header("location:http://projects.test/adminpanel/frontend/admin/login_register.php");
        
        }
?>  
<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo assets; ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo assets; ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo assets; ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo assets; ?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo assets; ?>css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo assets; ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo assets; ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo assets; ?>css/style.css" type="text/css">
</head>
<body>
    <!-- <p>Page Preloder</p> 
    <div id="preloder">
        <div class="loader"></div>  
    </div>  -->

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="#"><img src="<?php echo assets; ?>img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="http://projects.test/adminpanel/frontend/admin/login_register.php">Login</a>
            <a href="http://projects.test/adminpanel/frontend/admin/login_register.php">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="http://projects.test/adminpanel/frontend/index.php"><img src="<?php echo assets; ?>img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class=""><a href="http://projects.test/adminpanel/frontend/index.php">Home</a></li>
                            <li><a href="#">Women’s</a></li>
                            <li><a href="#">Men’s</a></li>
                            <li><a href="http://projects.test/adminpanel/frontend/include/shop.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="http://projects.test/adminpanel/frontend/include/product_details.php">Product Details</a></li>
                                    <li><a href="./shop-cart.html">Shop Cart</a></li>
                                    <li><a href="./checkout.html">Checkout</a></li>
                                    <li><a href="http://projects.test/adminpanel/frontend/include/blogs.php">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="http://projects.test/adminpanel/frontend/include/blogs.php">Blog</a></li>
                            <li><a href="http://projects.test/adminpanel/frontend/include/contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="http://projects.test/adminpanel/frontend/admin/login_register.php">Login</a>
                            <a href="http://projects.test/adminpanel/frontend/admin/login_register.php">Register</a>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
