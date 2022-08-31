<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./homeImages/favicon.ico">
    <title>Cart</title>
    <link rel="stylesheet" href="./css/navBar.style.css">
    <link rel="stylesheet" href="./css/cart.style.css">
</head>
<body>
<?php
    include_once "./navBar.php"; 

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

?>

<div class="cart-page">


</div>





<script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
<script src="./js/cart.js"></script>
<script src="./js/navBar.script.js"></script>
</body>
</html>