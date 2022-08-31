<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!empty($_SESSION['user'])) { 

        header("location:../view/home.php?loggedDenied");
        exit();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./homeImages/favicon.ico">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./css/navBar.style.css">
    <link rel="stylesheet" href="./css/sign.style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>
<body>

<?php 
    include_once "./navBar.php"; 
?>

<div class="sign-wrapper">
    <form action="../includes/signup.handler.php" method="POST" class="signup-form">

        <input class="signup-input" type="text" name="name" id="Name" placeholder="Name">
        <strong class="signup-error"><?php if(!empty($_SESSION['errors']['empty'])) { echo $_SESSION['errors']['empty'];} ?></strong>


        <input class="signup-input" type="text" name="email" placeholder="Email">
        <strong class="signup-error"><?php if(!empty($_SESSION['errors']['email'])) { echo $_SESSION['errors']['email'];} ?></strong>
        <strong class="signup-error"><?php if(!empty($_SESSION['errors']['emailRegistered'])) { echo $_SESSION['errors']['emailRegistered'];} ?></strong>
        
        

        <input class="signup-input" type="text" name="password" placeholder="Password">
        <strong class="signup-error"><?php if(!empty($_SESSION['errors']['password'])) { echo $_SESSION['errors']['password'];} ?></strong>
        

        <input class="signup-input" type="text" name="passwordRepeat" placeholder="Password Confirm">

        <button class="signup-button" type="submit" name="sign-button">Sign Up</button>

    </form>
    <div class="form-subheader">
         <a class="subheader-item" href="./logIn.php">Already have an account ?</a>
    </div>
</div>

<?php
    // session_unset();
    // session_destroy();
    unset($_SESSION['errors']);
?>

<script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
<script src="./js/navBar.script.js"></script>
<script src="./js/cart.js"></script>
</body>
</html>