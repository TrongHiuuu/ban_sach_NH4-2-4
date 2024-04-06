<?php
    $total_price = totalPriceInCart();
    orderCancelledByCustomer($idDH);
    $category = getAllCategory();
    require_once "view/checkOut.php";
?>