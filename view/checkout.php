<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(empty($_SESSION['cart'])) {
    header("location:./cart.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/checkout.style.css">
    <link rel="stylesheet" href="./css/navBar.style.css">
    <title>Checkout</title>
</head>
<body>
<?php

    include_once "./navBar.php";

?>
    <div class="checkout-wrapper">

    <form class='checkout-form' action='../includes/order.handler.php' method='POST'>

        <strong class="checkout-error"><?php if(!empty($_SESSION['errors']['empty'])) { echo $_SESSION['errors']['empty']; unset($_SESSION['errors']);} ?></strong>
                <input class='checkout-input' type='text' name='name' value="<?php if(!empty($_SESSION['user'])) { echo $_SESSION['user']['name']; } ?>" placeholder='Your Name'> 

                <input class='checkout-input' type='text' name='email' value="<?php if(!empty($_SESSION['user'])) { echo $_SESSION['user']['email']; }?>" placeholder='Your Email'> 

                <input class='checkout-input' type='text' name='country' value="<?php if(!empty($_SESSION['old']['country'])) {echo $_SESSION['old']['country'];} ?>" placeholder='Country'>
                
                <input class='checkout-input' type='text' name='region' value="<?php if(!empty($_SESSION['old']['region'])) {echo $_SESSION['old']['region'];} ?>" placeholder='Region'>

                <input class='checkout-input' type='text' name='street' value="<?php if(!empty($_SESSION['old']['street'])) {echo $_SESSION['old']['street'];} ?>"  placeholder='Street Name'>

                <input class='checkout-input' type='text' name='houseNumber' value="<?php if(!empty($_SESSION['old']['houseNumber'])) {echo $_SESSION['old']['houseNumber'];} ?>" placeholder='House Number'>

                <input class='checkout-input' type='text' name='phoneNumber' value="<?php if(!empty($_SESSION['old']['phoneNumber'])) {echo $_SESSION['old']['phoneNumber'];} ?>" placeholder='Phone Number'>

                <select class='checkout-input' name="payment" id="payment">
                    <option value="CASH">Cash On Delivery</option>
                    <option value="CARD">CARD</option>
                </select>

                <div class="checkout-form-card" id="checkout-form-card">
                
                    <div class="card-wrapper">

                    </div>
                    <div class="card-wrapper-2">

                    </div>
                </div>
                <button class='checkout_button' type='submit' name='checkout_button'> Place order </button>
          </form>

 

<?php
    unset($_SESSION['old']);
?>  
</div>
    <script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
    <script src="./js/navBar.script.js"></script>
    <script src="./js/productDetails.script.js"></script>
    <script src="./js/checkout.js"></script>
</body>
</html>