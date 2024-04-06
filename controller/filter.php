<?php
    if(isset($_POST['filter-btn'])){
        $minPrice = $_POST['minPrice'];
        $maxPrice = $_POST['maxPrice'];
        $thingToSearch = $_POST['thingToSearchInput'];
        $thingToSearchVal = $_POST['thingToSearchValInput'];
        $title = $_POST['title'];
        $result = null;
        $category = getAllCategory();

        // kyw - price
        if($thingToSearch == "basic")
            $result = filterProductByKeyword($thingToSearchVal, $minPrice, $maxPrice);
        else if($thingToSearch == "category"){
            
            // bestseller - price
            if($thingToSearchVal == -1)
                $result = filterBestsellerProduct($minPrice, $maxPrice);

            // category - price
            else $result = filterCategoryProduct($thingToSearchVal, $minPrice, $maxPrice);
        }

        if($result!=null) require_once 'view/search.php';
        else require_once 'view/noFound.php';
    }
?>