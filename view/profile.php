<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION['user'])) { 

    header("location:./home.php?onlyLoggedUser");
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./homeImages/favicon.ico">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/navBar.style.css">
    <link rel="stylesheet" href="./css/profile.css">
</head>
<body>
<?php
    include_once "./navBar.php";
    include_once "../controller/profileController.php";
    
    $profileController = new ProfileController($_SESSION['user']['id']);


    $profile = $profileController->getProfile();
?>

<div class="profile-page">

    <div class="profile-commands">
        <div class="profile-orders">
            <input class="input-orders" type="hidden" value="<?php echo $profile[0]['user_id'];?>">
            <i class="fa-solid fa-boxes-packing"></i>
        </div>
        
        <div class="profile-details">
            <input class="input-profile" type="hidden" value="<?php echo $profile[0]['user_id'];?>">
            <i class="fa-solid fa-address-card"></i>
        </div>
    </div>

    <div class="profile-wrapper">

    </div>

    <div class="orders-wrapper">

    </div>

</div>

<script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
<script src="./js/navBar.script.js"></script>
<script src="./js/cart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js" integrity="sha512-GQ5/eIhs41UXpG6fGo4xQBpwSEj9RrBvMuKyE2h/2vw3a9x85T1Bt0JglOUVJJLeyIUl/S/kCdDXlE/n7zCjIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/profile.js"></script>
</body>
</html>