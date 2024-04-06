<?php
    $result = getAllProductBestSeller();
    $category = getAllCategory();
    $title = "Sách Bán Chạy";
    $thingToSearch = "category";
    $thingToSearchVal = -1;
    require_once 'view/search.php';
?>