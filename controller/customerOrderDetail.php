<?php
    $sql = "SELECT * FROM taikhoan where idTK='".$_SESSION['user']['id']."' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user_info = mysqli_fetch_array($result);
    //
        
    //
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory();
    require_once "view/customerOrderDetail.php";
?>