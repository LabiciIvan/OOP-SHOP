<?php

include_once "../controller/databaseController.php";

class OrderModel extends DatabaseController {

    protected function createOrderTableForOrder() {

        $sql = "CREATE TABLE IF NOT EXISTS orders (
                id INT AUTO_INCREMENT PRIMARY KEY,
                order_date timestamp,
                products TEXT NOT NULL,
                products_total TEXT NOT NULL,
                user_email TEXT NOT NULL,
                user_name TEXT NOT NULL,
                country TEXT NOT NULL,
                region TEXT NOT NULL,
                street TEXT NOT NULL,
                houseNumber TEXT NOT NULL,
                phoneNumber TEXT NOT NULL,
                checked VARCHAR(255) DEFAULT 'unconfirmed',
                user_id VARCHAR(255) NOT NULL

        );";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $stmt = NULL;
    }

    protected function createOrderGuestTableForOrderGuest() {

        $sql = "CREATE TABLE IF NOT EXISTS orders_guest (
                id INT AUTO_INCREMENT PRIMARY KEY,
                order_date timestamp,
                products TEXT NOT NULL,
                products_total TEXT NOT NULL,
                user_email TEXT NOT NULL,
                user_name TEXT NOT NULL,
                country TEXT NOT NULL,
                region TEXT NOT NULL,
                street TEXT NOT NULL,
                houseNumber TEXT NOT NULL,
                phoneNumber TEXT NOT NULL,
                checked VARCHAR(255) DEFAULT 'unconfirmed'

        );";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $stmt = NULL;
    }

    protected function insertOrder($products,$products_total, $user_email, $user_name, $country, $region, $street, $houseNumber, $phoneNumber, $user_id) {

            $sql = "INSERT INTO orders (products, products_total, user_email, user_name, country, region, street, houseNumber, phoneNumber, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$products,$products_total, $user_email, $user_name, $country, $region, $street, $houseNumber, $phoneNumber, $user_id]);

            $stmt = NULL;
    }

    protected function insertOrderGuest($products,$products_total, $user_email, $user_name, $country, $region, $street, $houseNumber, $phoneNumber) {

        $sql = "INSERT INTO orders_guest (products, products_total, user_email, user_name, country, region, street, houseNumber, phoneNumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$products,$products_total, $user_email, $user_name, $country, $region, $street, $houseNumber, $phoneNumber]);

        $stmt = NULL;
}

    public function confirmOrder($id) {
        $sql = "UPDATE orders SET checked=? WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['confirmed', $id]);

        $stmt = NULL;

    }

    public function confirmOrderGuest($id) {
        $sql = "UPDATE orders_guest SET checked=? WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['confirmed', $id]);

        $stmt = NULL;

    }

    public function cancelOrder($id) {
        $sql = "UPDATE orders SET checked=? WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['cancel', $id]);

        $stmt = NULL;

    }

    public function cancelOrderGuest($id) {
        $sql = "UPDATE orders_guest SET checked=? WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['cancel', $id]);

        $stmt = NULL;

    }

    public function getConfirmedOrders() {

        $sql = "SELECT * FROM orders WHERE checked=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['confirmed']);

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getConfirmedOrdersGuest() {

        $sql = "SELECT * FROM orders_guest WHERE checked=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['confirmed']);

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getCanceledOrders() {

        $sql = "SELECT * FROM orders WHERE checked=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['cancel']);

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getCanceledOrdersGuest() {

        $sql = "SELECT * FROM orders_guest WHERE checked=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['cancel']);

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getOrders() {

        $sql = "SELECT * FROM orders WHERE checked=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['unconfirmed']);

        $result = $stmt->fetchAll();

        return $result;
    }
    public function getOrdersGuest() {

        $sql = "SELECT * FROM orders_guest WHERE checked=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(['unconfirmed']);

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getOneOrder($id) {

        $sql = "SELECT * FROM orders WHERE id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        $result = $stmt->fetchAll();

        return $result;
    }
    public function getOneOrderGuest($id) {

        $sql = "SELECT * FROM orders_guest WHERE id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        $result = $stmt->fetchAll();

        return $result;
    }

    public function removeOrderRecordFromDB($id) {
        
        $sql = "DELETE FROM orders WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        $stmt = NULL;
    }
    
    public function removeOrderRecordFromDBGuest($id) {
        
        $sql = "DELETE FROM orders_guest WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        $stmt = NULL;
    }
}