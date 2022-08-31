<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['user']) || $_SESSION['user']['admin'] !== '1' || !isset($_GET['idguest'])) { 

        header("location:../home.php?onlyAdmin");
        exit();
        }
    $id = $_GET['idguest'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Guest Details</title>
    <link rel="stylesheet" href="./css/orderDetailsAdmin.css">
    <link rel="stylesheet" href="./css/homeAdmin.style.css">
</head>
<body>
<?php
    include_once "./navBarAdmin.php";

    include_once "../model/orderModel.php";

    $orderModel = new OrderModel();
    $order = $orderModel->getOneOrderGuest($id);




?>
<div class="order-details-wrapper">
        <a href="./ordersAdmin.php"><i class="fa-solid fa-backward"></i></a>
        <div class="order-details">
                <div class="order-item">
                    <h5 class="order-text">
                        User Id: <?php echo $order[0]['id']; ?>
                    </h5>
                    <h5 class="order-text">
                    Order Date: <?php echo $order[0]['order_date']; ?>
                    </h5>
                    <h5 class="order-text">
                    User Email: <?php echo $order[0]['user_email']; ?>
                    </h5>
                    <h5 class="order-text">
                    User Name: <?php echo $order[0]['user_name']; ?>
                    </h5>
                    <h5 class="order-text">
                    User Phone: <?php echo $order[0]['phoneNumber']; ?>
                    </h5>
  
                </div>
            <div class="order-item">
            <h5 class="order-text">
            Order Country: <?php echo $order[0]['country']; ?>
            </h5>
            <h5 class="order-text">
            Order Region: <?php echo $order[0]['region']; ?>
            </h5>
            <h5 class="order-text">
            Order Street: <?php echo $order[0]['street']; ?>
            </h5>
            <h5 class="order-text">
            Order House Number: <?php echo $order[0]['houseNumber']; ?>
            </h5>




            </div>
            <div class="order-item">
            <h5 class="order-text">
                Products Ordered: <?php echo $order[0]['products']; ?>
            </h5>
            <h5 class="order-text">
                Products Total Bill: <?php echo $order[0]['products_total']; ?>
            </h5>

            </div>
        </div>

        <?php 
            if($order[0]['checked'] == 'unconfirmed') {
        ?>
        <div class="order-commands">

            <form class="order-form" action="../includes/order.handler.php" method="POST">
                <button class="order-button confirm" value="<?php echo $order[0]['id'] ?>" name="confirm_guest"> Confirm  <i class="fa-solid fa-check"></i></button>
            </form>
            <form class="order-form" action="../includes/order.handler.php" method="POST">
                <button class="order-button cancel" value="<?php echo $order[0]['id'] ?>" name="cancel_guest">Cancel <i class="fa-solid fa-ban"></i> </button>
            </form>

        </div>
        <?php } ?>
</div>

<script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
<script src="../view/js/navBar.script.js"></script>
</body>
</html>