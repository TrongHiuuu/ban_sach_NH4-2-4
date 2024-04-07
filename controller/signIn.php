<?php
    if (isset($_POST['sign_in'])) {
        $inputEmail = $_POST['email'];
        $inputPassword = $_POST['password'];
        $sql = "SELECT * FROM taikhoan WHERE email= '$inputEmail' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (mysqli_num_rows($result) > 0) {
            if(password_verify($inputPassword, $user['matkhau'])){
                login_session($user['idTK'], $user['email'], $user['tenTK'], $user['phanquyen']);
                //$result = getLimitProductBestSeller(12);
                //$category = getAllCategory();
                $notif = "Đăng nhập thành công";
                echo "<script>alert('{$notif}'')</script>";
                header("Location:index.php?page=home");  
            }  
            else {
                echo "<script>alert('Mật khẩu không đúng, vui lòng nhập lại')</script>";
            }   
        }
        else {
            echo "<script>alert('Tài khoản không tồn tại')</script>";
        }
    }
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory();
    require_once "view/signIn.php";
?>