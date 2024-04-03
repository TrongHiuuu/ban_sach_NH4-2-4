<?php
function getAllProductBestSeller(){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and luotban > 0';
    $sql.=' and trangthai = 1';
    $sql.=' order by luotban';
    return getAll($sql);
}

function getProductById($id){
    $sql='select * from sach where 1';
    $sql.=' and idSach = '.$id;
    return getOne($sql);
}

function getLimitProductBestSeller($n){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and luotban > 0';
    $sql.=' and trangthai = 1';
    $sql.=' order by luotban';
    $sql.=' limit '.$n;
    return getAll($sql);
}

function getAllProductByCategory($idTL){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and idTL = '.$idTL;
    $sql.=' order by luotban';
    return getAll($sql);
}

function searchProduct($kyw){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and (tuasach like "%'.$kyw.'%"';
    $sql.=' or tacgia like "%'.$kyw.'%")';
    $sql.=' order by luotban';
    return getAll($sql);
}

function searchProductFilter($thingToSearchVal, $priceFrom, $priceTo){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and giaban >= '.$priceFrom;
    $sql.=' and giaban <= '.$priceTo;
    $sql.=' and tuasach like "%'.$thingToSearchVal.'%"';
    $sql.=' or tacgia like "%'.$thingToSearchVal.'%"';
    $sql.=' order by luotban';
    return getAll($sql);
}

function searchProductBestSellerFilter($priceFrom, $priceTo){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and luotban > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and giaban >= '.$priceFrom;
    $sql.=' and giaban <= '.$priceTo;
    $sql.=' order by luotban';
}

function searchProductByCategoryFilter($thingToSearchVal, $priceFrom, $priceTo){
    $sql='select * from sach where 1';
    $sql.=' and tonkho > 0';
    $sql.=' and trangthai = 1';
    $sql.=' and idTL = '.$thingToSearchVal;
    $sql.=' and giaban >= '.$priceFrom;
    $sql.=' and giaban <= '.$priceTo;
    $sql.=' order by luotban';
    return getAll($sql);
}
?>