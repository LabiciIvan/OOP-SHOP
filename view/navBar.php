<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>


<div class="navbar">

    <div class="navbar-desktop">
        <ul class="navbar-items-desktop">
            <?php 
                if(!empty($_SESSION['user']) && $_SESSION['user']['admin'] == '1') { 
                    echo     "<li class='navbar-links-desktop'>
                                <a class='navbar-link-desktop' href='../admin/homeAdmin.php'>Admin</a>
                            </li>";
                }
            ?>
            <li class="navbar-links-desktop">
                <a class="navbar-link-desktop" href="./home.php">Home</a>
            </li>
            
            <li class="navbar-links-desktop">
                <a class="navbar-link-desktop" href="./products.php">Products</a>
            </li>

            <li class="navbar-links-desktop">
                <a class="navbar-link-desktop" href="./cart.php"><i id="cartIcon" class="fa-solid fa-cart-shopping"></i></a>
            </li>

            <li class="navbar-links-desktop">
                <a class="navbar-link-desktop" href="./contact.php">Contact</a>
            </li>
            <?php if(!empty($_SESSION['user'])) {
                echo            "<li class='navbar-links-desktop out'>
                                    <a class='navbar-link-desktop logout' href='./logOut.php'>Log Out</a>
                                </li>
                                <li class='navbar-links-desktop profile'>
                                    <a class='navbar-link-desktop' href='./profile.php'>{$_SESSION['user']['name']}</a>
                                </li>";
            } else {
                echo            "<li class='navbar-links-desktop login'>
                                    <a class='navbar-link-desktop' href='./logIn.php'>Log In</a>
                                </li>
                                <li class='navbar-links-desktop signup'>
                                    <a class='navbar-link-desktop' href='./signUp.php'>Sign Up</a>
                                </li>";
            } 
            ?>
        </ul>
    </div>

    <div class="navbar-mobile">
        
        <i class="fa-solid fa-bars"></i>

        <ul class="navbar-items-mobile">

            <i class="fa-solid fa-xmark"></i>

            <?php 
                if(!empty($_SESSION['user']) && $_SESSION['user']['admin'] == '1') { 
                    echo     "<li class='navbar-links-mobile'>
                                <a class='navbar-link-mobile' href='../admin/homeAdmin.php'>Admin</a>
                            </li>";
                }
            ?>

            <li class="navbar-links-mobile">
                <a class="navbar-link-mobile" href="./home.php">Home</a>
            </li>
            
            <li class="navbar-links-mobile">
                <a class="navbar-link-mobile" href="./products.php">Products</a>
            </li>
            
            <li class="navbar-links-mobile">
                <a class="navbar-link-mobile" href="./cart.php"><i id="cartIcon2"  class="fa-solid fa-cart-shopping"><?php if(!empty($_SESSION['cart'])) {echo count($_SESSION['cart']);}?></i></a>
            </li>

            <li class="navbar-links-mobile">
                <a class="navbar-link-mobile" href="./contact.php">Contact</a>
            </li>
            <?php if(!empty($_SESSION['user'])) {
                echo            "<li class='navbar-links-mobile out'>
                                    <a class='navbar-link-mobile' href='./logOut.php'>Log Out</a>
                                </li>
                                <li class='navbar-links-mobile profile'>
                                    <a class='navbar-link-mobile' href='./profile.php'>{$_SESSION['user']['name']}</a>
                                </li>";
            } else {
                echo            "<li class='navbar-links-mobile login'>
                                    <a class='navbar-link-mobile' href='./logIn.php'>Log In</a>
                                </li>
                                <li class='navbar-links-mobile signup'>
                                    <a class='navbar-link-mobile' href='./signUp.php'>Sign Up</a>
                                </li>";
            } 
            ?>
        </ul>
    </div>

</div>


