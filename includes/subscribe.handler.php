<?php
include_once "../controller/subscribeController.php";

if(isset($_POST['value'])) {

    $email = $_POST['value'];

    $responeseMessage = "Successfully subscribed to our shop.";
    // echo $responeseMessage;

    $subscribeController = new SubscribeController();
    $subscribeController->createTableSubscribeIfNotExists();

    // check if the input is empty or if email is not a valid format
   if(($subscribeController->emptyInput($email) == true) || ($subscribeController->checkIfInputIsEmail($email) == false)) {

    echo 'true';
    exit();
   } 


    // If the result from DB is empty it means no email was found in DB and then we will insert it in DB. 
   if(empty($subscribeController->checkIfEmailIsInDataBase($email))) {

    // SUBSCRIBE USER IF NO EMAIL WAS FOUND IN DB
    $subscribeController->subscribeUser($email);
   }


}

