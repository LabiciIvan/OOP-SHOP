<?php

include_once "../controller/orderController.php";
include_once "../model/orderModel.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// FOR USERS WHO ARE LOGGED IN AND HAVE AN ACCOUNT
if(isset($_POST['checkout_button']) && !empty($_SESSION['user'])) {

    // if($payment == 'CASH') {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $region = $_POST['region'];
        $street = $_POST['street'];
        $houseNumber = $_POST['houseNumber'];
        $phoneNUmber = $_POST['phoneNumber'];
        
        $order = new OrderController($name, $email, $country, $region, $street, $houseNumber, $phoneNUmber);
        
        if($order->checkOrderInput() == true) {
            header("location:../view/checkout.php");
            exit();
        }

        $order->placeOrderLogged();
    // }

    // if($payment == 'CARD') {

    // }
    
    unset($_SESSION['cart']);

    header("location:../view/products.php");
    exit();
    
} else if(isset($_POST['checkout_button']) && empty($_SESSION['user'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $region = $_POST['region'];
    $street = $_POST['street'];
    $houseNumber = $_POST['houseNumber'];
    $phoneNUmber = $_POST['phoneNumber'];

    $orderController = new OrderController($name, $email, $country, $region, $street, $houseNumber, $phoneNUmber);

    if($orderController->checkOrderInput() == true) {
        header("location:../view/checkout.php");
        exit();
    }
   
    $orderController->placeOrderGuest();

    unset($_SESSION['cart']);

    header("location:../view/products.php");
    exit();

}

if((isset($_POST['confirm']) && !empty($_SESSION['user'])) || (isset($_POST['cancel']) && !empty($_SESSION['user']))) {


    if(isset($_POST['confirm'])) {

        $id = $_POST['confirm'];
        $order = new OrderModel();
        $order->confirmOrder($id);


    } else {
        $id = $_POST['cancel'];

        $order = new OrderModel();
        $order->cancelOrder($id);
    }
  
    header("location:../admin/ordersAdmin.php");
    exit();

}

// This is to confirm in guest table

if ((isset($_POST['confirm_guest']) && !empty($_SESSION['user'])) || (isset($_POST['cancel_guest']) && !empty($_SESSION['user']))) {

    if(isset($_POST['confirm_guest'])) {

        $id = $_POST['confirm_guest'];
        $order = new OrderModel();
        $order->confirmOrderGuest($id);


    } else {
        $id = $_POST['cancel_guest'];

        $order = new OrderModel();
        $order->cancelOrderGuest($id);
    }
  
    header("location:../admin/ordersAdmin.php");
    exit();
}

if(isset($_POST['remove-order-db'])) {

    $id = $_POST['remove-order-db'];

    $order = new OrderModel();
    $order->removeOrderRecordFromDB($id);
    
    header("location:../admin/ordersAdmin.php");
    exit();
}