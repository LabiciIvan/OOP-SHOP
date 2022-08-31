<?php

include_once "../controller/databaseController.php";

class SubscribeModel extends DatabaseController {

    protected function queryCreateSubscribeTable() {

        $sql = "CREATE TABLE IF NOT EXISTS subscribe (

            id INT AUTO_INCREMENT PRIMARY KEY,
            created_at timestamp,
            email VARCHAR(255) UNIQUE NOT NULL
        );";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $stmt = NULL;
    }

    protected function querySubscribeTableForEmail($email) {

        $sql = "SELECT * FROM subscribe WHERE email=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    protected function querySubscribeUser($email) {

        $sql = "INSERT INTO subscribe (email) VALUES(?);";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$email]);

        $stmt = NULL;
    }

    protected function queryInsertEmailToSubscribe() {

        
    }

}