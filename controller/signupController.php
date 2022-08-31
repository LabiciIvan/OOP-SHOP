<?php

include_once "../model/signupModel.php";

class SignupController extends SignupModel {

    private $name;
    private $email;
    private $password;
    private $passwordRepeat;

    public function __construct($name, $email, $password, $passwordRepeat) 
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    // THIS FUNCTION WILL EXECUTE ALL OTHER PRIVATE FUNCTIONS BELLOW
    public function register() {
        
        session_start();

        $_SESSION['errors'] = array();

        $errorFound = false;

        if($this->checkInputEmpty() == true) {

            $errorFound = true;

            $error = array('empty' => 'All fields are required!');

            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);
        }

        if($this->checkPasswordMatch() != true) {
            $errorFound = true;

            $error = array('password' => 'Password dont match!');

            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);

        }

        if($this->checkEmailValid() != true) {
            $errorFound = true;

            $error = array('email' => 'Invalid email address!');

            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);
        }

        if($this->checkIfEmailIsRegistered() == true) {

            $error = array('emailRegistered' => 'Already an account with this email!');

            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);
        }

        if($errorFound == true) {

            header("location:../view/signUp.php?errorsFound");
            exit();
        }

        $this->queryCreateUserTable();

        $id = $this->queryRegisterUser($this->name, $this->email, $this->password);

        return $id;
        exit();
    }


    // If empty input return TRUE otherwise FALSE
    private function checkInputEmpty() {

        if(empty($this->name) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            return true;
            exit();
        }

        return false;

    }

    // If password match return TRUE otherwise FALSE
    private function checkPasswordMatch() {

        if($this->password == $this->passwordRepeat) {

            return true;
            exit();
        }

        return false;
    }

    // If email valid return TRUE otherwise FALSE
    private function checkEmailValid() {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            return false;
            exit();
          }

          return true;

    }

    // If email is registered will return TRUE otherwise FALSE
    private function checkIfEmailIsRegistered() {

        $resultQuery = $this->queryForEmail($this->email);

        if(empty($resultQuery)) {

           return false;
           exit();
        }
        return true;
    }
}