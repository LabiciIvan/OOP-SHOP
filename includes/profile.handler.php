<?php

include_once "../controller/profileController.php";

if(isset($_POST['userId'])) {

    $id = $_POST['userId'];
    

    $profileController = new ProfileController($id);

    $profile =$profileController->getProfile();

    print_r(json_encode($profile[0]));
    exit();
 
} else if(isset($_POST['orders'])) {
    $id = $_POST['orders'];


    $profileController = new ProfileController($id);

    $orders = $profileController->getOrdersForLogged();

    print_r(json_encode($orders));

    exit();


} else {
    
    header("location:../view/logIn.php?accessDenied");
    exit();
}
