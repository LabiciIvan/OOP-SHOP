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
    <title>Orders</title>
    <link rel="stylesheet" href="./css/homeAdmin.style.css">
    <link rel="stylesheet" href="./css/ordersAdmin.style.css">
</head>
<body>
<?php
   include_once "./navBarAdmin.php";
   include_once "../model/orderModel.php";
    
    $orders = new OrderModel();

    $ordersList = $orders->getOrders();

    $orderCanceled = $orders->getCanceledOrders();
    $orderConfirmed = $orders->getConfirmedOrders();
    
    $ordersListGuest = $orders->getOrdersGuest();

    $orderCanceledGuest = $orders->getCanceledOrdersGuest();
    $orderConfirmedGuest = $orders->getConfirmedOrdersGuest();
    
    // print_r($ordersList);
    // echo count($ordersList);
    // print_r($orderCanceled);
    // print_r($orderConfirmed);
?>
<div class="order-wrapper">

<?php if(count($ordersList) > 0) { ?>
    <table>
        <tr class="description-row">
            <th class="table-title id" >Id</th>
            <th class="table-title" >The newest Orders</th>
            <th class="table-title" >Total $</th>
            <th class="table-title" >Confirmation</th>
        </tr>
        <?php
        foreach($ordersList as $order) {
            echo "<tr class='table-row'>
                    <td class='table-cell'><a class='table-cell-id' href='./orderDetailsAdmin.php?id={$order['id']}'>{$order['id']}</a></td>
                    <td class='table-cell'>{$order['order_date']}</td>
                    
                    <td class='table-cell'>{$order['products_total']}</td>
                    <td class='table-cell unconfirmed'> {$order['checked']} </td>
                </tr>";
        }
        ?>
    </table>
<?php } ?>

<?php if(count($orderConfirmed) > 0) { ?>
    <table>
        <tr class="description-row">
            <th class="table-title id" >Id</th>
            <th class="table-title" >Confirmed Orders</th>
            <th class="table-title" >Total $</th>
            <th class="table-title" >Remove from <i class="fa-solid fa-database"></i></th>
        </tr>
        <?php
        foreach($orderConfirmed as $order) {
        echo "<tr class='table-row'>
                <td class='table-cell'><a class='table-cell-id' href='./orderDetailsAdmin.php?id={$order['id']}'>{$order['id']}</a></td>
                <td class='table-cell'>{$order['order_date']}</td>
                
                <td class='table-cell'>{$order['products_total']}</td>
                <td class='table-cell confirmed'> 
                    <form class='form-confirmed' action='../includes/order.handler.php' method='POST'>
                        <button class='button-confirmed' name='remove-order-db' value='{$order['id']}'>{$order['checked']}</button>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>
<?php } ?>

<?php if(count($orderCanceled) > 0) { ?>
    <table>
        <tr class="description-row">
            <th class="table-title id" >Id</th>
            <th class="table-title" >Canceled Orders</th>
            <th class="table-title" >Total $</th>
            <th class="table-title" >Remove from <i class="fa-solid fa-database"></i></th>
        </tr>
        <?php
        foreach($orderCanceled as $order) {
        echo "<tr class='table-row'>
                <td class='table-cell'><a class='table-cell-id' href='./orderDetailsAdmin.php?id={$order['id']}'>{$order['id']}</a></td>
                <td class='table-cell'>{$order['order_date']}</td>
                
                <td class='table-cell'>{$order['products_total']}</td>
                <td class='table-cell canceled'>
                    <form class='form-canceled' action='../includes/order.handler.php' method='POST'>
                        <button class='button-canceled' name='remove-order-db'  value='{$order['id']}'>{$order['checked']}</button>
                    </form>
                </td>
             </tr>";
        }
        ?>
    </table>
<?php } ?>

<h6 class="separator-order-guest">Down Bellow are Orders from users without an account</h6>


<?php if(count($ordersListGuest) > 0) { ?>
    <table>
        <tr class="description-row">
            <th class="table-title id" >Id</th>
            <th class="table-title" >The newest Orders</th>
            <th class="table-title" >Total $</th>
            <th class="table-title" >Confirmation</th>
        </tr>
        <?php
        foreach($ordersListGuest as $order) {
            echo "<tr class='table-row'>
                    <td class='table-cell'><a class='table-cell-id' href='./orderDetailsGuestAdmin.php?idguest={$order['id']}'>{$order['id']}</a></td>
                    <td class='table-cell'>{$order['order_date']}</td>
                    
                    <td class='table-cell'>{$order['products_total']}</td>
                    <td class='table-cell unconfirmed'> {$order['checked']} </td>
                </tr>";
        }
        ?>
    </table>
<?php } ?>

<?php if(count($orderConfirmedGuest) > 0) { ?>
    <table>
        <tr class="description-row">
            <th class="table-title id" >Id</th>
            <th class="table-title" >Confirmed Orders</th>
            <th class="table-title" >Total $</th>
            <th class="table-title" >Remove from <i class="fa-solid fa-database"></i></th>
        </tr>
        <?php
        foreach($orderConfirmedGuest as $order) {
        echo "<tr class='table-row'>
                <td class='table-cell'><a class='table-cell-id' href='./orderDetailsGuestAdmin.php?idguest={$order['id']}'>{$order['id']}</a></td>
                <td class='table-cell'>{$order['order_date']}</td>
                
                <td class='table-cell'>{$order['products_total']}</td>
                <td class='table-cell confirmed'> 
                    <form class='form-confirmed' action='../includes/order.handler.php' method='POST'>
                        <button class='button-confirmed' name='remove-order-db' value='{$order['id']}'>{$order['checked']}</button>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>
<?php } ?>

<?php if(count($orderCanceledGuest) > 0) { ?>
    <table>
        <tr class="description-row">
            <th class="table-title id" >Id</th>
            <th class="table-title" >Canceled Orders</th>
            <th class="table-title" >Total $</th>
            <th class="table-title" >Remove from <i class="fa-solid fa-database"></i></th>
        </tr>
        <?php
        foreach($orderCanceledGuest as $order) {
        echo "<tr class='table-row'>
                <td class='table-cell'><a class='table-cell-id' href='./orderDetailsGuestAdmin.php?idguest={$order['id']}'>{$order['id']}</a></td>
                <td class='table-cell'>{$order['order_date']}</td>
                
                <td class='table-cell'>{$order['products_total']}</td>
                <td class='table-cell canceled'>
                    <form class='form-canceled' action='../includes/order.handler.php' method='POST'>
                        <button class='button-canceled' name='remove-order-db'  value='{$order['id']}'>{$order['checked']}</button>
                    </form>
                </td>
             </tr>";
        }
        ?>
    </table>
<?php } ?>



<script src="https://kit.fontawesome.com/7784d1bec6.js" crossorigin="anonymous"></script>
<script src="../view/js/navBar.script.js"></script>
</div>
</body>
</html>