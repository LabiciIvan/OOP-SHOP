<?php

include_once "../model/loginModel.php";

class LoginController extends LoginModel{

    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

    }

    public function login() {


        session_start();

        $_SESSION['errors'] = array();

        $errorsFound = false;


        if($this->checkIfInputEmpty() == true) {
            $errorsFound = true;

            $error = array('empty' => 'All fields are required!');

            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);
        }



        if($this->checkCredentials() == false) {

            $errorsFound = true;

            $error = array('login' => 'Email or Password are wrong!');

            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);
        }


        // IF there are errors will return to login page and display errors
        if($errorsFound == true) {

            header("location:../view/logIn.php?errorsFound");
            exit();
        }

        // Will Log in the user in SESSION
        $_SESSION['user'] = array();

        $queryResult = $this->queryForCredentials($this->email);

        $_SESSION['user'] = array_merge($_SESSION['user'], $queryResult);


    }


    // If empty will return TRUE otherwise FALSE
    private function checkIfInputEmpty() {

        if(empty($this->email) || empty($this->password)) {
            return true;
            exit();
        }

        return false;
    }


    // Will return TRUE if CREDENTIALS MATCH and FALSE otherwise
    private function checkCredentials() {

        $queryResult = $this->queryForCredentials($this->email);

        if(!empty($queryResult)) {

            if(($queryResult['email'] == $this->email) && ($queryResult['password'] == $this->password)) {

                return true;
                exit();
            }
        } 
        
        return false;
    }

}