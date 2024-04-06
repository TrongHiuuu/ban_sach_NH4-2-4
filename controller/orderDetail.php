<?php
    if(isset($_GET['idDH'])){
        $idDH = $_GET['idDH'];
        $idTK = 1;
        $customer = getOneCustomerById($idTK);
        $detail = getDetailOrderByIdDH($idDH);
        $order = getOrderByIdDH($idDH);
        $category = getAllCategory();   
        require_once 'view/orderDetail.php';
    }
?>