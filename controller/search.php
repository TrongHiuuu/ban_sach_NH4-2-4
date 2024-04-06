<?php
    if(isset($_POST['search'])){
        $kyw = $_POST['kyw'];
        if($kyw !== ""){
        $result = searchProduct($kyw);
        $category = getAllCategory();
        $title = $kyw;
        $thingToSearch = "basic";
        $thingToSearchVal = $kyw;
        if($result!=null) require_once 'view/search.php';
        else require_once 'view/noFound.php';
        }
        else header("Location: ?page=home");
    }
?>