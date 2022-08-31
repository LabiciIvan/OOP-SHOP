<?php

include_once "../controller/databaseController.php";


class ProfileModel extends DatabaseController {

    protected function queryCreateProfileTable() {

        $sql = "CREATE TABLE IF NOT EXISTS profiles (
            id INT AUTO_INCREMENT PRIMARY KEY,
            created_at timestamp,
            country TEXT,
            region TEXT,
            street TEXT,
            houseNumber TEXT,
            phoneNumber TEXT,
            user_id VARCHAR(255) UNIQUE,
            validated VARCHAR(255) DEFAULT 'no'

    );";

    $stmt = $this->connect()->prepare($sql);

    $stmt->execute();

    $stmt = NULL;
    }

    protected function queryUpdateProfileData($country, $region, $street, $house, $phone, $id) {

        $sql = "UPDATE profiles SET country=?, region=?, street=?, houseNumber=?, phoneNumber=?, WHERE user_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$country, $region, $street, $house, $phone, $id]);

        $stmt = NULL;

    }

    protected function queryCreateProfileForUser($id) {

        $sql = "INSERT INTO profiles (user_id) VALUES (?);";

        $stmt = $this->connect()->prepare($sql);


        $stmt->execute([$id]);

        $stmt = NULL;
    }

    protected function queryValidateProfile($id){ 

        $sql = "UPDATE profiles SET validated=? WHERE user_id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(["yes", $id]);

        $stmt = NULL;
    }

    protected function queryGetProfile($id) {

        $sql = "SELECT * FROM profiles WHERE user_id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        $result = $stmt->fetchAll();

        return $result;

    }

    protected function queryGetOrdersForLoggedUser($id) {

        $sql = "SELECT * FROM orders WHERE user_id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        $result = $stmt->fetchAll();

        return $result;
    }
    
}