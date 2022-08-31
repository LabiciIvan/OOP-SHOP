<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(empty($_SESSION['user'])) {

        header("location:./logIn.php?cantLogOut");
        exit();
    }

    // session_unset();
    // session_destroy(); 

    unset($_SESSION['user']);
    header("location:./logIn.php?loggedOut");
exit();