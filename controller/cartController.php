<?php

include_once "../model/productModel.php";

// use Controller\Interface\CartInterface;

interface CartInterface {

    public function addProductToCart();

    public function checkIfProductAlreadyInCart();

    public function increaseProductQuantity();


}

class CartController extends ProductModel implements CartInterface {

    public $id;

    public function __construct($id) 
    {
        $this->id = $id;
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();

            if(!isset($_SESSION['cart'])) {

                $_SESSION['cart'] = array();
            }
            
        }
    }

    public function addProductToCart() {

        $product = $this->queryGetProduct($this->id);

        $quantity = array('quantity' => 1);

        $totalProduct = array('totalProduct' => $quantity['quantity'] * $product[0]['price']);
        

        $product[0] = array_merge($product[0], $quantity);
        $product[0] = array_merge($product[0], $totalProduct);

        $_SESSION['cart'] = array_merge($_SESSION['cart'], $product);

    }



    // This method will return TRUE if there is a product in cart, FALSE otherwise
    public function checkIfProductAlreadyInCart() {

        for($i = 0; $i < count($_SESSION['cart']); ++$i) {

            if($_SESSION['cart'][$i]['id'] == $this->id) {
                
                return true;
                exit();
            }
        }

        return false;
    }

    public function increaseProductQuantity() {

        for($i = 0; $i < count($_SESSION['cart']); ++$i) {

            if($_SESSION['cart'][$i]['id'] == $this->id) {

                $_SESSION['cart'][$i]['quantity'] =  $_SESSION['cart'][$i]['quantity']  + 1;
                $_SESSION['cart'][$i]['totalProduct'] =  $_SESSION['cart'][$i]['totalProduct']  +  $_SESSION['cart'][$i]['price'];
            }
        }
    }

    public function decreaseProductQuantity() {

        for($i = 0; $i < count($_SESSION['cart']); ++$i) {

            if($_SESSION['cart'][$i]['id'] == $this->id && $_SESSION['cart'][$i]['quantity'] > 1) {

                $_SESSION['cart'][$i]['quantity'] =  $_SESSION['cart'][$i]['quantity']  - 1;
                $_SESSION['cart'][$i]['totalProduct'] =  $_SESSION['cart'][$i]['totalProduct']  -  $_SESSION['cart'][$i]['price'];
            }
        }
    }

    public function removeProductFromCart() {
        for($i = 0; $i < count($_SESSION['cart']); ++$i) {

            if($_SESSION['cart'][$i]['id'] == $this->id) {

                unset($_SESSION['cart'][$i]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }

    }


}