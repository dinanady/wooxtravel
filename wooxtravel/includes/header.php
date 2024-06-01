<?php
// Include session configuration
require_once __DIR__ . "/../config/session_config.php";

// Define the base URL
define("AppUrl","http://localhost/travel/wooxtravel/wooxtravel");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WoOx Travel</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo AppUrl;?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo AppUrl;?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo AppUrl;?>/assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="<?php echo AppUrl;?>/assets/css/owl.css">
    <link rel="stylesheet" href="<?php echo AppUrl;?>/assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="<?php echo AppUrl;?>/index.php" class="active">Home</a></li>
                            <!-- <li><a href="<?php echo AppUrl;?>/about.php">About</a></li> -->
                            <li><a href="<?php echo AppUrl;?>/deals.php">Deals</a></li>
                           
                    <?php if (isset($_SESSION["Email"])) : ?> 
                   <!-- User is logged in, show dropdown with email and logout button -->
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <?php echo $_SESSION["Email"]; ?>
                           </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <li><a class="dropdown-item text-dark" href="<?php echo AppUrl; ?>/mybooking.php">My Reservation</a></li>
                         <?php if ( $_SESSION["role"]==="admin"):?>
                        <li><a class="dropdown-item text-dark" href="<?php echo AppUrl; ?>/admin-panel/index.php">Dashboard</a></li>
                      <?php endif; ?>
                     <li><hr class="dropdown-divider"></li>
                       <li><a class="dropdown-item text-dark" href="<?php echo AppUrl; ?>/Controllers/logout.php">Logout</a></li>
        </ul>
    </li>
    <?php else: ?> 
    <!-- User is not logged in, show login and register buttons -->
    <li><a href="<?php echo AppUrl; ?>/auth/login.php">Login</a></li>
    <li><a href="<?php echo AppUrl; ?>/auth/register.php">Register</a></li>
    <?php endif; ?>

                        </ul>   
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
</body>
</html>
