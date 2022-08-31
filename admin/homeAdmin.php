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
    <title>Admin Home</title>
    <link rel="icon" href="../view/homeImages/favicon.ico">
    <link rel="stylesheet" href="./css/homeAdmin.style.css">
</head>
<body>
<?php include_once "./navBarAdmin.php"; ?>
<?php include_once "../model/productModel.php"; ?>

        <!-- START FORM FOR A NEW PRODUCT -->
<div class="product-form-wrapper">

    <h4 class="form-admin-title">Here you can upload a new product.</h4>

    <form class="form-admin" action="../includes/product.handler.php" method="POST" enctype="multipart/form-data" >
        <strong class="product-error"><?php if(!empty($_SESSION['errors']['empty1'])) { echo $_SESSION['errors']['empty1'];} ?></strong>
        <strong class="product-error"><?php if(!empty($_SESSION['errors']['empty2'])) { echo $_SESSION['errors']['empty2'];} ?></strong>

        <input class="input-form" type="text" name="name" placeholder="Name">

        <input class="input-form" type="text" name="price" placeholder="Price">

        <textarea class="input-form textarea" name="description" ></textarea>

        <label class="label-form" for="images"><i class="fa-solid fa-camera"></i></label>
        <input id="images" class="input-form image" type="file" name="images[]" placeholder="Price" multiple>

        <button type="submit" class="button-form" name="product-register">Upload Product</button>
    </form>
</div>
    <!-- END FORM FOR A NEW PRODUCT -->
<div class="all-products-wrapper">
<?php
    $productModel = new ProductModel();

    $products = $productModel->queryAllProducts();
    // print_r($products);
?>
    <table class="admin-home-table">
        <tr class="description-row">
            <th class="table-title id" >Id</th>
            <th class="table-title" >Products in Shop</th>
            <th class="table-title" >Price</th>
        </tr>
<?php
    foreach($products as $product) {
    echo "<tr class='table-row'>
            <td class='table-cell'>{$product['id']}</td>
            <td class='table-cell'><a class='admin-details' href='../includes/product.handler.php?admin-product-details={$product['id']}'>{$product['name']}</a></td>
            <td class='table-cell'>{$product['price']}</td>
         </tr>";
    }
?>
    </table>
</div>

    
<?php 
unset($_SESSION['errors']);
?>

    <script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
    <script src="../view/js/navBar.script.js"></script>
</body>
</html>