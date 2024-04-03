<?php
function getOneOrderByIdTK($idTK){
    $sql=
    'select donhang.trangthai as trangthaiDH, sach.trangthai as trangthaiSach, hinhanh, donhang.idDH as idDonHang, 
    tuasach, tacgia, soluong, gialucdat, tongtien 
    from donhang inner join CTdonhang on donhang.idDH = CTdonhang.idDH
    inner join sach on CTdonhang.idSach = sach.idSach where 1';
    $sql.=' and idTK = '.$idTK;
    $sql.=' and sach.trangthai != 0';
    return getOne($sql);
}
?>