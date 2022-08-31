<?php
    include_once "../controller/productController.php";
    include_once "../model/productModel.php";
    include_once "../controller/cartController.php";


if(isset($_POST['product-register'])) {
    $name =         sanitizeInput($_POST['name']);
    $description =  sanitizeInput($_POST['description']);
    $price =        sanitizeInput($_POST['price']);

    $images = $_FILES['images'];
    
    $productController = new ProductController($name, $description, $price, $images);

    $productController->registerProducts();

    header("location:../admin/homeAdmin.php?productAdded");
    exit();

}

if(isset($_GET['admin-product-details'])) {

    $id = $_GET['admin-product-details'];


    header("location:../admin/productDetailsAdmin.php?id={$id}");
    exit();

}

// Handler for updating the product image
if(isset($_POST['edit-form-button-2'])) {

    // Get the image ID in $id
    $id = $_POST['edit-form-button-2'];

    $image = $_FILES['image'];

    if(empty($image['name'])) {
        
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit();
    }
    // Get the product image from DB and get Product ID
    $productModel = new ProductModel();

    $productImage = $productModel->queryImage($id);

    $productId = $productImage[0]['produc_id'];
    $imageId= $productImage[0]['id'];
    $imagePath= $productImage[0]['path'];

    // Delete image from application
    unlink("../view/uploads/" . $imagePath);

    // IF image is the THUMBNAIL
    if(str_contains($imagePath, "THUMBNAIL")) {
    
        $imageName = $image['name'];
        $imageSize = $image['size'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            // $imageName = 'ID-'. $i . '-' . date("Y-m-d") .'-' . date("h-i-s") . '.' . $imageExtension;
        $imageName = 'THUMBNAIL' . '-' . date("Y-m-d") .'-' . date("h-i-s") . '.' . $imageExtension;

        $productModel->queryInsertThumbnailPicture($productId, $imageName);
        $productModel->queryUpdateSpecificImage($imageId, $imageName);

        $uploadDirectory = "../view/uploads/";
        $filePath = $uploadDirectory . $imageName;

        move_uploaded_file($image['tmp_name'], $filePath);

    } else {
        // IF image is not a THUMBNAIL
        $imageName = $image['name'];
        $imageSize = $image['size'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        $imageName = 'ID-'. '1' . '-' . date("Y-m-d") .'-' . date("h-i-s") . '.' . $imageExtension;

        $productModel->queryUpdateSpecificImage($imageId, $imageName);

        
        $uploadDirectory = "../view/uploads/";
        $filePath = $uploadDirectory . $imageName;

        move_uploaded_file($image['tmp_name'], $filePath);

    }

    header("location:" . $_SERVER['HTTP_REFERER']);
    exit();
    
}

// Handler to update the products data NAME PRICE DESCRIPTION
if(isset($_POST['edit-form-button-1'])) {

    $productId = $_POST['edit-form-button-1'];

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    echo $name . ' '. $price .  ' ' . $description;

    if(empty($name) || empty($price) || empty($description)) {

        header("location:" . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $productModel = new ProductModel();
    $productModel->queryUpdateProductData($name, $price, $description, $productId);

    // header("location:" . $_SERVER['HTTP_REFERER']);
    header("location:../admin/homeAdmin.php");
    exit();

}

// Handler to delete a product from database
if(isset($_POST['edit-form-button-3'])) {

    $productId = $_POST['edit-form-button-3'];

    $productModel = new ProductModel();
    // Delete all product images from application
    $productImagesAll = $productModel->queryProductImages($productId);

    foreach($productImagesAll as $image) {

        unlink("../view/uploads/" .$image['path']);
    }

    // Delete product images from DB
    $productModel->queryDeleteImagesFromDB($productId);
    
    // Delete product  from DB
    $productModel->queryDeleteProduct($productId);

    header("location:../admin/homeAdmin.php");
    exit();

}

if(isset($_POST['form-add-a-new-image'])) {

    $productId = $_POST['form-add-a-new-image'];
  
    $image = $_FILES['image'];

    if(empty($image['name'])) {
        
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $productModel = new ProductModel();

    $imageName = $image['name'];
    $imageSize = $image['size'];
    $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

    $imageName = 'ID-'. '1' . '-' . date("Y-m-d") .'-' . date("h-i-s") . '.' . $imageExtension;
    
    $productModel->queryInsertProductImages($imageName, $productId);

    $uploadDirectory = "../view/uploads/";
    $filePath = $uploadDirectory . $imageName;

    move_uploaded_file($image['tmp_name'], $filePath);

    header("location:" . $_SERVER['HTTP_REFERER']);
    exit();
}

// Handler to delete the image
if(isset($_GET['deleteImage'])) {
    $imageId = $_GET['deleteImage'];
    $productId = $_GET['deleteProduct'];

    // echo $imageId . ' ' . $productId;

    $productModel = new ProductModel();

    $result = $productModel->queryImage($imageId);
    print_r($result);
    unlink("../view/uploads/" .  $result[0]['path']);

    $productModel->queryDeleteSpecificImage($productId, $imageId);
    
}
else  
{
    header("location:../view/home.php");
    exit();
}

function sanitizeInput($userInput) {

    $userInput = trim($userInput);
    $userInput = stripslashes($userInput);
    $userInput = htmlspecialchars($userInput);
    
    return $userInput;

}