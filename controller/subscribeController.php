<?php

include_once "../model/subscribeModel.php";


class SubscribeController extends SubscribeModel {

    

    public function subscribeUser($input) {

        $this->querySubscribeUser($input);

    }

    public function createTableSubscribeIfNotExists() {

        $this->queryCreateSubscribeTable();
    }

    public function sanitizeInput($input) {

            $inputSanitized = trim($input);
            $inputSanitized = stripslashes($input);
            $inputSanitized = htmlspecialchars($input);
            
            return $input;
    }

    public function emptyInput($input) {

        if(empty($input)) {

            return true;
            exit;
        } 

        return false;
    }

    public function checkIfInputIsEmail($input) {

        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {

            return false;
            
          }
          return true;
           
    }

    public function checkIfEmailIsInDataBase($input) {

        $result = $this->querySubscribeTableForEmail($input);

        return $result;
    }
}