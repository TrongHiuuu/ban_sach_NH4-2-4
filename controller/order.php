<?php
    $idTK = 1;
    $result = getOneOrderByIdTK($idTK);
    $category = getAllCategory();   
    require_once 'view/order.php';
?>