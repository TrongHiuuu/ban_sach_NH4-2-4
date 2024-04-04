<?php
    include_once 'inc/header.php';
    //extract($result); 
?>
<div class="container">
    <div class=" form-box login">
        <h1>Đăng nhập</h1>
        <form action="?page=editInfo" method="POST">
            <div><input type="text" name="tenTK" placeholder="<?php echo $user_info['tenTK'];?>"></div>
            <div><input type="email" name="email" placeholder="<?php echo $user_info['email'];?>"></div>
            <div><input type="text" type="text" name="phone" placeholder="<?php echo $user_info['dienthoai'];?>" pattern="[0]+[0-9]{9}" title="Nhập số điện thoại có 10 chữ số bắt đầu từ số 0"></div>
            <div><button type="submit" name="submit_info">Lưu thông tin</button></div>
        </form>
        <form action="?page=editInfo" method="POST">
            <div><input type="password" name="c_password" placeholder="Nhập mật khẩu hiện tại"></div>
            <div><input type="password" name="n_password" placeholder="Nhập mật khẩu mới"></div>
            <div><input type="password" name="r_n_password" placeholder="Xác nhận mật khẩu mới"></div>
            <div><button type="submit" name="submit_password">Lưu mật khẩu</button></div>
        </form>
        <div class="alert">Thông báo</div>
        <div>Bạn đã <a href="?page=forgotPassword">quên mật khẩu</a> ?</div>
    </div>
</div>
<?php
    include_once 'inc/footer_supplier.php';
?>
