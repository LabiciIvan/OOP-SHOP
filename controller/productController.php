<?php

include_once "../model/productModel.php";

class ProductController extends ProductModel
{

    private $name;
    private $description;
    private $price;
    private $images = array();

    public function __construct($name, $description, $price, $images)
    {

        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->images = $images;
    }

    public function registerProducts()
    {

        $errorsFound = false;

        session_start();

        $_SESSION['errors'] = array();

        if ($this->checkInput() == true) {
            $errorsFound = true;

            $error = array('empty1' => 'All fields are required');
            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);

            $error = array('empty2' => 'Minimum one image is required');
            $_SESSION['errors'] = array_merge($_SESSION['errors'], $error);

        }

        if ($errorsFound == true) {

            header("location:../admin/homeAdmin.php?errorEmptyFields");
            exit();
        }
        $this->queryCreateProductsTable();

        $this->queryCreateImagesTable();

        $id = $this->registerProductData();

        $this->registerThumbnailPicture($id);

        $this->registerProductImages($id);

    }

    // If empty values will return TRUE otherwise FALSE
    private function checkInput()
    {

        if (empty($this->name) || empty($this->description) || empty($this->price) || empty($this->images)) {

            return true;
            exit();
        }
        return false;
    }

    // Will return the id from the method of the databaseController of the last inserted product 'current one'
    private function registerProductData()
    {

        $id = $this->queryInsertProductData($this->name, $this->description, $this->price);

        return $id;

    }

    private function registerProductImages($id)
    {

        for ($i = 1; $i < count($this->images['name']); ++$i) {

            $imageName = $this->images['name'][$i];
            $imageSize = $this->images['size'][$i];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            $imageName = 'ID-' . $i . '-' . date("Y-m-d") . '-' . date("h-i-s") . '.' . $imageExtension;

            $this->queryInsertProductImages($imageName, $id);

            $uploadDirectory = "../view/uploads/";
            $filePath = $uploadDirectory . $imageName;

            move_uploaded_file($this->images['tmp_name'][$i], $filePath);

        }

    }

    private function registerThumbnailPicture($id)
    {

        $imageName = $this->images['name'][0];
        $imageSize = $this->images['size'][0];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        $imageName = 'THUMBNAIL' . '-' . date("Y-m-d") . '-' . date("h-i-s") . '.' . $imageExtension;

        $this->queryInsertThumbnailPicture($id, $imageName);
        $this->queryInsertProductImages($imageName, $id);

        $uploadDirectory = "../view/uploads/";
        $filePath = $uploadDirectory . $imageName;

        move_uploaded_file($this->images['tmp_name'][0], $filePath);

    }
}
