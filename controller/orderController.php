<?php

include_once "../model/orderModel.php";

class OrderController extends OrderModel {

    private $name;
    private $email;
    private $country;
    private $region;
    private $street;
    private $houseNumber;
    private $phoneNumber;
    


    public function __construct($name, $email, $country, $region, $street, $houseNumber, $phoneNumber)
    {
        
        $this->name = $name;
        $this->email = $email;
        $this->country = $country; 
        $this->region = $region;
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->phoneNumber = $phoneNumber;
    }

    public function getOrderProducts() {

    }

    public function checkOrderInput() {

        if(empty($this->name) || empty($this->email) || empty($this->country) || empty($this->region) || empty($this->street) || empty($this->houseNumber) || empty($this->phoneNumber)) {

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['errors'] = array();
            $_SESSION['old'] = array();

            $error = ['empty' => 'All fields are required!'];

            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);

            if(!empty($this->name)) {
                $name = ['name' => $this->name];

                $_SESSION['old'] = array_merge($_SESSION['old'], $name);
            }

            if(!empty($this->email)) {
                $email = ['email' => $this->email];

                $_SESSION['old'] = array_merge($_SESSION['old'], $email);
            }

            if(!empty($this->country)) {
                $country = ['country' => $this->country];

                $_SESSION['old'] = array_merge($_SESSION['old'], $country);
            }

            if(!empty($this->region)) {
                $region = ['region' => $this->region];

                $_SESSION['old'] = array_merge($_SESSION['old'], $region);
            }

            if(!empty($this->street)) {
                $street = ['street' => $this->street];

                $_SESSION['old'] = array_merge($_SESSION['old'], $street);
            }

            if(!empty($this->houseNumber)) {
                $houseNumber = ['houseNumber' => $this->houseNumber];

                $_SESSION['old'] = array_merge($_SESSION['old'], $houseNumber);
            }

            if(!empty($this->region)) {
                $phoneNumber = ['phoneNumber' => $this->phoneNumber];

                $_SESSION['old'] = array_merge($_SESSION['old'], $phoneNumber);
            }

            return true;
    
        }

        return false;
    }

    public function placeOrderLogged() {

        $this->createOrderTableForOrder();

        // Calculate total of all products
        $total = 0;
        // Making a string of all products
        $products = "";
        for($i = 0; $i < count($_SESSION['cart']); ++$i) {

            $total += $_SESSION['cart'][$i]['totalProduct'];

            $products = $products .  "Name: " . $_SESSION['cart'][$i]['name'] . " , " . " Quantity: " .  $_SESSION['cart'][$i]['quantity'] . " | ";
        }

        $user_name = $_SESSION['user']['name'];
        $user_email = $_SESSION['user']['email'];
        $user_id = $_SESSION['user']['id'];

        $this->insertOrder($products,$total, $this->email, $this->name, $this->country, $this->region, $this->street, $this->houseNumber, $this->phoneNumber, $user_id);


    }

    public function placeOrderGuest() {

        $this->createOrderGuestTableForOrderGuest();

        // Calculate total of all products
        $total = 0;
        // Making a string of all products
        $products = "";

        for($i = 0; $i < count($_SESSION['cart']); ++$i) {

            $total += $_SESSION['cart'][$i]['totalProduct'];

            $products = $products .  "Name: " . $_SESSION['cart'][$i]['name'] . " , " . " Quantity: " .  $_SESSION['cart'][$i]['quantity'] . " | ";
        }

        $this->insertOrderGuest($products,$total, $this->email, $this->name, $this->country, $this->region, $this->street, $this->houseNumber, $this->phoneNumber);

    }
}