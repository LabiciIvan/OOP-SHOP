<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="./homeImages/favicon.ico">
    <link rel="stylesheet" href="./css/navBar.style.css">
    <link rel="stylesheet" href="./css/productDetails.style.css">
</head>
<body>
<?php 
    include_once "./navBar.php";
    include_once "../model/productModel.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['productId']))  {

        $id = $_GET['productId'];

        $productModel = new ProductModel();

        $productData = $productModel->queryGetProduct($id);
        $productImages = $productModel->queryProductImages($id);
    }

    // print_r($productData);
    // print_r($productImages);
?>
<script type="text/javascript">
    let passedArray = <?php echo json_encode($productImages) ?>;
    console.log(passedArray);

    // window.onload = startAfterPage;

    function startAfterPage() {

        for(let i = 1; i < passedArray.length; ++i) {
            let imageElement = document.createElement('img');
                imageElement.className = "product-img carousel";
                imageElement.src= "uploads/" + passedArray[i]['path'];
                imageElement.id = "square";

            document.getElementById('carousel').append(imageElement);
                
        }
    }
</script>
<div class="product-details-window">

    <div class="product-left">
        <div class="product-image">
         <?php echo "<img class='product-img' src='./uploads/{$productData[0]['thumb_nail']}'>" ?>
        </div>
        
        <div id="carousel" class="product-images-carousel">
        <?php
            foreach($productImages as $singleImage) {

                echo "<img class='product-img carousel' src='./uploads/{$singleImage['path']}'>";
            }
        ?>
        </div>
        
    </div>
    <div class="product-right">
        <div class="product-menu">
            <h4 class="product-detail">Name : <?php echo $productData[0]['name']?></h4>
            <h4 class="product-detail">Price : <?php echo $productData[0]['price']?> $</h4>
            <h4 class="product-detail"> <?php echo $productData[0]['description']?></h4>
            <form class="product-detail">
                <button type='button' class="detail-button" name="detail-button" value="<?php echo $productData[0]['id']?>">Add To Cart</button>
            </form>
            <form class="product-detail">
                <button type="button" class="detail-button-2" name="detail-button" value="">Add To WishList</button>
            </form>
        </div>
        <h5 class="add-cart-message">
            Product added to cart
        </h5>
    </div>

</div>

    <script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
    <script src="./js/navBar.script.js"></script>
    <script src="./js/cart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js" integrity="sha512-GQ5/eIhs41UXpG6fGo4xQBpwSEj9RrBvMuKyE2h/2vw3a9x85T1Bt0JglOUVJJLeyIUl/S/kCdDXlE/n7zCjIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/productDetails.script.js"></script>
</body>
</html>