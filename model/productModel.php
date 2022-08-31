<?php

include_once "../controller/databaseController.php";

class ProductModel extends DatabaseController {

    protected function queryInsertProductData($name, $description, $price) {

        $sql = "INSERT INTO products(name, description, price) VALUES(?, ?, ?);";

        $connection = $this->connect();
        $stmt = $connection->prepare($sql);

        $stmt->execute([$name, $description, $price]);

        $id = $connection->lastInsertId();

        $stmt = NULL;

        return $id;
    }

    protected function queryCreateProductsTable() {
        
        $sql = "CREATE TABLE IF NOT EXISTS products (

            id INT AUTO_INCREMENT PRIMARY KEY,
            created_at timestamp,
            name VARCHAR(255) NOT NULL,
            price VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            thumb_nail TEXT NULL
        );";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $stmt = NULL;
    }

    public function queryUpdateProductData($name, $price, $description, $productId) {

        $sql = "UPDATE products SET name=?, price=?, description=? where id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$name, $price, $description,  $productId]);

        $stmt = NULL;


        
    }

    protected function queryCreateImagesTable() {
        
        $sql = "CREATE TABLE IF NOT EXISTS images (
            
            id INT AUTO_INCREMENT PRIMARY KEY,
            path TEXT NOT NULL,
            product_id VARCHAR(255) NOT NULL
        );";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $stmt = NULL;
    }

    public function queryInsertProductImages($imageName, $productId) {

        $sql = "INSERT INTO images(path, produc_id) VALUES (?, ?);";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$imageName, $productId]);

        $stmt = NULL;

    }

    public function queryUpdateSpecificImage($imageId, $imageName) {

        $sql = "UPDATE images SET path=? WHERE id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$imageName, $imageId]);

        $stmt = NULL;
    }

    public function queryInsertThumbnailPicture($id, $imageName) {

        $sql = "UPDATE products SET thumb_nail=? WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$imageName, $id]);

        $stmt = NULL;
    }

    // Function is public to access if when instantiate the class
    public function queryGetProduct($id) {

        $sql = "SELECT * FROM products WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);


        $stmt->execute([$id]);

        $result = $stmt->fetchAll();

        return $result;

    }

    // Function is public to access if when instantiate the class
    public function queryAllProducts() {

        $sql = "SELECT * FROM products";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }
    // Function is public to access if when instantiate the class
    public function queryProductImages($id) {
        
        $sql = "SELECT * FROM images WHERE produc_id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        $result = $stmt->fetchAll();

        return $result;



    }

    public function queryImage($id) {
        
        $sql = "SELECT * FROM images WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        $result = $stmt->fetchAll();

        return $result;

    }

    public function queryDeleteImagesFromDB($productId) {

        $sql = "DELETE  from images WHERE produc_id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$productId]);

        $stmt = NULL;
    }

    public function queryDeleteSpecificImage($productId, $imageId) {

        $sql = "DELETE  from images WHERE produc_id=? AND id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$productId, $imageId]);

        $stmt = NULL;
    }

    public function queryDeleteProduct($productId) {

        $sql = "DELETE  from products WHERE id=?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$productId]);

        $stmt = NULL;

    }
}