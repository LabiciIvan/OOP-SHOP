<?php

include_once "../controller/databaseController.php";

class LoginModel extends DatabaseController {


    // Will query DB and return the result
    protected function queryForCredentials($email) {

        $sql = "SELECT * FROM users WHERE email=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(array($email));

        $result = $stmt->fetch();

        $stmt = NULL;

        return $result;
    }
}