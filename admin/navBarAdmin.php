<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<div class="navbar">

    <div class="navbar-desktop">
        <ul class="navbar-items-desktop">
            <li class="navbar-links-desktop">
                <a class="navbar-link-desktop" href="../view/home.php">Shop View</a>
            </li>
            <li class="navbar-links-desktop">
                <a class="navbar-link-desktop" href="./homeAdmin.php">Products</a>
            </li>
            <li class="navbar-links-desktop">
                <a class="navbar-link-desktop" href="./ordersAdmin.php">Orders</a>
            </li>

            <?php if(!empty($_SESSION['user'])) {
                echo            "<li class='navbar-links-desktop'>
                                    <a class='navbar-link-desktop' href='../view/logOut.php'>Log Out</a>
                                </li>
                                <li class='navbar-links-desktop'>
                                    <a class='navbar-link-desktop' href='../view/profile.php'>{$_SESSION['user']['name']}</a>
                                </li>";
            }
            ?>
        </ul>
    </div>

    <div class="navbar-mobile">
        
        <i class="fa-solid fa-bars"></i>

        <ul class="navbar-items-mobile">

            <i class="fa-solid fa-xmark"></i>

            <li class="navbar-links-mobile">
                <a class="navbar-link-mobile" href="../view/home.php">Shop View</a>
            </li>
            <li class="navbar-links-mobile">
                <a class="navbar-link-mobile" href="./homeAdmin.php">Products</a>
            </li>
            <li class="navbar-links-mobile">
                <a class="navbar-link-mobile" href="./ordersAdmin.php">Orders</a>
            </li>
            <?php if(!empty($_SESSION['user'])) {
                echo            "<li class='navbar-links-mobile'>
                                    <a class='navbar-link-mobile' href='../view/logOut.php'>Log Out</a>
                                </li>
                                <li class='navbar-links-mobile'>
                                    <a class='navbar-link-mobile' href='../view/profile.php'>{$_SESSION['user']['name']}</a>
                                </li>";
            }
            ?>
        </ul>
    </div>

</div>


