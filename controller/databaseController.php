<?php

class DatabaseController {

    protected $serverName = "localhost";
    protected $userName = "root";
    protected $passwordDb = "";
    protected $dbName = "storeonline";

    protected function connect() {
        
        try {
            
            $conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbName",$this->userName, $this->passwordDb);


            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $conn;

        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    
    
}