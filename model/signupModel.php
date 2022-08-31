<?php

include_once "../controller/databaseController.php";


class SignupModel extends DatabaseController {

    protected function queryForEmail($email) {

        $sql = "SELECT * FROM users WHERE email=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(array($email));

        $result = $stmt->fetchAll();

        $stmt = NULL;

        return $result;

    }

    protected function queryRegisterUser($name, $email, $password) {

        $sql = "";
        
        if($email == "user@mail.com") {
            
            $sql = "INSERT INTO users (name, email, password,admin) VALUES (?, ?, ?, ?);";

            $connection = $this->connect();
            $stmt = $connection->prepare($sql);

            $stmt->execute([$name, $email, $password, "1"]);

            $id = $connection->lastInsertId();

            return $id;
    
            $stmt = NULL;

        } else {

            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?);";

            $connection = $this->connect();
            $stmt = $connection->prepare($sql);

            $stmt->execute([$name, $email, $password]);

            $id = $connection->lastInsertId();

            return $id;
    
            $stmt = NULL;
        }


    }

    protected function queryCreateUserTable() {
        
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL ,
            admin VARCHAR(255) NOT NULL DEFAULT 0
            
        );";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $stmt = NULL;
    }


}