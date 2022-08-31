<?php 
include_once "../controller/signupController.php";
include_once "../controller/profileController.php";

if(isset($_POST['sign-button'])) {

    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $passwordRepeat = sanitizeInput($_POST['passwordRepeat']);

    $register = new SignupController($name, $email, $password, $passwordRepeat);

    $id = $register->register();

    $profileController = new ProfileController($id);

    $profileController->createProfileTable();

    $profileController->createProfileUser();


    
    header("location:../view/logIn.php");
    exit();

}
else
{
    header("location:../view/signUp.php?accessDenied");
    exit();
}

function sanitizeInput($userInput) {

    $userInput = trim($userInput);
    $userInput = stripslashes($userInput);
    $userInput = htmlspecialchars($userInput);
    
    return $userInput;

}