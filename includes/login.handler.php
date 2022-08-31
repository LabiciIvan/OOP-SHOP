<?php 
include_once "../controller/loginController.php";

if(isset($_POST['login-button'])) {

    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);


    $login = new LoginController($email, $password);

    $login->login();

    header("location:../view/home.php?loggedIn");
    exit();

}
else
{
    header("location:../view/logIn.php?accessDenied");
    exit();
}

function sanitizeInput($userInput) {

    $userInput = trim($userInput);
    $userInput = stripslashes($userInput);
    $userInput = htmlspecialchars($userInput);
    
    return $userInput;

}