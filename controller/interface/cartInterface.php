<?php
// namespace Controller\Interface;

interface CartInterface {

    public function addProductToCart();

    public function checkIfProductAlreadyInCart();

    public function increaseProductQuantity();


}