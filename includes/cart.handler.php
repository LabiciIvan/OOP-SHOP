<?php

include_once "../controller/cartController.php";

// HANDLER FOR PHP FORM TO ADD TO CART |-> THIS WILL RELOAD THE BROWSER
if (isset($_POST['add-to-cart-button']))  
{
    $id = $_POST['add-to-cart-button'];

    echo $id;

    $cartController = new CartController($id);

    if ($cartController->checkIfProductAlreadyInCart() == true) {

        $cartController->increaseProductQuantity();

    } else {

        $cartController->addProductToCart();
    }

    // $cartController->calculateTotalCart();

    header("location:" . $_SERVER['HTTP_REFERER']);
}

if(isset($_GET['cartRemove'])) {

    $id = $_GET['cartRemove'];

    $cartController = new CartController($id);

    $cartController->removeProductFromCart();
}

// HANDLER FOR AJAX REQUEST TO ADD TO CART |-> THIS WILL NOT RELOAD THE BROWSER
if(isset($_GET['addButton'])) {

    // echo $_GET['addButton'];
    $id = $_GET['addButton'];

    $cartController = new CartController($id);



    if ($cartController->checkIfProductAlreadyInCart() == true) {

        $cartController->increaseProductQuantity();

    } else {

        $cartController->addProductToCart();
    }

    echo json_encode($_SESSION['cart']);
}

if(isset($_GET['cartItems'])) {
    
    session_start();
    
    echo json_encode($_SESSION['cart']);
}

// HANDLER FOR AJAX REQUEST TO DECREASE CART ITEM |-> THIS WILL NOT RELOAD THE BROWSER
if(isset($_GET['cartDecrease'])) {
    
    $id = $_GET['cartDecrease'];

    
    $cartController = new CartController($id);

    $cartController->decreaseProductQuantity();
    
    echo $id;
}
// HANDLER FOR AJAX REQUEST TO INCREASE CART ITEM |-> THIS WILL NOT RELOAD THE BROWSER
if(isset($_GET['cartIncrease'])) {
    
    $id = $_GET['cartIncrease'];

    
    $cartController = new CartController($id);
    $cartController->increaseProductQuantity();
    
    echo $id;
}

// HANDLER TO INCREASE CART QUANTITY
if(isset($_POST['increase-cart-button'])) {

    $id = $_POST['increase-cart-button'];

    $cartController = new CartController($id);

    $cartController->increaseProductQuantity();

    header("location:../view/cart.php");
    exit();

}

// HANDLER TO DECREASE CART QUANTITY
if(isset($_POST['decrease-cart-button'])) {

    $id = $_POST['decrease-cart-button'];


    $cartController = new CartController($id);

    $cartController->decreaseProductQuantity();

    header("location:../view/cart.php");
    exit();
}

// HANDLER TO DECREASE CART QUANTITY WITH AJAX
if(isset($_GET['decreaseButton'])) {

    $id = $_GET['decreaseButton'];


    $cartController = new CartController($id);

    $cartController->decreaseProductQuantity();

    echo $_SESSION['cart'];
}

if(isset($_POST['remove-cart-button'])) {

    $id = $_POST['remove-cart-button'];

    $cartController = new CartController($id);

    $cartController->removeProductFromCart();

    header("location:../view/cart.php");
    exit();

}