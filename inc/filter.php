<?php
    include "../lib/session.php";
    if (isset($_GET['idTL'])) {
        $idTL = $_GET['idTL'];
    }
    
    if (isset($_POST['filter'])) {
        $priceFrom = $_POST['priceFrom'];
        $priceTo = $_POST['priceTo'];
    }
    
    advance_search_session($idTL, $priceFrom, $priceTo);
?>

<div class="container-bottom-left-filter">
                <div class="container-bottom-left-filter-category">
                    <div style="font-size: 16px" class="container-bottom-left-filter-category-content1">
                        <b>TÌM SÁCH THEO DANH MỤC SÁCH</b>
                    </div>
                    <div class="container-bottom-left-filter-category-content">
                        <a href="?page=bestseller">Sách Bán Chạy</a>
                    </div>
                    <?php
                        foreach($category as $item){
                            extract($item);
                    ?>
                    <div class="container-bottom-left-filter-category-content">
                        <a href="?page=category&idTL=<?=$idTL?>"><?=$tenTL?></a>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="container-bottom-left-filter-price">
                    <div style="font-size: 16px" class="container-bottom-left-filter-category-content1">
                        <b>TÌM SÁCH THEO GIÁ TIỀN</b>
                    </div>
                    <form class="container-bottom-left-filter-price-range" action="?page=filter" method="post" id="filterForm" onsubmit="return checkFilter(this)">
                        <i>Nhập vào khoảng giá cần tìm</i>
                            <div class="container-bottom-left-filter-price-range-input">
                                <input type="text" name="starting-price" id="starting-price" name="priceFrom">
                                --
                                <input type="text" name="reserve-price" id="reserve-price" name="priceTo">
                            </div>
                            <div id="alert"></div>
                            <button type="submit" name="filter">Tìm kiếm</button>
                    </form>
                </div>
            </div>