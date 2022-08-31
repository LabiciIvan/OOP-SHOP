<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['user']) || $_SESSION['user']['admin'] !== '1') { 

        header("location:../home.php?onlyAdmin");
        exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../view/homeImages/favicon.ico">
    <title>Details</title>
    <link rel="stylesheet" href="./css/productDetails.style.css">
    <link rel="stylesheet" href="./css/homeAdmin.style.css">
    <link rel="stylesheet" href="./css/ordersAdmin.style.css">
</head>
<body>
<?php

    include_once "./navBarAdmin.php";
    include_once "../model/productModel.php";


    $id = $_GET['id'];
    
    $productModel = new ProductModel();
    
    $productDB = $productModel->queryGetProduct($id);
    $productImageDB = $productModel->queryProductImages($id);

    // print_r($productDB);
    // print_r($productImageDB);
    // exit();

?>
    <a href="./homeAdmin.php"><i class="fa-solid fa-backward"></i></a>

    <div class="admin-product-details">

    <div class="row">

    <div class="square">
        
    <?php
        foreach($productImageDB as $image) {
            // print_r($image);
            
            echo "<form class='product-form-one' action='../includes/product.handler.php' method='POST' enctype='multipart/form-data'>
                    <div class='row-first'>
                        <img class='product-image' src='../view/uploads/{$image['path']}'>
                        <i id='trash' class='fa-solid fa-trash-can'><input type='hidden' id='imageId' value='{$image['id']}'><input type='hidden' id='imagePath' value='{$image['path']}'><input type='hidden' id='productId' value='{$image['produc_id']}'></i>
                    </div>
                    <div class='row-one'>
                    <label for='{$image['id']}'><i class='fa-solid fa-camera'></i></label>

                    <input id='{$image['id']}' class='product-input-2' type='file' name='image'>

                    <button class='product-button-2' type='submit' name='edit-form-button-2' value='{$image['id']}'>Save</button>
                    </div>
                    </form>";
        }

    ?>

    <form class='product-form-new' action='../includes/product.handler.php' method='POST' enctype='multipart/form-data' >
        <label for='newImage'><i class='fa-solid fa-camera new'></i></label>

        <input id='newImage' class='product-input-new' type='file' name='image'>

        <button class='product-button-new' type='submit' name='form-add-a-new-image' value="<?php echo $productDB[0]['id']; ?>" >Upload</button>
    </form>
    </div>

    <div class="square">
        <form class="product-form-1" action="../includes/product.handler.php" method="POST">
            <label class="form-1-label" for="name">Name</label>
            <input id="name" class='product-input-1' type="text" name="name" value="<?php echo $productDB[0]['name'] ?>">

            <label class="form-1-label" for="price">price</label>
            <input id="price" class='product-input-1' type="text" name="price" value="<?php echo $productDB[0]['price'] ?>">
            
            <label class="form-1-label" for="description">Description</label>
            <textarea id="description" class='product-input-1 description' name="description"><?php echo $productDB[0]['description'] ?></textarea>

            <button class="product-button-1" type="submit" name="edit-form-button-1" value="<?php echo $productDB[0]['id']; ?>">Save</button>
        </form>
    </div>
    </div>

    <div class="square-3">
        <form class="product-form-3" action="../includes/product.handler.php" method="POST">
                <button class="product-button-3" type="submit" name="edit-form-button-3" value="<?php echo $productDB[0]['id']; ?>">Delete Product</button>
        </form>
    </div>

 

    
   

    </div>
    <div class="square">

    </div>

    <script src="../view/js/navBar.script.js"></script>
    <script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
    <script src="./js/productDetails.js"></script>
</body>
</html>