<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./homeImages/favicon.ico">
    <title>Products</title>
    <link rel="stylesheet" href="./css/navBar.style.css">
    <link rel="stylesheet" href="./css/products.style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>
<body>
<?php 
    include_once "./navBar.php";
    include_once "../model/productModel.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<div class="products-window">
    <h4 class="add-cart-message"> Product added to cart </h4>
    
    <div class="products-page">
        <a class="cart-shorcut-mobile" href="./cart.php"><i class="fa-solid fa-cart-shopping mobile"></i></a>
    <?php
    $acti = '../includes/cart.handler.php';
        $productModel = new ProductModel();

        $allProducts = $productModel->queryAllProducts();

        foreach($allProducts as $product) {

            echo "<div class='product-wrapper'>
                    <h4 class='product-title'>{$product['name']}</h4>
                    <a class='product-content' href='./productDetails.php?productId={$product['id']}'>
                        <img class='product-image' src='./uploads/{$product['thumb_nail']}'>
                    </a>
                    <div class='product-commands'>
                        <h4 class='product-price'>Price {$product['price']} $ </h4>
                        <form class='form-product' action='' method='POST'>
                            <button class='product-button-cart' type='button' name='add-to-cart-button' value='{$product['id']}' >To cart <i class='fa-solid fa-bag-shopping'></i></button>
                        </form>
                    </div>
                </div>";
        }
    ?>
    </div>
 </div>


    <script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
    <script src="./js/navBar.script.js"></script>
    <script src="./js/cart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js" integrity="sha512-GQ5/eIhs41UXpG6fGo4xQBpwSEj9RrBvMuKyE2h/2vw3a9x85T1Bt0JglOUVJJLeyIUl/S/kCdDXlE/n7zCjIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/product.js"></script>
</body>
</html>