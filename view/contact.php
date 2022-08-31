<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./css/navBar.style.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="icon" href="./homeImages/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Montserrat&family=Open+Sans:wght@300&family=Poppins:wght@500&family=Silkscreen&display=swap" rel="stylesheet">
</head>
<body>
<?php include_once "./navBar.php"; ?>

<div class="contact-page">

    <div class="row-contact">
        <img class="image-contact-header" src="./homeImages/city.jpg">
        <div class="overlay-image"></div>
        <div class="overlay-data">
            
            <h4 class="contact-title">What difference we make ?</h4>
            
            <h4 class="contact-content">Free Shipping <i class="fa-solid fa-check"></i></h4>
            <h4 class="contact-content">Order Tracking <i class="fa-solid fa-check"></i></h4>
            <h4 class="contact-content">Fast delivery <i class="fa-solid fa-check"></i></h4>
            <h4 class="contact-content">Money back <i class="fa-solid fa-check"></i></h4>
            <h4 class="contact-content">Products quality <i class="fa-solid fa-check"></i></h4>
        </div>
        
    </div>  
    
    <div class="row-contact">
        
        <div class="map-section">
            <div class="map-content">
                 <h4 class="map-content-title">How you get all this ?</h4>

                  <a href="./signUp.php" class="map-instruction">Create an account &nbsp;<i class="fa-solid fa-user"></i></a>
                    <strong class="map-helper">Don't worry, it's all free.</strong>
                  <a href="./logIn.php" class="map-instruction">Log in &nbsp;<i class="fa-solid fa-right-to-bracket"></i></a>
                    <strong class="map-helper">And that's super easy.</strong>
                  <a href="./products.php" class="map-instruction">Shop &nbsp;<i class="fa-solid fa-basket-shopping"></i></a>
                    <strong class="map-helper">There you go.</strong>
            </div>
                <img class="map-image" src="./homeImages/map.jpg" alt="">
                <div class="map-overlay"></div>
                <div class="map-overlay-data">
                    <h4 class="map-data">Free Shipping </h4>
                    <p class="map-description">Our respnsability is to see where we are sending our products and to find a way to deliver as quick as possible.</p>
                    <h4 class="map-data">Order Tracking </h4>
                    <p class="map-description">The time we found the perfect plan to deliver the order, we will email to you a code, to help you track your order in every moment.</p>
                </div>
            </div>
            
            <div class="product-section">
                <img class="product-image" src="./homeImages/money.jpg" alt="">
                <div class="product-overlay"></div>
                <div class="product-overlay-data">
                    <h4 class="product-data">Fast delivery </h4>
                    <p class="product-description">Fast delivery meaning we will deliver the products as soon as posible wanting to get the products right into your hands.</p>
                    <h4 class="product-data"> Money back </h4>
                    <p class="product-description">Did you know, if you dont like something, you can return the product in 14 days and get your money back.</p>
                </div>
                <div class="product-content">
                    <div class="product-content_contact-us">

                        <h4>What you get if you contact us &nbsp;<i class="fa-solid fa-angles-down"></i> </h4>

                        <ul>
                          <li class="animate-points-1">2-4 h to reply.</li>  
                          <li class="animate-points-2">Ask any question</li>  
                          <li class="animate-points-3">Job opportunity</li>  
                          <li class="animate-points-4">Coupons as gifts.</li>  
                        </ul>

                    </div>

                <form class="contact-us_form" action="" method="">

                    <input class="contact-us_input" type="text" name="email" placeholder="email">
                    <input class="contact-us_input" type="text" name="name" placeholder="name">
                    <textarea class="contact-us_area" name="message"></textarea>

                    <button class="contact-us_button" type="submit">Send</button>
                </form>
                
                </div>

        </div>

    </div>  



</div>




<script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
<script src="./js/navBar.script.js"></script>
<script src="./js/cart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js" integrity="sha512-GQ5/eIhs41UXpG6fGo4xQBpwSEj9RrBvMuKyE2h/2vw3a9x85T1Bt0JglOUVJJLeyIUl/S/kCdDXlE/n7zCjIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/contact.js"></script>
</body>
</html>