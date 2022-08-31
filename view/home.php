<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="./homeImages/favicon.ico">
    <link rel="stylesheet" href="./css/navBar.style.css">
    <link rel="stylesheet" href="./css/home.style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Poppins:wght@500&family=Silkscreen&display=swap" rel="stylesheet">
</head>
<body>
<?php
    include_once "./navBar.php";

    if (session_status() === PHP_SESSION_NONE) {
        // session_start();

        session_destroy();
    }
    // if(!empty($_SESSION['user'])) { 
        
    //     print_r($_SESSION['user']);
    //  }
?>

<div class="home-page">

    <div class="row-one">
        <div class="one-left">
            <h3>An online</h3>
            <h3>E-commerce with</h3>
            <h3>Simple shop, fast shipping.</h3>
        </div>
        <div class="one-right">
            <input type="input" class="notify-client"  placeholder="Enter email to subscribe">
            <button class="button-submit">Add me</button>
        </div>
    </div>

    <div class="row-two">
        <div class="column-one">
            <div class="one-title">
                Modular
            </div>
            <p class="one-p">
                Our shop take the respnsabillity
                to bring our customers the best experience
                for shopping and a large variey of products to choose from.
            </p>
        </div>

        
        <div class="column-two">
            <div class="two-title">
                Customizable
            </div>
            <p class="two-p">
                Register now and you benefit discount codes
                and a more faster order placing, saving your time to complete 
                all the orders fileds.
            </p>
        </div>

        <div class="column-three">
            <div class="three-title">
                Managed Payments
            </div>
            <p class="three-p">
                There are customers who pay cash or they 
                want to use their bank card, well
                we got you there...just leave all the processing to us.
            </p>
        </div>

        
        <div class="column-four">
            <div class="four-title">
                Built to bring Art
            </div>
            <p class="four-p">
                We belive there are hundreds of artists who
                are struggling to find a place to sell their art,
                this is why we are here, to support artists who are great in what they do
                and grow with them.
            </p>
        </div>
        
    </div>

    <div class="row-three">
        <div class="three-left">
            <h3>Only for testing</h3>
        </div>
        <div class="three-right">
            <i class="fa-brands fa-square-github"></i>
            <h3> GitHub</h3>

        </div>
    </div>

</div>





<script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
<script src="./js/navBar.script.js"></script>
<script src="./js/cart.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js" integrity="sha512-/8phkpsAzxsbuX18zNkQ2gCq4Q5JsWoPo1jHLDeZorPUHRtx9YJxpdk+os05oDhPJVCNzA2/NMl4rmJyQ+6Fvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineLite.min.js" integrity="sha512-I0VFyPo7hdM7YrEbQ0pvX4bX2904k0+B19u/xBrPrQoMprfcSnIDfGFD8kP52GbAhwtDjkEVhXlQvj8+vkJyew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js" integrity="sha512-ht40uOoiTef4nKq0THVzjIGh3VS108J577LVVgNXnQLXza3doXjoM3owin2vd+Hm6w88k12RIrePIVY2WNzz6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js" integrity="sha512-GQ5/eIhs41UXpG6fGo4xQBpwSEj9RrBvMuKyE2h/2vw3a9x85T1Bt0JglOUVJJLeyIUl/S/kCdDXlE/n7zCjIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/home.js"></script>


</body>
</html>