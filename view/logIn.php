<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="./css/navBar.style.css">
    <link rel="stylesheet" href="./css/login.style.css">
    <link rel="icon" href="./homeImages/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>
<body>
<?php
    include_once "./navBar.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!empty($_SESSION['user'])) { 

        header("location:../view/home.php?loggedDenied");
        exit();
     }
?>

<div class="login-wrapper">
    <form action="../includes/login.handler.php" method="POST" class="login-form">

        <input class="login-input" type="text" name="email" placeholder="Email">
        <strong class="login-error"><?php if(!empty($_SESSION['errors']['empty'])) { echo $_SESSION['errors']['empty'];} ?></strong>
        
        <input class="login-input" type="text" name="password" placeholder="Password">
        <strong class="login-error"><?php if(!empty($_SESSION['errors']['login'])) { echo $_SESSION['errors']['login'];} ?></strong>

        <button class="login-button" type="submit" name="login-button">Log In</button>
        
    </form>
    <div class="form-subheader">
         <a class="subheader-item" href="../passwordReset">Forgot your password ?</a>
         <a class="subheader-item" href="./signUp.php">Don't have an account ?</a>
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