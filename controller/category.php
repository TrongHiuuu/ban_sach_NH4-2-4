<?php
    if(isset($_GET['idTL'])){
        $idTL = $_GET['idTL'];
        $category = getAllCategory();   
        // sach thuoc the loai can tim
        $result = getAllProductByCategory($idTL);
        // thong tin the loai can tim
        $categorySearch = getCategoryByID($idTL);
        $title = $categorySearch['tenTL'];
        $thingToSearch = "category";
        $thingToSearchVal = $idTL;
        if($result!=null) require_once 'view/search.php';
        else require_once 'view/noFound.php';
    }
?>